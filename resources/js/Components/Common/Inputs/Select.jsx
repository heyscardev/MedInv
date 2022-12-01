import {
  FormControl,
  FormHelperText,
  InputLabel,
  MenuItem,
  Select,
} from '@mui/material'
import React from 'react'
import { Field } from 'react-final-form'
import IntlMessage from '../IntlMessage'

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
  margin,
  noTranslateOptions,
  onChange,
  options = [],
  validate,
  marginRightSelect,
  type,
  ...rest
}) =>
  name ? (
    <Field name={name} type={type} value={value} validate={validate}>
      {({ meta, input }) => (
        <FormControl
          error={meta.submitFailed && !!meta.error}
          fullWidth={fullWidth}
          sx={{margin}}
        >
          <InputLabel>{label && <IntlMessage id={label} />}</InputLabel>
          <Select
          
            label={label && <IntlMessage id={label} />}
            {...input}
            style={{marginRight:marginRightSelect}}
            color="primary"
            onChange={
              !onChange
                ? input.onChange
                : (e) => onChange(e, input.onChange, meta)
            }
            {...rest}
          >
            {options.map((option) => {
              return (
                <MenuItem key={option.value} value={option.value}>
                  {noTranslateOptions || option.noTranslate ? (
                    option.label
                  ) : (
                    <IntlMessage id={option.label} />
                  )}
                </MenuItem>
              )
            })}
          </Select>

          {meta.submitFailed && meta.error && (
            <FormHelperText>
              <IntlMessage id={meta.error} />
            </FormHelperText>
          )}
        </FormControl>
      )}
    </Field>
  ) : (
    <FormControl fullWidth={fullWidth}>
      {label &&<InputLabel><IntlMessage id={label} /></InputLabel>}
      <Select
        label={label && <IntlMessage id={label} />}
        {...rest}
        onChange={onChange}
        color="primary"
      >
        {options.map((option) => {
          return (
            <MenuItem key={option.value} value={option.value}>
              {noTranslateOptions || option.noTranslate ? (
                option.label
              ) : (
                <IntlMessage id={option.label} />
              )}
            </MenuItem>
          )
        })}
      </Select>
    </FormControl>
  )
