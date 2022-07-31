import React from "react";
import { Field } from "react-final-form";
import { TextField } from "@mui/material";

const InputText = ({ name, onChange, label, validate, inputProps = { maxLength: 250 } }) => {
  return (
    <Field name={name} validate={validate}>
      {({ input, meta }) => (
        <TextField
          {...input}
          inputProps={inputProps}
          variant="outlined"
          label={label}
          onChange={!onchange ? input.onChange : (e) => onChange(e, input.onchange, meta)}
          error={meta.error && meta.submitFailed ? true : false}
          helperText={meta.error && meta.submitFailed ? meta.error : ""}
        />
      )}
    </Field>
  );
};

export default InputText;
