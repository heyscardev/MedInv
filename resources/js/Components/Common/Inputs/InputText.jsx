import React from "react";
import { Field } from "react-final-form";
import { FormControl, TextField } from "@mui/material";
import { useIntl } from "react-intl";

const onChangeDesicion = (e, inputOnchange, externalOnChange, meta, maxLength, onlyNumbers) => {
  let pass = true;
  if (onlyNumbers && isNaN(e.target.value)) pass = false;
  if (maxLength && e.target.value.length > maxLength) pass = false;

  if (pass) !externalOnChange ? inputOnchange(e) : externalOnChange(e, inputOnchange, meta);
};

const InputText = ({
  name,
  onChange,
  autoComplete = "on",
  spellCheck = true,
  label,
  noTranslateLabel,
  validate,
  containerProps,
  maxLength = 255,
  onlyNumbers,
  inputProps,
  type,
  fullWidth = false,
  margin = 10
}) => {
  const { formatMessage } = useIntl();
  return (
    <Field name={name} validate={validate} type={type}>
      {({ input, meta }) => (
        <div style={{ margin }}>
          <FormControl fullWidth={fullWidth}>
            <TextField
              {...input}
              inputProps={{ spellCheck, autoComplete, ...inputProps, maxLength }}
              variant="outlined"
              label={!noTranslateLabel ? formatMessage({id:label}) : label}
              onChange={(e) => onChangeDesicion(e, input.onChange, onChange, meta, maxLength, onlyNumbers)}
              error={meta.error && meta.submitFailed ? true : false}
              helperText={meta.error && meta.submitFailed ? meta.error : ""}
            />
          </FormControl>
        </div>
      )}
    </Field>
  );
};

export default InputText;
