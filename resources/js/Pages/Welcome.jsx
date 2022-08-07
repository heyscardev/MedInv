import React, { useState } from "react";
import { Link, Head } from "@inertiajs/inertia-react";
import { Box, Container, Grid, IconButton, Typography, useTheme, Zoom } from "@mui/material";
import PrincipalImage from "@/assets/images/welcome-principal.jpg";
import SkewOrnament from "@/Components/Ornaments/SkewOrnament";
import { KeyboardArrowDown } from "@mui/icons-material";
import Button from "@/Components/Button";
const principalStyle = {
  background: `url(${PrincipalImage})`,
  height: "100vh",
};

export default function PrimarySearchAppBar() {
  const {palette} = useTheme();
  return (
    <Grid
      container
      sx={{
        background: `linear-gradient(rgba(0,0,0,.25) 0%, rgba(0,0,0,.70) 100%),url(${PrincipalImage})`,
        height: "100vh",
        backgroundSize: "cover",
        backgroundAttachment: "fixed",
      }}
      justifyContent="center"
    >
      <div style={{ position: "absolute", height: "100%", display: "flex", left: 0 }}>
        <SkewOrnament color="rgba(199,235,246,.78)" />
        <SkewOrnament />
      </div>

      <Grid xs={10} sm={8} md={6} container direction="column" item  zIndex={1} spacing={2} alignItems="center" justifyContent="flex-end" textAlign="center" marginBottom={12}>
        <Grid>
          <Typography gutterBottom={false} variant="h1" fontSize={150} color="primary" fontWeight="bolder" children="MedInv" />
        </Grid>
        <Grid>
          <Typography variant="h4" fontSize={60} gutterBottom color="secondary.dark" fontWeight="bolder" children="Medicament Inventory" />
        </Grid>
        <Grid>
          <Typography variant="body" fontSize={30} fontWeight="bolder" color="primary.light" children="Llevamos la organización de los Medicamentos
 a otro nivel" paragraph />
        </Grid>
        <Grid>
          <Zoom>
          <IconButton size="large" sx={{ border: `3px solid`, borderColor: "primary.main" }}>
            <KeyboardArrowDown color="primary" fontSize="large" />
          </IconButton>
          </Zoom>
        </Grid>
      </Grid>
    </Grid>
  );
}
