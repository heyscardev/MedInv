import CheckBox from "@/Components/Common/Inputs/CheckBox";
import DatePicker from "@/Components/Common/Inputs/DatePicker";
import InputText from "@/Components/Common/Inputs/InputText";
import PasswordField from "@/Components/Common/Inputs/PasswordField";
import Select from "@/Components/Common/Inputs/Select";
import IntlMessage from "@/Components/Common/IntlMessage";
import Modal from "@/Components/Common/Modal";
import LogoTypography from "@/Components/LogoTypography";
import {
  alpha,
  composeValidators,
  dateGreaterOrEqual,
  dateLessOrEqual,
  email,
  isPhone,
  passwordEqual,
  passwordWeakValidation,
  required,
  validDate,
} from "@/Config/InputErrors";
import { post, put } from "@/HTTPProvider";
import { formatStringDateToDatabase } from "@/Utils/format";
import { Cancel, Save } from "@mui/icons-material";
import { Button, Container, DialogActions, FormControl, FormHelperText, Grid, Typography } from "@mui/material";
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
    <Modal {...{ open }}>
      <div style={{ textAlign: "center" }}>
        <LogoTypography />
        <Typography variant="h5" color="secondary.dark">
          {item &&  item.id ?  "Acualizar Usuario":"Registrar Usuario" }
        </Typography>
      </div>
      <Form
        initialValues={{ ...item }}
        validate={(values)=>{
          const errors = {};
          if(!values.gender)errors.gender = "fieldError.required";
          return errors;
        }}
        onSubmit={submit}
        render={({ handleSubmit, form,errors,submitFailed }) => (
          <form onSubmit={handleSubmit} id="userForm" autoComplete="off">
            <Grid container>
              <Grid item xs={12} lg={6}>
                <InputText
                  name="first_name"
                  label="first_name"
                  autoComplete="nope"
                  validate={composeValidators(required, alpha)}
                  maxLength={80}
                  fullWidth
                />
              </Grid>
              <Grid item xs={12} lg={6}>
                <InputText
                  name="last_name"
                  label="last_name"
                  autoComplete="nope"
                  validate={composeValidators(required, alpha)}
                  maxLength={80}
                  fullWidth
                />
              </Grid>
              <Grid item xs={12} lg={8}>
                <InputText
                  name="email"
                  label="email"
                  autoComplete="nope"
                  spellCheck={false}
                  validate={composeValidators(required, email)}
                  type="email"
                  fullWidth
                />
              </Grid>
              <Grid item xs={12} lg={6}>
                <Grid container wrap="nowrap">
                  <Grid item xs={2} lg={4}>
                    <Select
                      fullWidth
                      validate={required}
                      name="nationality"
                      label="N"
                      margin="10px"
                      options={[
                        {
                          label: 'V',
                          value: 'V',
                        },
                        {
                          label: 'E',
                          value: 'E',
                        },
                      ]}
                    />
                  </Grid>
                  <Grid item xs={8}>
                    <InputText
                      name="c_i"
                      label="c_i"
                      autoComplete="nope"
                      placeholder="00000000-0"
                      validate={composeValidators(required, (value) => {
                        if (value.match(/^[0-9]{5,8}\-?[0-9]+$/)) return null
                        return 'fielderror.invalid_c_i'
                      })}
                      maxLength={10}
                      fullWidth
                    />
                  </Grid>
                </Grid>
              </Grid>
              <Grid item xs={12} lg={6}>
                <InputText
                  name="phone"
                  label="phone"
                  autoComplete="nope"
                  validate={composeValidators(required,isPhone)}
                  onlyNumbers
                  maxLength={11}
                  fullWidth
                />
              </Grid>
              <Grid item xs={12} lg={6}>
                <PasswordField
                  name="password"
                  label="password"
                  autoComplete="new-password"
                  spellCheck={false}
                  validate={composeValidators(!item.id?required:()=>null,passwordWeakValidation)}
                  fullWidth
                />
              </Grid>
              <Grid item xs={12} lg={6}>
                <PasswordField
                  name="password_confirmation"
                  label="password_confirmation"
                  autoComplete="new-password"
                  spellCheck={false}
                  validate={composeValidators(!item.id?required:()=>null,passwordWeakValidation, passwordEqual("password"))}
                  fullWidth
                />
              </Grid>
              <Grid item xs={12} lg={6}>
                <DatePicker
                  name="birth_date"
                  label="birth_date"
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
              <FormControl>
                  <Typography marginLeft={2} variant="body2">
                    <IntlMessage id="gender" />
                  </Typography>
                  <Container>
                    <CheckBox
                      noError
                      type="radio"
                      name="gender"
                      label="Female"
                      value={'Female'}
                    />
                    <CheckBox
                      noError
                      type="radio"
                      name="gender"
                      label="Male"
                      value={'Male'}
                    />
                  </Container>
                  {submitFailed && errors.gender && (
                    <FormHelperText error>
                      <IntlMessage id={errors.gender} />
                    </FormHelperText>
                  )}
                  </FormControl>
              </Grid>
              <Grid item xs={12}>
                <InputText
                  optional
                  name="direction"
                  label="direction"
                  autoComplete="nope"
                  maxLength={200}
                  fullWidth
                />
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
