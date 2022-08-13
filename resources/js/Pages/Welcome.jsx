import WelcomeViewFirst from "@/Components/Layouts/Welcome/WelcomeViewFirst";
import { Head } from "@inertiajs/inertia-react";
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
   <WelcomeViewFirst styleContainer={styleContainers} auth={props.auth} />
    </div>
  );
}
