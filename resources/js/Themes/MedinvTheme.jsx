import SkewOrnament from "@/Components/Ornaments/SkewOrnament";
import { createTheme } from "@mui/material/styles";

const MedinvTheme = createTheme({

  palette: {
    primary: {
      dark: "#036C93",
      main: "#18a1d4",
      light: "#c7ebf6",
    },
    secondary: {
      main: "#eaeaea",
      dark: "#808080",
    },
    secondaryGradient: {
      main:"linear-gradient(to left, #1488cc, #036C93 40%)",
    },
    error: {
      main: "#ff5f76",
      dark: "red",
    },
    info: {
      main: "#c7ebf6",
    },
    success: {
      main: "#beefbe",
      dark: "green",
    },
    warning: {
      main: "#ff965f",
      dark: "orange",
    },
    white: {
      main: "#ffffff",
    },
    gradientTransparent: {
      black75: "linear-gradient(rgba(0,0,0,.25) 0%, rgba(0,0,0,.70) 100%)",
    },
    skewOrnament: {
      main: "rgba(199,235,246,.78)",
      light: "rgba(24,161,212,.57)",
    },
  },
  typography: {
    // In Chinese and Japanese the characters are usually larger,
    // so a smaller fontsize may be appropriate.
    fontSize: 12,
  },

  components: {
    MuiSpeedDial: {
      defaultProps: {
        sx: { position: "absolute", bottom: 16, right: 16 },
      },
    },
    MuiSpeedDialAction: {
      defaultProps: {
        sx: {
          color: "primary.main",
          ":hover": {
            backgroundColor: "primary.dark",
            color: "#fff",
          },
        },
      },
    },
  },
});
export default MedinvTheme;
