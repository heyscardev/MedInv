import Autocomplete from "@/Components/Custom/Autocomplete";
import { Box } from "@mui/material";

export default ({
  onChange,
  onInputChange,
  medicaments,
  renderOption = (props, option) => (
    <Box {...props} component="li" key={option.id} {...props}>
      {`${option.code} (${option.name}) ${option.unit.name}`}
    </Box>
  ),
  ...rest
}) => {
  return (
    <Autocomplete
      label="medicaments"
      options={medicaments}
      getOptionLabel={(option) => option.code + option.name + " " +option.unit.name}
      renderOption={renderOption}
      onChange={onChange}
      onInputChange={onInputChange}
      {...rest}
    />
  );
};
