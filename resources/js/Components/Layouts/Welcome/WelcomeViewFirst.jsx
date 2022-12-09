import { Box, Button, Grid, IconButton, Typography, useTheme, Container, Paper } from "@mui/material";
import PrincipalImage from "@/assets/images/welcome-principal.jpg";
import SkewOrnament from "@/Components/Ornaments/SkewOrnament";
import { KeyboardArrowDown, PersonOutline } from "@mui/icons-material";
import { useState } from "react";
import SingInModal from "../../Auth/SingInModal";
import { showLoader } from "@/Config/Loader";
import BtnUserSession from "@/Components/Auth/BtnUserSession";
import { visit } from "@/HTTPProvider";

export default ({ styleContainer,auth,can }) => {

  const { palette } = useTheme();
  const [openSigIn, setOpenSigIn] = useState(false);
  return (
    <Grid
      container
      sx={{
        ...styleContainer,
        background: `${palette.gradientTransparent.black75},url(${PrincipalImage})`,
        backgroundSize: "cover",
        backgroundAttachment: "fixed",
      }}
      justifyContent="center"
    >
      <div style={{ position: "absolute", height: "100%", display: "flex", left: 0 }}>
        <SkewOrnament color={palette.skewOrnament.main} />
        <SkewOrnament color={palette.skewOrnament.light} />
      </div>
      <Box sx={{ top: 15, right: 15, position: "absolute", zIndex: "9" }}>
        {auth.user 
        ?(<BtnUserSession auth={auth} can={can}/>)
        :(<IconButton
          size="small"
          sx={{ border: `1px solid`, borderColor: "primary.light" }}
          color="primary"
          onClick={() => {
            
            setOpenSigIn(true);
          }}
        >
          <PersonOutline color="white" />
        </IconButton>
      )}
      </Box>

      <Grid
        xs={10}
        sm={8}
        md={6}
        container
        direction="column"
        item
        zIndex={1}
        spacing={2}
        alignItems="center"
        justifyContent="flex-end"
        textAlign="center"
        marginBottom={12}
      >
        <Grid>
          <Typography
            gutterBottom={false}
            variant="h1"
            fontSize={160}
            color="primary"
            fontWeight="bolder"
            flexWrap="wrap"
            display="flex"
          >
            <span style={{ color: palette.primary.main }}>Med</span>
            <span style={{ color: palette.primary.light }}>Inv</span>
          </Typography>
        </Grid>
        <Grid>
          <Typography
            variant="h3"
            gutterBottom
            color="secondary.dark"
            fontWeight="bolder"
            children="Medicament Inventory"
          />
        </Grid>
        <Grid>
          <Typography
            variant="subtitle1"
            fontWeight="normal"
            color="primary.light"
            children="Llevamos la organización de los Medicamentos a otro nivel"
            paragraph
          />
        </Grid>
        <Grid>
          <IconButton
            onClick={() => {
              visit(route('dashboard'))
            }}
            size="large"
            sx={{ border: `3px solid`, borderColor: "primary.light" }}
          >
            <KeyboardArrowDown color="primary" fontSize="large" />
          </IconButton>
        </Grid>
      </Grid>
      <SingInModal
        open={openSigIn}
        onClose={() => {
          setOpenSigIn(false);
        }}
      />
    </Grid>
  );
};
