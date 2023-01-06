import IconButton from "@/Components/Custom/IconButton";
import WelcomeViewFirst from "@/Components/Layouts/Welcome/WelcomeViewFirst";
import { visit } from "@/HTTPProvider";
import { Head } from "@inertiajs/inertia-react";
import { MedicalInformation } from "@mui/icons-material";
import { Grid, useTheme } from "@mui/material";
import React from "react";

const styleContainers={
  position: "relative",
  height:"100%"
}


export default function Welcome(props) {
  const {palette} = useTheme();
  return (
    <div style={{
      position:"absolute",
      width:"100%",
      top: 0,
      bottom: 0,
      height: "100%"
    }} >
      <Head title="Bienvenido"/>
   <WelcomeViewFirst styleContainer={styleContainers} {...props}/>
   <IconButton onClick={()=>visit(route("information"))} placement="left" color="primary" variant="outlined" title="SystemInformation" sx={{position:"fixed",bottom:20,right:20}}>
        <MedicalInformation />
      </IconButton>
    </div>
  );
}
