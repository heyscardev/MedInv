import { Autocomplete, Box, FormControl, TextField } from "@mui/material";
import { Field } from "react-final-form";
import { useIntl } from "react-intl";

export default ({
    getOptionLabel = (option) => option,
    options=[],
    label = "empty",
    variant="outlined",
    validate,
    errorValues,
    multiline,
    fullWidth,
    autoComplete="off",
    margin=10,
    name,
    renderOption=(props,options)=>options,
    ...rest
}) => {
    const {formatMessage} = useIntl();
    return(
    <Field {...{ name,validate }}>
        {({ input, meta }) => (
            <Autocomplete
                {...{ options, getOptionLabel }}
                autoHighlight
                clearOnEscape
                openOnFocus
                onChange={(e,value) => {
                        input.onChange(value);
                }}
                renderOption={(props, option) => (
                    <Box component="li" {...props}>
                       {renderOption(props,option)}
                    </Box>
                )}
                renderInput={(params) => (
                    <div style={{ margin }}>
          <FormControl fullWidth={fullWidth}>
            <TextField
              {...{variant,multiline}}
              {...params}
              label={formatMessage({id:label})}
              inputProps={{
                  ...params.inputProps,
                  autoComplete, // disable autocomplete and autofill
              }}
              error={meta.error && meta.submitFailed ? true : false}
              helperText={meta.error && meta.submitFailed ? formatMessage({id:meta.error},errorValues): ""}
            />
          </FormControl>
        </div>
                )}
            />
        )}
    </Field>
)};
