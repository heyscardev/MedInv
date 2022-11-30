import Autocomplete from "@/Components/Common/Inputs/Autocomplete";
import InputText from "@/Components/Common/Inputs/InputText";
import Modal from "@/Components/Common/Modal";
import IconButton from "@/Components/Custom/IconButton";
import LogoTypography from "@/Components/LogoTypography";
import { composeValidators, greaterOrEqualThanValue, lessOrEqualThanValue, required } from "@/Config/InputErrors";
import { validationParams } from "@/Config/parameters.json";
import { post } from "@/HTTPProvider";
import { Add, Cancel, Edit, Save } from "@mui/icons-material";
import { Button, DialogActions, Grid, Stack, Typography } from "@mui/material";
import { useState } from "react";
import { Form } from "react-final-form";
import { useIntl } from "react-intl";
import EditUnitModal from "../Units/EditUnitModal";

export default ({ medicaments, medicament, units, open, onClose, onSuccess }) => {
  const { formatMessage } = useIntl();
  const [openCreateUnit, setOpenCreateUnit] = useState([false,null]);
  const update = (data, form) => {
    /*  const dataToSend = {
            id: data.id,
        };
        for (const key in data) {
            if (Object.hasOwnProperty.call(data, key)) {
                if (form.dirtyFields[key])
                    dataToSend[key] =
                        key === "birth_date"
                            ? formatStringDateToDatabase(data[key])
                            : data[key];
            }
        }
        put(route("medicament.update", dataToSend.id), dataToSend, {
            onSuccess: (e) => {
                onClose(null);
            },
        }); */
  };
  const store = (data) => {
    const dataToSend = {
      code: data.code,
      name: data.name,
      unit_id: data.unit.id,
      price_sale: data.price_sale,
    };

    post(route("medicament.store"), dataToSend, {
      onSuccess: (e) => {
        onClose(null);
        if (onSuccess) onSuccess(dataToSend);
      },
    });
  };
  const submit = (data, { getState }) => {
    if (data.id) return update(data, getState());

    return store(data);
  };

  return (
    <Modal {...{ open, onClose }}>
      <div style={{ textAlign: "center" }}>
        <LogoTypography />
        <Typography variant="h5" color="secondary.dark">
          {!medicament ? formatMessage({ id: "newMedicament" }) : formatMessage({ id: "updateMedicament" })}
        </Typography>
      </div>
      <Form
        initialValues={{}}
        onSubmit={submit}
        render={({ handleSubmit, form }) => (
          <form onSubmit={handleSubmit} id="MedicamentForm" autoComplete="off">
            <Grid container>
              <Grid item xs={12} sm={4}>
                <InputText
                  name="code"
                  label="code"
                  alwaysUpper
                  validate={composeValidators(required, (value) =>
                    _.find(medicaments, (med) => med.code.toUpperCase() === value.toUpperCase())
                      ? "fieldError.unique"
                      : null
                  )}
                  maxLength={25}
                  fullWidth
                />
              </Grid>
              <Grid item xs={12} sm={8}>
                <InputText
                  name="name"
                  label="name"
                  alwaysUpper
                  validate={composeValidators(required)}
                  maxLength={validationParams.max}
                  fullWidth
                />
              </Grid>
              <Grid item xs={12} sm={5}>
                <InputText
                  name="price_sale"
                  label="priceSale"
                  onlyNumbersWithFloat
                  validate={composeValidators(
                    required,
                    lessOrEqualThanValue(validationParams.maxDecimalPrice),
                    greaterOrEqualThanValue(validationParams.minDecimalPrice)
                  )}
                  errorValues={{
                    lessOrEqualThanValue2: validationParams.maxDecimalPrice,
                    greaterOrEqualThanValue2: validationParams.minDecimalPrice,
                  }}
                  fullWidth
                />
              </Grid>
              <Grid item xs={11} sm={6}>
                <Autocomplete
                  name="unit"
                  label="unit"
                  options={units}
                  renderOption={(props, option) => <Stack width="100%"  direction="row"justifyContent="space-between">{option.name} <IconButton onClick={()=>{setOpenCreateUnit([true,option])}}><Edit color="error"/></IconButton></Stack>}
                  getOptionLabel={(option) => option.name}
                  fullWidth
                  validate={composeValidators(required)}
                />
              </Grid>
              <Grid item xs={1} alignItems="center" justifyContent="center" display="flex">
                <IconButton title="newUnit" onClick={() => setOpenCreateUnit([true,null])}>
                  <Add color="primary" fontSize="small" />
                </IconButton>
              </Grid>
            </Grid>
          </form>
        )}
      />
      <DialogActions
        sx={{
          display: "flex",
          justifyContent: "center",
        }}
      >
        <Button startIcon={<Cancel />} onClick={onClose} variant="contained" color="error" sx={{ color: "#fff" }}>
          Cancelar
        </Button>
        <Button startIcon={<Save />} variant="contained" type="submit" sx={{ color: "#fff" }} form="MedicamentForm">
          Guardar
        </Button>
      </DialogActions>
      <EditUnitModal open={openCreateUnit[0]} unit={openCreateUnit[1]} onClose={() => setOpenCreateUnit([false,null])} units={units} />
    </Modal>
  );
};
