import React, { useState } from "react";
import { Field } from "react-final-form";
import { FormControl, OutlinedInput, IconButton, InputAdornment, FormHelperText, InputLabel } from "@mui/material";
import { Visibility, VisibilityOff } from "@mui/icons-material";

const onChangeDesicion = (e, inputOnchange, externalOnChange, meta, maxLength, onlyNumbers) => {
  let pass = true;
  if (onlyNumbers && isNaN(e.target.value)) pass = false;
  if (maxLength && e.target.value.length > maxLength) pass = false;

  if (pass) !externalOnChange ? inputOnchange(e) : externalOnChange(e, inputOnchange, meta);
};

const handleMouseDownPassword = (event) => {
  event.preventDefault();
};

const PasswordField = ({
  name,
  onChange,
  label,
  validate,
  containerProps,
  maxLength = 255,
  onlyNumbers,
  inputProps,
  showPassword = false,
  spellCheck=true,
  autoComplete = "on",
  fullWidth=false,
  margin=10
}) => {
  const [show, setShow] = useState(showPassword);

  const handleClickShowPassword = () => {
    setShow(!show);
  };

  return (
    <Field name={name} validate={validate} type={show ? "text" : "password"}>
      {({ input, meta }) => (
        <div style={{margin}}>
        <FormControl  fullWidth={fullWidth}>
        <InputLabel error={meta.error && meta.submitFailed ? true : false} htmlFor="outlined-adornment-password">{label}</InputLabel>
          <OutlinedInput
            {...input}
            inputProps={{spellCheck,autoComplete, maxLength,...inputProps,  }}
            variant="outlined"
            label={label}
            onChange={(e) => onChangeDesicion(e, input.onChange, onChange, meta, maxLength, onlyNumbers)}
            error={meta.error && meta.submitFailed ? true : false}
            autoComplete = {autoComplete} 
            spellCheck ={spellCheck}
            fullWidth
            endAdornment={
              <InputAdornment position="end">
                <IconButton
                  aria-label="toggle password visibility"
                  onClick={handleClickShowPassword}
                  onMouseDown={handleMouseDownPassword}
                  edge="end"
                >
                  {show ? <VisibilityOff color="secondary" /> : <Visibility />}
                </IconButton>
              </InputAdornment>
            }
          />
          {meta.submitFailed && meta.error && <FormHelperText error>{meta.error}</FormHelperText>}
        </FormControl>
        </div>
      )}
    </Field>
  );
};

export default PasswordField;
