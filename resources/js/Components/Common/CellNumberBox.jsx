import { Box } from "@mui/system";
import parameters from "@/Config/parameters.json";
import IntlFormatNumber from "../Custom/IntlFormatNumber";
export default ({value,min,max}) => {
  return (
    <Box
      sx={(theme) => ({
        backgroundColor:
          value < (min || parameters.minInventory)
            ? theme.palette.error.main
            : value >= (min ||parameters.minInventory) && value < (max || parameters.maxInventory)
            ? theme.palette.primary.main
            : theme.palette.primary.dark,
        borderRadius: "0.25rem",
        color: "#fff",
        p: "0.25rem",
        textAlign: "right",
      })}
    >
      <IntlFormatNumber value={value} />
    </Box>
  );
};
