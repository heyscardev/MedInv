import SkewOrnament from "@/Components/Ornaments/SkewOrnament";
import { createTheme } from "@mui/material/styles";

const MedinvTheme = createTheme({
  palette: {
    primary: {
      dark:"#036C93",
      main: "#18a1d4",
      light: "#c7ebf6",
    },
    secondary: {
      main: "#eaeaea",
      dark: "#808080",
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
    gradientTransparent: {
      black75: "linear-gradient(rgba(0,0,0,.25) 0%, rgba(0,0,0,.70) 100%)",
    },
    skewOrnament: {
      main: "rgba(199,235,246,.78)",
      light: "rgba(24,161,212,.57)",
    },
  },
  components: {
    MuiSpeedDial:{
      defaultProps:{
        sx:{ position: "absolute", bottom: 16, right: 16 }
        
      }
    },
    MuiSpeedDialAction: {
      defaultProps: {
        sx:{
          color:"primary.main",
          ":hover":{
            backgroundColor:"primary.dark",
            color:"#fff"
          }
        }
      },
    },
  },

});
export default MedinvTheme;
