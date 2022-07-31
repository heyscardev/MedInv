import React from "react";
import { Field } from "react-final-form";
import { TextField, FormControl } from "@mui/material";
import { AdapterDateFns } from "@mui/x-date-pickers/AdapterDateFns";
import { DesktopDatePicker, LocalizationProvider } from "@mui/x-date-pickers";
import { es } from "date-fns/locale";

const CustomDatePicker = ({ name, onChange, label, validate, inputFormat, maxDate, minDate }) => {
  return (
    <Field name={name} validate={validate}>
      {({ input, meta }) => (
        <FormControl sx={{ margin: 2 }}>
          <LocalizationProvider adapterLocale={es} dateAdapter={AdapterDateFns}>
            {console.log(meta)}
            <DesktopDatePicker
              {...input}
              label={label}
              inputFormat={inputFormat ? inputFormat : "dd/MM/yyyy"}
              onChange={!onchange ? input.onChange : (e) => onChange(e, input.onchange, meta)}
              minDate={minDate}
              maxDate={maxDate}
              renderInput={(params) => (
                <TextField
                  {...params}
                  error={meta.error && meta.submitFailed ? true : false}
                  helperText={meta.error && meta.submitFailed ? meta.error : ""}
                />
              )}
            />
          </LocalizationProvider>
        </FormControl>
      )}
    </Field>
  );
};

export default CustomDatePicker;
