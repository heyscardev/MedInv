
import InputText from "@/Components/Common/Inputs/InputText";
import IntlMessage from "@/Components/Common/IntlMessage";
import Modal from "@/Components/Common/Modal";
import LogoTypography from "@/Components/LogoTypography";
import {
  alpha,
  composeValidators,
  required,
} from "@/Config/InputErrors";
import { post, put } from "@/HTTPProvider";
import { formatStringDateToDatabase } from "@/Utils/format";
import { Cancel, Save } from "@mui/icons-material";
import { Button, DialogActions, Grid, Typography } from "@mui/material";
import { Form } from "react-final-form";
import { useIntl } from "react-intl";

const routeName = "unit";
export default ({ item: unit, open, onClose }) => {
  const { formatMessage } = useIntl();

  const update = (data, form) => {
    const dataToSend = {
      id: data.id,
    };
    for (const key in data) {
      if (Object.hasOwnProperty.call(data, key)) {
        if (form.dirtyFields[key])
          dataToSend[key] = key === "birth_date" ? formatStringDateToDatabase(data[key]) : data[key];
      }
    }
    console.log(dataToSend)
    put(route(`${routeName}.update`, dataToSend.id), dataToSend, {
      onSuccess: (e) => {
        onClose(null);
      },
    });
  };
  const store = (data) => {
    const dataToSend = {
      ...data
    };

    post(route(`${routeName}.store`), dataToSend, {
      onSuccess: (e) => {
        onClose(null);
      },
    });
  };

  const submit = (data, { getState }) => {
    if (data.id) {
      return update(data, getState());
    }
    return store(data);
  };

  return (
    <Modal {...{ open, onClose }}>
      <div style={{ textAlign: "center" }}>
        <LogoTypography />
        <Typography variant="h5" color="secondary.dark">
          {!unit ? formatMessage({ id: `createUnit` }) : formatMessage({ id: `updateUnit` })}
        </Typography>
      </div>
      <Form
        initialValues={{ ...unit }}
        onSubmit={submit}
        render={({ handleSubmit, form }) => (
          <form onSubmit={handleSubmit} id="unitForm" autoComplete="off">
            <Grid container>
              <Grid item xs={12} lg={6}>
                <InputText
                  name="name"
                  label="name"
                  autoComplete="nope"
                  validate={composeValidators(required, alpha)}
                  maxLength={80}
                  fullWidth
                />
              </Grid>
              <Grid item xs={12} lg={6}>
                <InputText
                  name="description"
                  label="description"
                  autoComplete="nope"
                  maxLength={80}
                  fullWidth
                />
              </Grid>
            </Grid>
          </form>
        )}
      />
      <DialogActions sx={{ backgroundColor: "secondary.main", display: "flex", justifyContent: "center" }}>
        <Button startIcon={<Cancel />} onClick={onClose} variant="contained" color="error" sx={{ color: "#fff" }}>
          <IntlMessage id="cancelBtn" />
        </Button>
        <Button startIcon={<Save />} variant="contained" type="submit" sx={{ color: "#fff" }} form="unitForm">
          <IntlMessage id="saveBtn" />
        </Button>
      </DialogActions>
    </Modal>
  );
};
