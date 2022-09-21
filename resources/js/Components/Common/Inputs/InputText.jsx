import React from "react";
import { Field } from "react-final-form";
import { FormControl, TextField } from "@mui/material";
import { useIntl } from "react-intl";

const onChangeDesicion = (e, inputOnchange, externalOnChange, meta,{ maxLength, onlyNumbers,onlyNumbersWithFloat,alwaysUpper}) => {
  let pass = true;
  if (onlyNumbersWithFloat 
    && e.target.value !== '' 
  && e.target.value !== '-' 
  && !(e.target.value.match(/^\-?[0-9]+\.?$/)|| e.target.value.match(/^\-?[0-9]+\.?\d\d?$/))
  ) pass = false;
  if(onlyNumbers && e.target.value && e.target.value !== '' && e.target.value !== '-' && !e.target.value.match(/^\-?[0-9]+$/))pass = false;
  if (maxLength && e.target.value.length > maxLength) pass = false;
    e.target.value = alwaysUpper ? e.target.value.toUpperCase(): e.target.value;
  if (pass) !externalOnChange ? inputOnchange(e) : externalOnChange(e, inputOnchange, meta);
};

const InputText = ({
  name,
  onChange,
  autoComplete = "off",
  spellCheck = true,
  label,
  noTranslateLabel,
  validate,
  containerProps,
  maxLength = 250,
  onlyNumbers,
  onlyNumbersWithFloat,
  maxDecimal=2,
  inputProps,
  type = "text",
  fullWidth = false,
  margin = 10,
  multiline =false,
  variant="outlined",
  optional=false,
  errorValues,
  alwaysUpper
}) => {
  const { formatMessage } = useIntl();
  return (
    <Field name={name} validate={validate} type={type}>
      {({ input, meta }) => (
        <div style={{ margin }}>
          <FormControl fullWidth={fullWidth}>
            <TextField
              {...{...input,variant,multiline}}
              inputProps={{ spellCheck, autoComplete, ...inputProps, maxLength, }}
              label={(!noTranslateLabel ? formatMessage({id:label || "empty"}) : label)+(optional?formatMessage({id:'optional'}):"")}
              onChange={(e) => onChangeDesicion(e, input.onChange, onChange, meta, {onlyNumbersWithFloat,maxLength, onlyNumbers,maxDecimal,alwaysUpper})}
              error={meta.error && meta.submitFailed ? true : false}
              helperText={meta.error && meta.submitFailed ? formatMessage({id:meta.error},errorValues): ""}
            />
          </FormControl>
        </div>
      )}
    </Field>
  );
};

export default InputText;
