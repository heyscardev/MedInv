import {
  Assessment,
  Dashboard,
  Home,
  Masks,
  Medication,
  MoveDown,
  People,
  PeopleAltOutlined,
  Receipt,
  Scale,
  ShoppingCart,
  Sick,
  Store,
} from '@mui/icons-material'
import AccountCircle from '@mui/icons-material/AccountCircle'
import MenuIcon from '@mui/icons-material/Menu'
import MoreIcon from '@mui/icons-material/MoreVert'
import NotificationsIcon from '@mui/icons-material/Notifications'
import { useTheme } from '@mui/material'
import AppBar from '@mui/material/AppBar'
import Badge from '@mui/material/Badge'
import Box from '@mui/material/Box'
import IconButton from '@mui/material/IconButton'
import Menu from '@mui/material/Menu'
import MenuItem from '@mui/material/MenuItem'
import Toolbar from '@mui/material/Toolbar'
import * as React from 'react'
import BtnUserSession from '../Auth/BtnUserSession'
import LogoTypography from '../LogoTypography'
import BtnLink from './BtnLink'
import SideBar from './SideBar'

export default ({ auth, can }) => {
  const [mobileMoreAnchorEl, setMobileMoreAnchorEl] = React.useState(null)
  const [openSideBar, setOpenSideBar] = React.useState(false)
  const isMobileMenuOpen = Boolean(mobileMoreAnchorEl)
  const { permissions: p } = auth
  const { palette } = useTheme()
  const pages = [
    /* ['Inicio', route().t.url, <Home />], */
    ['Dashboard', route('dashboard'), <Dashboard />],
 can('user.index') ? ['Usuarios', route('user.index'), <People />] : null,
    can('doctor.index') ? ['Doctores', route('doctor.index'), <Masks />] : null,
    can('patient.index')
      ? ['Pacientes', route('patient.index'), <Sick />]
      : null,
    can('medicament.index')
      ? ['Medicamentos', route('medicament.index'), <Medication />]
      : null,
    can('module.index') ? ['Modulos', route('module.index'), <Store />] : null,
    /*  can('unit.index') ? ["Unidades", route("unit.index"), <Scale />] : null, */
    can('buy.index') ? ['Compras', route('buy.index'), <ShoppingCart />] : null,
    can('transfer.index')
      ? ['Transferencias', route('transfer.index'), <MoveDown />]
      : null,
    can('recipe.index')
      ? ['Recipes', route('recipe.index'), <Receipt />]
      : null,
      can('user.activity.index')
      ? [
        'Actividad del Usuario',
         route('user.activity.index'),
          <PeopleAltOutlined />,
      ]
      : null,
    can('report.index')
      ? 
        [
          'Reportes',
         route('report.index'),
        <Assessment />,
        ]
        
      : null,
      [
        'Información del Sistema',
       route('information'),
      <Assessment />,
      ]
  ]

  const toggleSideBar = (event) => {
    setOpenSideBar(!openSideBar)
  }

  const handleMobileMenuClose = () => {
    setMobileMoreAnchorEl(null)
  }
  const handleMobileMenuOpen = (event) => {
    setMobileMoreAnchorEl(event.currentTarget)
  }

  const mobileMenuId = 'primary-search-account-menu-mobile'


  return (
    <Box sx={{ flexGrow: 1 }}>
      <AppBar
        position="fixed"
        sx={{
          background: palette.secondaryGradient.main,
          backgroundColor: 'transparent',
        }}
      >
        <Toolbar variant="regular">
          <IconButton
            size="large"
            edge="start"
            sx={{ mr: 2 }}
            color="info"
            onClick={toggleSideBar}
          >
            <MenuIcon />
          </IconButton>
          <LogoTypography variant="h4" WelcomeLink imgSize={40} />

          <Box sx={{ flexGrow: 1 }} />
          <Box
            sx={{
              flexGrow: 1,
              display: { xs: 'none'},
            }}
          >
            {pages.map((page) =>
              page ? (
                <BtnLink
                  startIcon={page[2]}
                  key={page[0]}
                  href={page[1]}
                  sx={{ m: '0 10px', my: 2 }}
                >
                  {page[0]}
                </BtnLink>
              ) : null,
            )}
          </Box>

          <Box >
            {/*      <IconButton
                            size="large"
                            aria-label="show 17 new notifications"
                            color="inherit"
                        >
                            <Badge badgeContent={17} color="error">
                                <NotificationsIcon color="info" />
                            </Badge>
                        </IconButton> */}
            <BtnUserSession
              auth={auth}
              can={can}
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
       
        </Toolbar>
      </AppBar>
      <SideBar listBtn={pages} open={openSideBar} onClose={toggleSideBar} />

      <Toolbar />
    </Box>
  )
}
