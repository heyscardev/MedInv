import React from 'react'
import { Field } from 'react-final-form'
import { TextField, FormControl } from '@mui/material'

import { DesktopDatePicker, LocalizationProvider } from '@mui/x-date-pickers'
import IntlMessage from '../IntlMessage'
import { formatMessage } from '@formatjs/intl'


export default ({
  name,
  onChange,
  label,
  validate,
  inputFormat,
  maxDate,
  minDate,
  fullWidth,
  noFinalForm = false,
  variant = 'outlined',
  value,
  noEditable = false,
  placeholder,
  ...props
}) => {
  return !noFinalForm ? (
    <Field name={name} validate={validate}>
      {({ input, meta }) => (
        <FormControl sx={{ margin: "10px", ...props }} fullWidth={fullWidth}>
          
            <DesktopDatePicker
              {...input}
              label={<IntlMessage id={label} />}
              inputFormat={inputFormat ? inputFormat : 'dd/MM/yyyy'}
              onChange={
                !onchange
                  ? input.onChange
                  : (e) => onChange(e, input.onchange, meta)
              }
              minDate={minDate}
              maxDate={maxDate}
              renderInput={(params) => (
                <TextField
                  variant={variant}
                  style={{marginRight:"20px"}}
                  {...params}
                  inputProps={{
                    ...params.inputProps,
                    placeholder: placeholder || params.inputProps.placeholder,
                  }}
                  error={meta.error && meta.submitFailed ? true : false}
                  helperText={meta.error && meta.submitFailed ? <IntlMessage id={meta.error} />: ''}
                />
              )}
            />
        </FormControl>
      )}
    </Field>
  ) : (
    <FormControl sx={props}>
     
        <DesktopDatePicker
          name={name}
          label={label}
          value={value}
          inputFormat={inputFormat ? inputFormat : 'dd/MM/yyyy'}
          onChange={onChange}
          disableMaskedInput
          minDate={minDate}
          maxDate={maxDate}
          renderInput={(params) => (
            <TextField
              fullWidth={fullWidth}
              {...params}
              inputProps={{
                ...params.inputProps,
                placeholder: placeholder || params.inputProps.placeholder,
              }}
              variant={variant}
            />
          )}
        />
    </FormControl>
  )
}
