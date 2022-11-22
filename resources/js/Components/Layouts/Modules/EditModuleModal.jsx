import CheckBox from "@/Components/Common/Inputs/CheckBox";
import DatePicker from "@/Components/Common/Inputs/DatePicker";
import InputText from "@/Components/Common/Inputs/InputText";

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

const routeName = "module";
export default ({ item, open, onClose }) => {
  const update = (data, form) => {
    const dataToSend = {
      id: data.id,
      ...data
    };
   
    put(route(`${routeName}.update`, dataToSend.id), dataToSend, {
      onSuccess: (e) => {
        onClose(null);
      },
    });
  };
  const store = (data) => {
    const dataToSend = {
      ...data,
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
    <Modal {...{ open }}>
      <div style={{ textAlign: "center" }}>
        <LogoTypography />
        <Typography variant="h5" color="secondary.dark">
          {item &&  item.id ?  "Acualizar Módulo":"Registrar Módulo" }
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
                  name="code"
                  label="code"
                  autoComplete="nope"
                  validate={composeValidators(required)}
                  maxLength={80}
                  fullWidth
                />
              </Grid>
              
          {/* 
              <Grid item xs={12} lg={6} display="flex" justifyContent="center" alignItems="center">
                <CheckBox type="radio" name="gender" label="male" value="Male" />
                <CheckBox type="radio" name="gender" label="female" value="Female" />
              </Grid> */}
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
