import { Autocomplete, TextField } from "@mui/material";
import { useIntl } from "react-intl";

export default ({ options, onChange, getOptionLabel, renderOption, onInputChange ,label,noTraduceLabel=false}) => {
    const {formatMessage} = useIntl();
  return (
    <Autocomplete
      openOnFocus
      {...{ options, onChange, getOptionLabel, renderOption, onInputChange }}
      renderInput={(params) => (
        <TextField
          {...params}
          label={noTraduceLabel?label:formatMessage({id:label})}
          inputProps={{
            ...params.inputProps,
            autoComplete: "off", // disable autocomplete and autofill
          }}
        />
      )}
    />
  );
};
