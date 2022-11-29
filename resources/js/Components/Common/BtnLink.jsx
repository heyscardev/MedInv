import { visit } from "@/HTTPProvider";
import { usePage } from "@inertiajs/inertia-react";
import { Button, ListItemButton, ListItemIcon } from "@mui/material";

export default (props) => {
  const { location } = usePage().props.ziggy;
  const { href, onClick } = props;
  const active = href && href === location;
  return props.variant !== "list" ? (
    <Button
      variant="text"
      color="info"
      disabled={active}
      style={active ? { borderBottom: "2px solid #fff", color: "#fff", borderRadius: 0, userSelect: "contain",fontSize:"10px" } : {fontSize:"10px"}}
      {...props}
      onClick={(e) => {
        e.preventDefault();
        visit(href);
        if (onClick) onClick(e);
      }}
    />
  ) : (
    <ListItemButton
      disabled={active}
      {...props}
      sx={active ? { backgroundColor: "primary.dark", color: "#fff" } : null}
      style={active ? { opacity: 1 } : null}
      onClick={(e) => {
        e.preventDefault();
        visit(href);
        if (onClick) onClick(e);
      }}
    >
      <ListItemIcon sx={{color:active?"#fff":'primary.main'}}>{props.icon}</ListItemIcon>
      {props.children}
      {}
      {/*       <ListItemIcon sx={{ color: "primary.main" }}>{pro}</ListItemIcon>
      <ListItemText primary={item[0]} /> */}
    </ListItemButton>
  );
};
