import { visit } from "@/HTTPProvider";
import { Typography, useTheme } from "@mui/material";
import _ from "lodash";

const toWelcome = (e)=>{
visit("/")
}
export default ({ variant = "h1", color1, color2, fontWeight = "bolder", fontSize, gutterBottom = false ,WelcomeLink}) => {
  const { palette } = useTheme();
  return (
    <span onClick={WelcomeLink ?toWelcome:(e)=>{}} style={{cursor:WelcomeLink ?"default":"pointer"}}>
    <Typography
      gutterBottom={gutterBottom}
      variant={variant}
      fontWeight={fontWeight}
      fontSize={fontSize}
      flexWrap="wrap"
      display="flex"
      textAlign="center"
      justifyContent="center"
      
    >
      <span style={{ color: _.get(palette, color1, undefined) || palette.primary.main }}>Med</span>
      <span style={{ color: _.get(palette, color2, undefined) || palette.primary.light }}>Inv</span>
    </Typography>
    </span>
  );
};
