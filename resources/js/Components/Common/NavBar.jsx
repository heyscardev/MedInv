import { Dashboard, Home, Masks, Medication, People, Scale, Sick, Store } from "@mui/icons-material";
import AccountCircle from "@mui/icons-material/AccountCircle";
import MenuIcon from "@mui/icons-material/Menu";
import MoreIcon from "@mui/icons-material/MoreVert";
import NotificationsIcon from "@mui/icons-material/Notifications";
import { useTheme } from "@mui/material";
import AppBar from "@mui/material/AppBar";
import Badge from "@mui/material/Badge";
import Box from "@mui/material/Box";
import IconButton from "@mui/material/IconButton";
import Menu from "@mui/material/Menu";
import MenuItem from "@mui/material/MenuItem";
import Toolbar from "@mui/material/Toolbar";
import * as React from "react";
import BtnUserSession from "../Auth/BtnUserSession";
import LogoTypography from "../LogoTypography";
import BtnLink from "./BtnLink";
import SideBar from "./SideBar";

export default ({ auth, can }) => {
    const [mobileMoreAnchorEl, setMobileMoreAnchorEl] = React.useState(null);
    const [openSideBar, setOpenSideBar] = React.useState(false);
    const isMobileMenuOpen = Boolean(mobileMoreAnchorEl);
    const { permissions: p } = auth;
const {palette} = useTheme();
    const pages = [
        ["Inicio", route().t.url, <Home />],
        ["Dashboard", route("dashboard"), <Dashboard />],
           can('user.index') ? ["Usuarios", route("user.index"), <People />] : null,
    can('medicament.index') ? ["Medicamentos", route("medicament.index"), <Medication />] : null,
    can('unit.index') ? ["Unidades", route("unit.index"), <Scale />] : null,
    can('doctor.index') ? ["Doctores", route("doctor.index"), <Masks />] : null,
    can('patient.index') ? ["Pacientes", route("patient.index"), <Sick />] : null,
        can("module.index")
            ? ["Modulos", route("module.index"), <Store />]
            : null,
    ];

    const toggleSideBar = (event) => {
        setOpenSideBar(!openSideBar);
    };

    const handleMobileMenuClose = () => {
        setMobileMoreAnchorEl(null);
    };
    const handleMobileMenuOpen = (event) => {
        setMobileMoreAnchorEl(event.currentTarget);
    };

    const mobileMenuId = "primary-search-account-menu-mobile";
    const renderMobileMenu = (
        <Menu
            anchorEl={mobileMoreAnchorEl}
            anchorOrigin={{
                vertical: "bottom",
                horizontal: "right",
            }}
            id={mobileMenuId}
            keepMounted
            transformOrigin={{
                vertical: "top",
                horizontal: "right",
            }}
            open={isMobileMenuOpen}
            onClose={handleMobileMenuClose}
        >
            <MenuItem>
                <IconButton
                    size="large"
                    aria-label="show 17 new notifications"
                    color="inherit"
                >
                    <Badge badgeContent={17} color="error">
                        <NotificationsIcon color="info" />
                    </Badge>
                </IconButton>
                <p>Notificaciones</p>
            </MenuItem>
            <BtnUserSession
                auth={auth}
                transformOrigin={{
                    horizontal: "right",
                    vertical: "top",
                }}
                anchorOrigin={{
                    horizontal: "left",
                    vertical: "top",
                }}
                BtnOpenMenu={({ onclickMenu }) => (
                    <MenuItem onClick={onclickMenu}>
                        <IconButton
                            size="large"
                            aria-label="account of current user"
                            aria-controls="primary-search-account-menu"
                        >
                            <AccountCircle color="primary" />
                        </IconButton>
                        <p>Perfil</p>
                    </MenuItem>
                )}
            />
        </Menu>
    );

    return (
        <Box sx={{ flexGrow: 1 }}>
            <AppBar position="fixed" sx={{ background: palette.secondaryGradient.main, backgroundColor:"transparent" }}>
                <Toolbar variant="dense" >
                    <IconButton
                        size="large"
                        edge="start"
                        sx={{ display: { lg: "none" }, mr: 2 }}
                        color="info"
                        onClick={toggleSideBar}
                    >
                        <MenuIcon />
                    </IconButton>
                    <LogoTypography variant="h4" WelcomeLink />

                    <Box sx={{ flexGrow: 1 }} />
                    <Box
                        sx={{
                            flexGrow: 1,
                            display: { xs: "none", lg: "flex" },
                        }}
                    >
                        {pages.map((page) =>
                            page ? (
                                <BtnLink
                                    startIcon={page[2]}
                                    key={page[0]}
                                    href={page[1]}
                                    sx={{ m: "0 10px", my: 2 }}
                                >
                                    {page[0]}
                                </BtnLink>
                            ) : null
                        )}
                    </Box>

                    <Box sx={{ display: { xs: "none", md: "flex" } }}>
                        <IconButton
                            size="large"
                            aria-label="show 17 new notifications"
                            color="inherit"
                        >
                            <Badge badgeContent={17} color="error">
                                <NotificationsIcon color="info" />
                            </Badge>
                        </IconButton>
                        <BtnUserSession
                            auth={auth}
                            BtnOpenMenu={({ onclickMenu }) => (
                                <IconButton
                                    size="large"
                                    edge="end"
                                    aria-label="account of current user"
                                    aria-haspopup="true"
                                    color="inherit"
                                    onClick={onclickMenu}
                                >
                                    <AccountCircle color="info" />
                                </IconButton>
                            )}
                        />
                    </Box>
                    <Box sx={{ display: { xs: "flex", md: "none" } }}>
                        <IconButton
                            size="large"
                            aria-label="show more"
                            aria-controls={mobileMenuId}
                            aria-haspopup="true"
                            onClick={handleMobileMenuOpen}
                            color="inherit"
                        >
                            <MoreIcon color="info" />
                        </IconButton>
                    </Box>
                </Toolbar>
            </AppBar>
            {renderMobileMenu}
            <SideBar
                listBtn={pages}
                open={openSideBar}
                onClose={toggleSideBar}
            />

      <Toolbar />
        </Box>
    );
};
