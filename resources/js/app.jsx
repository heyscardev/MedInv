import './bootstrap'
import '../css/app.css'

import React from 'react'
import { render } from 'react-dom'
import { createInertiaApp } from '@inertiajs/inertia-react'
import { InertiaProgress } from '@inertiajs/progress'
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers'
import theme from './Themes/MedinvTheme'
import { es } from 'date-fns/locale'
import { AdapterDateFns } from '@mui/x-date-pickers/AdapterDateFns'
import { Box, ThemeProvider } from '@mui/material'

import { removeLoader } from './Config/Loader'
import NotificationContainer from './Components/NotificationContainer'
import NavBar from './Components/Common/NavBar'
import { IntlProvider } from 'react-intl'
import appLocale from '@/lngProvider'
import { LocalizationProvider } from '@mui/x-date-pickers'

const appName =
  window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel'
const can = (permissions, user) => (PermissionName) => {
  if (
    user.roles &&
    user.roles.reduce(
      (previus, value) => (!previus ? value.name === 'administrador' : previus),
      null,
    )
  )
    return true
  if (permissions && permissions.includes(PermissionName)) return true
  return false
}

createInertiaApp({
  title: (title) => `${title} - ${appName}`,
  resolve: (name) =>
    resolvePageComponent(
      `./Pages/${name}.jsx`,
      import.meta.glob('./Pages/**/*.jsx'),
    ),
  setup({ el, App, props }) {
    removeLoader()

    return render(
      <ThemeProvider theme={theme}>
        <IntlProvider locale="es" messages={appLocale.es}>
          <App {...props}>
            {({ Component, key, props }) => (
              <LocalizationProvider
                adapterLocale={es}
                dateAdapter={AdapterDateFns}
              >
                <div>
                  {route().t.url !== props.ziggy.location &&
                    props.auth.user && (
                      <NavBar
                        auth={props.auth}
                        can={can(props.auth.permissions, props.auth.user)}
                      />
                    )}
                  <Box sx={{ margin: 0, marginBottom: 3 }}>
                    <Component
                      {...props}
                      can={can(props.auth.permissions, props.auth.user)}
                    />
                  </Box>
                </div>
              </LocalizationProvider>
            )}
          </App>
        </IntlProvider>
        <NotificationContainer />
      </ThemeProvider>,
      el,
    )
  },
})

InertiaProgress.init({ color: '#4B5563' })
