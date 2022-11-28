import React from 'react'
import { Field } from 'react-final-form'
import { FormControl, TextField } from '@mui/material'
import { useIntl } from 'react-intl'
import { MuiTelInput } from 'mui-tel-input'

const onChangeDesicion = (
  e,
  inputOnchange,
  externalOnChange,
  meta,
  {
    maxLength,
  },
) => {
  let pass = true

  if (e.target.value && e.target.value !== '') {
  

    if (maxLength && e.target.value.length > maxLength) pass = false
 
  }

  if (pass)
    !externalOnChange
      ? inputOnchange(e)
      : externalOnChange(e, inputOnchange, meta)
}

const PhoneInput = ({
  name,
  onChange,
  autoComplete = 'off',
  spellCheck = true,
  label,
  noTranslateLabel,
  validate,
  alpha,
  alphaWithoutSpacing,
  containerProps,
  maxLength = 250,
  onlyNumbers,
  onlyNumbersWithFloat,
  maxDecimal = 2,
  inputProps,
  type = 'text',
  fullWidth = false,
  margin = 10,
  multiline = false,
  variant = 'outlined',
  optional = false,
  errorValues,
  alwaysUpper,
}) => {
  const { formatMessage } = useIntl()
  return (
    <Field name={name} validate={validate} type={type}>
      {({ input, meta }) => (
        <div style={{ margin }}>
          <FormControl fullWidth={fullWidth}>
            <MuiTelInput
              {...{ ...input, variant, multiline }}
              inputProps={{
                spellCheck,
                autoComplete,
                ...inputProps,
                maxLength,
              }}
              label={
                (!noTranslateLabel
                  ? formatMessage({ id: label || 'empty' })
                  : label) + (optional ? formatMessage({ id: 'optional' }) : '')
              }
              onChange={
                !onchange
                  ? input.onChange
                  : (e) => onChange(e, input.onchange, meta)
              }
              onlyCountries={['VE']}
              error={meta.error && meta.submitFailed ? true : false}
              helperText={
                meta.error && meta.submitFailed
                  ? formatMessage({ id: meta.error }, errorValues)
                  : ''
              }
            />
          </FormControl>
        </div>
      )}
    </Field>
  )
}

export default PhoneInput
