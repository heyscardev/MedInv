import { createTheme } from "@mui/material/styles";

const MedinvTheme = createTheme({
  palette: {
    primary: {
      main: "#18a1d4",
      light:"#c7ebf6"
    },
    secondary: {
      main: "#eaeaea",
      dark:"#808080"
    },
    error: {
      main: "#ff5f76",
    },
    info: {
      main: "#c7ebf6",
    },
    success: {
      main: "#beefbe",
    },
    warning: {
      main: "#ff965f",
    },
    white: {
      main: "#ffffff",
    },
  },
});
export default MedinvTheme;
