import {
    Box,
    Button,
    Container,
    ListItemIcon,
    Menu,
    MenuItem,
    Typography,
    useTheme,
} from "@mui/material";
import * as React from "react";
import Person from "@mui/icons-material/Person";
import { logout } from "@/Services/UserService";
import { visit } from "@/HTTPProvider";
import { Dashboard, Logout, Settings } from "@mui/icons-material";

export default ({
    auth,
    BtnOpenMenu,
    transformOrigin = {
        vertical: "top",
        horizontal: "right",
    },
    anchorOrigin = {
        vertical: "bottom",
        horizontal: "right",
    },
}) => {
    const { primary } = useTheme().palette;
    const [anchorEl, setAnchorEl] = React.useState(null);
    const open = Boolean(anchorEl);
    const handleClick = (event) => {
        setAnchorEl(event.currentTarget);
    };
    const handleClose = () => {
        setAnchorEl(null);
    };

    return (
        <React.Fragment>
            {BtnOpenMenu ? (
                <BtnOpenMenu onclickMenu={handleClick} />
            ) : (
                <Button
                    id="basic-demo-button"
                    aria-controls={open ? "basic-menu" : undefined}
                    aria-haspopup="true"
                    aria-expanded={open ? "true" : undefined}
                    variant="text"
                    color="white"
                    startIcon={<Person color="primary" />}
                    onClick={handleClick}
                >
                    <Typography variant="body2" color="primary">
                        {auth.user.first_name}
                    </Typography>
                </Button>
            )}

            <Menu
                id="basic-menu"
                anchorEl={anchorEl}
                open={open}
                onClose={handleClose}
                anchorOrigin={anchorOrigin}
                transformOrigin={transformOrigin}
                aria-labelledby="basic-demo-button"
                MenuListProps={{
                    sx: {
                        borderBottom: `5px solid ${primary.main}`,
                        paddingTop: 0,
                    },
                }}
            >
                <Container
                    sx={{
                        backgroundColor: "primary.main",
                        padding: "10px 3px",
                    }}
                >
                    <Typography
                        variant="body1"
                        fontWeight="bold"
                        color="secondary"
                    >
                        {auth.user.first_name}
                    </Typography>
                    <Typography variant="body2" color="primary.dark">
                        {auth.user.email}
                    </Typography>
                </Container>
                <MenuItem
                    onClick={() => {
                        visit(route("dashboard"));
                    }}
                >
                    <ListItemIcon>
                        <Dashboard fontSize="small" color="primary" />
                    </ListItemIcon>
                    Dashboard
                </MenuItem>
                <MenuItem
                    onClick={() => {
                        visit(route("dashboard", {page:'preferences'} ));
                    }}
                >
                    <ListItemIcon>
                        <Settings fontSize="small" color="primary" />
                    </ListItemIcon>
                    preferencias
                </MenuItem>
                <MenuItem onClick={logout}>
                    <ListItemIcon>
                        <Logout fontSize="small" color="primary" />
                    </ListItemIcon>
                    Cerrar Sesión
                </MenuItem>
            </Menu>
        </React.Fragment>
    );
};
