import Box from "@mui/material/Box";
import Divider from "@mui/material/Divider";
import Drawer from "@mui/material/Drawer";
import List from "@mui/material/List";
import ListItem from "@mui/material/ListItem";
import * as React from "react";
import LogoTypography from "../LogoTypography";
import BtnLink from "./BtnLink";

export default ({ open = true, orientation = "left", listBtn ,onClose}) => {
  return (
    <div >
      <Drawer anchor={orientation} open={open} onClose={onClose}>
        {list(listBtn)}
      </Drawer>
    </div>
  );
};

const list = (list) => (
  <Box sx={{ width: 250 }} role="presentation">
    <Box padding="20px 0px" bgcolor="primary.dark">
        <LogoTypography variant="h4" WelcomeLink />
    </Box>
    <List>
      {list.map((item) => (
        <React.Fragment key={item[0]}>
          <ListItem  key={item[0]} disablePadding>
           {/*  <ListItemButton sx={{backgroundColor:"primary.main"}} onClick={()=>visit(item[1])}>
              
              <ListItemText  primary={item[0]} />
            </ListItemButton> */}
            <BtnLink variant="list" href={item[1]} sx={{color:"primary.main"}} icon={item[2]}>
            
                {item[0]}
            </BtnLink>
          </ListItem>
        </React.Fragment>
      ))}
          <Divider />
      </List>
  </Box>
);
