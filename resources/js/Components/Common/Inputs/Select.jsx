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
  noTranslateOptions,
  onChange,
  options = [],
  validate,
  type,
}) => (
  <Field name={name} type={type} value={value} validate={validate}>
    {({ meta, input }) => (
      <FormControl
        error={meta.submitFailed && !!meta.error}
        fullWidth={fullWidth}
      >
        <InputLabel>
          <IntlMessage id={label} />
        </InputLabel>
        <Select
          label={<IntlMessage id={label} />}
          {...input}
          color="primary"
          onChange={
            !onChange
              ? input.onChange
              : (e) => onChange(e, input.onChange, meta)
          }
        >
          {options.map((option) => {
            return (
              <MenuItem key={option.value}  value={option.value}>
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
          <FormHelperText><IntlMessage id={meta.error} /></FormHelperText>
        )}
      </FormControl>
    )}
  </Field>
)
