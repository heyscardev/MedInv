import CheckBox from "@/Components/Common/Inputs/CheckBox";
import DatePicker from "@/Components/Common/Inputs/DatePicker";
import InputText from "@/Components/Common/Inputs/InputText";
import PasswordField from "@/Components/Common/Inputs/PasswordField";
import Modal from "@/Components/Common/Modal";
import LogoTypography from "@/Components/LogoTypography";
import {
  alpha,
  composeValidators,
  dateGreaterOrEqual,
  dateLessOrEqual,
  email,
  passwordEqual,
  passwordWeakValidation,
  required,
  validDate,
} from "@/Config/InputErrors";
import { post, put } from "@/HTTPProvider";
import { formatStringDateToDatabase } from "@/Utils/format";
import { Cancel, Save } from "@mui/icons-material";
import { Button, DialogActions, Grid, Typography } from "@mui/material";
import { addYears } from "date-fns";
import { Form } from "react-final-form";

export default ({ item, open, onClose }) => {
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
    put(route("user.update", dataToSend.id), dataToSend, {
      onSuccess: (e) => {
        onClose(null);
      },
    });
  };
  const store = (data) => {
    const dataToSend = {
      ...data,
      birth_date : formatStringDateToDatabase(data.birth_date)
    };

    post(route("user.store"), dataToSend, {
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
          {!item ? "Registrar Usuario" : "Acualizar Usuario"}
        </Typography>
      </div>
      <Form
        initialValues={{ ...item }}
        onSubmit={submit}
        render={({ handleSubmit, form }) => (
          <form onSubmit={handleSubmit} id="userForm" autoComplete="off">
            <Grid container>
              <Grid item xs={12} lg={6}>
                <InputText
                  name="first_name"
                  label="Nombre"
                  autoComplete="nope"
                  validate={composeValidators(required, alpha)}
                  maxLength={80}
                  fullWidth
                />
              </Grid>
              <Grid item xs={12} lg={6}>
                <InputText
                  name="last_name"
                  label="Apellido"
                  autoComplete="nope"
                  validate={composeValidators(required, alpha)}
                  maxLength={80}
                  fullWidth
                />
              </Grid>
              <Grid item xs={12} lg={8}>
                <InputText
                  name="email"
                  label="Correo"
                  autoComplete="nope"
                  spellCheck={false}
                  validate={composeValidators(required, email)}
                  type="email"
                  fullWidth
                />
              </Grid>
              <Grid item xs={12} lg={4}>
                <InputText
                  name="c_i"
                  label="cedula"
                  autoComplete="nope"
                  validate={composeValidators(required)}
                  onlyNumbers
                  maxLength={8}
                  fullWidth
                />
              </Grid>
              <Grid item xs={12} lg={6}>
                <PasswordField
                  name="password"
                  label="Contraseña"
                  autoComplete="new-password"
                  spellCheck={false}
                  validate={composeValidators(passwordWeakValidation)}
                  fullWidth
                />
              </Grid>
              <Grid item xs={12} lg={6}>
                <PasswordField
                  name="password_confirmation"
                  label="Confirmar Contraseña"
                  autoComplete="new-password"
                  spellCheck={false}
                  validate={composeValidators(passwordWeakValidation, passwordEqual("password"))}
                  fullWidth
                />
              </Grid>
              <Grid item xs={12} lg={6}>
                <DatePicker
                  name="birth_date"
                  label="fecha de nacimiento"
                  maxDate={Date.now()}
                  minDate={addYears(Date.now(), -150)}
                  validate={composeValidators(
                    required,
                    validDate,
                    dateGreaterOrEqual(addYears(Date.now(), -150)),
                    dateLessOrEqual(Date.now())
                  )}
                  fullWidth
                />
              </Grid>
              <Grid item xs={12} lg={6} display="flex" justifyContent="center" alignItems="center">
                <CheckBox type="radio" name="gender" label="Hombre" value="Male" />
                <CheckBox type="radio" name="gender" label="Mujer" value="Female" />
              </Grid>
            </Grid>
          </form>
        )}
      />
      <DialogActions sx={{ backgroundColor: "secondary.main", display: "flex", justifyContent: "center" }}>
        <Button startIcon={<Cancel />} onClick={onClose} variant="contained" color="error" sx={{ color: "#fff" }}>
          Cancelar
        </Button>
        <Button startIcon={<Save />} variant="contained" type="submit" sx={{ color: "#fff" }} form="userForm">
          Guardar
        </Button>
      </DialogActions>
    </Modal>
  );
};
