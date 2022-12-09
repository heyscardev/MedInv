import Autocomplete from "@/Components/Common/Inputs/Autocomplete";
import InputText from "@/Components/Common/Inputs/InputText";
import Modal from "@/Components/Common/Modal";
import IconButton from "@/Components/Custom/IconButton";
import LogoTypography from "@/Components/LogoTypography";
import { composeValidators, greaterOrEqualThanValue, lessOrEqualThanValue, required } from "@/Config/InputErrors";
import { validationParams } from "@/Config/parameters.json";
import { post, put } from "@/HTTPProvider";
import { Add, Cancel, Save } from "@mui/icons-material";
import { Button, DialogActions, Grid, Typography } from "@mui/material";
import { Form } from "react-final-form";
import { useIntl } from "react-intl";
export default ({ unit, units, open, onClose, onSuccess }) => {
  const { formatMessage } = useIntl();
  const update = (data, form) => {
     const dataToSend = {
            id: data.id,
            name:data.name
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
        put(route("service.update", dataToSend.id), dataToSend, {
            onSuccess: (e) => {
                onClose(null);
                if(onSuccess)onSuccess();
            },
        });
  };
  const store = (data) => {
    const dataToSend = {
      name: data.name
    };

    post(route("service.store"), dataToSend, {
      onSuccess: (e) => {
        onClose();
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
          {!unit ? formatMessage({ id: "newService" }) : formatMessage({ id: "updateService" })}
        </Typography>
      </div>
      <Form
        initialValues={unit?{...unit}:{} }
        onSubmit={submit}
        render={({ handleSubmit, form }) => (
          <form onSubmit={handleSubmit} id="unitForm" autoComplete="off">
            <Grid container>
              <Grid item xs={12} sm={12}>
                <InputText
                  alphaWithoutSpacing
                  name="name"
                  label="name"
                  alwaysUpper
                  validate={composeValidators(required, (value) =>
                    _.find(units, (un) => un.name === value) && (!unit || unit.name !== value ) ? "fieldError.unique" : null
                  )}
                  maxLength={validationParams.maxLengthStringName}
                  fullWidth
                />
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
        <Button startIcon={<Save />} variant="contained" type="submit" sx={{ color: "#fff" }} form="unitForm">
          Guardar
        </Button>
      </DialogActions>
    </Modal>
  );
};
