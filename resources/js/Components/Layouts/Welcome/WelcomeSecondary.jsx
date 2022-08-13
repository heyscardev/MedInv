import { Grid, SvgIcon, Typography, useTheme } from "@mui/material";
import PrincipalImage from "@/assets/svg/doctors_hwty.svg";
import { Image } from "@mui/icons-material";

export default ({ styleContainer }) => {
  const { primary,secondary } = useTheme().palette;

  return (
    <Grid
      container
      sx={{
        ...styleContainer,
        backgroundColor:secondary.main
      }}
    >
      <Grid item xs={6}  >
        <Typography variant="h5">Enrutamiento de medicamentos en todos Momento</Typography>
      </Grid>
      <Grid item xs={6} >
        <img src={PrincipalImage} style={{objectFit:"cover", width:"100%"}}/>
      </Grid>
    </Grid>
  );
};
