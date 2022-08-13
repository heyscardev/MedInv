import { FormControl, FormControlLabel, Checkbox, FormHelperText } from "@mui/material";
import React from "react";
import { Field } from "react-final-form";

/* export default (name, validate, label, value, check, checkBoxProps) => (
  <Field name={name} validate={validate}>
    {({ input, meta }) => (
    <FormControlLabel control={
    <Checkbox {...input} {...checkBoxProps} value="Male" />} 
    label={label} />
    )}
  </Field>
);
 */

export default ({
  name,
  value,
  fullWidth = false,
  label,
  onChange,
  validate,
  type = "checkbox",
}) => (
  <Field name={name} type={type} value={value} validate={validate}>
    {({ meta, input }) => (
      <FormControl error={meta.submitFailed && !!meta.error} fullWidth={fullWidth} >
        <FormControlLabel
          label={label}
          control={
            <Checkbox
              {...input}
              color="primary"
              onChange={!onChange ? input.onChange : (e) => onChange(e, input.onChange, meta)}
            />
          }
        />
        {meta.submitFailed && meta.error && <FormHelperText>{meta.error}</FormHelperText>}
      </FormControl>
    )}
  </Field>
);
