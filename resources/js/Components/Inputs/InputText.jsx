import React from "react";
import { Field } from "react-final-form";
import { FormControl, TextField } from "@mui/material";

const onChangeDesicion= (e, inputOnchange, externalOnChange, meta,maxLength,onlyNumbers) => {
  let pass = true;
    if (onlyNumbers && isNaN(e.target.value)) pass = false;
    if(maxLength && e.target.value.length > maxLength) pass = false;

    if(pass)!externalOnChange ? inputOnchange(e) : externalOnChange(e, inputOnchange, meta);
};

const InputText = ({ name, onChange, label, validate,containerProps,maxLength = 255, onlyNumbers, inputProps  }) => {
  return (
    <Field name={name} validate={validate} >
      {({ input, meta }) => (
        <FormControl sx={{margin:2}}>
        <TextField
          {...input}
          inputProps={{...inputProps,maxLength}}
          variant="outlined"
          label={label}
          onChange={ (e) => onChangeDesicion(e, input.onChange, onChange, meta,maxLength,onlyNumbers)}
          error={meta.error && meta.submitFailed ? true : false}
          helperText={meta.error && meta.submitFailed ? meta.error : ""}
          />
        </FormControl>
      )}
    </Field>
  );
};

export default InputText;
