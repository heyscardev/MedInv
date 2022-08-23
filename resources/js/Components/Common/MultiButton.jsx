import * as React from "react";
import Box from "@mui/material/Box";
import Backdrop from "@mui/material/Backdrop";
import SpeedDial from "@mui/material/SpeedDial";
import SpeedDialIcon from "@mui/material/SpeedDialIcon";
import SpeedDialAction from "@mui/material/SpeedDialAction";
import FileCopyIcon from "@mui/icons-material/FileCopyOutlined";
import SaveIcon from "@mui/icons-material/Save";
import PrintIcon from "@mui/icons-material/Print";
import ShareIcon from "@mui/icons-material/Share";

const actionsDefault = [
  {
    icon: <FileCopyIcon />,
    name: "Copiar",
    onClick: (e) => {
      console.log("copiar");
    },
  },
  {
    icon: <SaveIcon />,
    name: "Guardar",
    onClick: (e) => {
      console.log("Guardar");
    },
  },
  {
    icon: <PrintIcon />,
    name: "Print",
    onClick: (e) => {
      console.log("Print");
    },
  },
  {
    icon: <ShareIcon />,
    name: "Share",
    onClick: (e) => {
      console.log("Share");
    },
  },
];

export default ({ actions = actionsDefault }) => {
  const [open, setOpen] = React.useState(false);
  const handleOpen = () => setOpen(true);
  const handleClose = () => setOpen(false);

  return (
    <Box sx={{  transform: "translateZ(0px)", flexGrow: 1, position:"fixed",top:open?0:null,left:open?0:null,bottom:0,right:0,zIndex:2}}>
      <Backdrop open={open} />  
      <SpeedDial
        ariaLabel="SpeedDial tooltip example"
        icon={<SpeedDialIcon />}
        onClose={handleClose}
        onOpen={handleOpen}
        open={open}
      >
        {actions.map((action) => (
          <SpeedDialAction
            key={action.name}
            icon={action.icon}
            tooltipTitle={action.name}
            onClick={(e) => {
              handleClose(e);
              action.onClick(e);
            }}
          />
        ))}
      </SpeedDial>
    </Box>
  );
};
