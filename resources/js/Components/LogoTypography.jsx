import { visit } from "@/HTTPProvider";
import { Typography, useTheme } from "@mui/material";
import _ from "lodash";
import { useIntl } from "react-intl";

const toWelcome = (e)=>{
visit("/")
}
export default ({ variant = "h1", color1, color2, fontWeight = "bolder", fontSize, gutterBottom = false ,WelcomeLink,subtitle,...props}) => {
  const { palette } = useTheme();
  const {formatMessage} = useIntl();
  return (
    <span onClick={WelcomeLink ?toWelcome:(e)=>{}} style={{cursor:WelcomeLink ?"default":"pointer",...props}}>
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
    <div style={{ textAlign: "center" }}>
        {subtitle && <Typography variant="h5" color="secondary.dark" children={formatMessage({id:subtitle})} />}
      </div>
    </span>
  );
};
