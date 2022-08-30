import "./bootstrap";
import "../css/app.css";

import React from "react";
import { render } from "react-dom";
import { createInertiaApp } from "@inertiajs/inertia-react";
import { InertiaProgress } from "@inertiajs/progress";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import theme from "./Themes/MedinvTheme";
import { ThemeProvider } from "@mui/material";

import { removeLoader } from "./Config/Loader";
import NotificationContainer from "./Components/NotificationContainer";
import NavBar from "./Components/Common/NavBar";
import { IntlProvider } from "react-intl";
import appLocale from '@/lngProvider'

const appName = window.document.getElementsByTagName("title")[0]?.innerText || "Laravel";

createInertiaApp({
  title: (title) => `${title} - ${appName}`,
  resolve: (name) => resolvePageComponent(`./Pages/${name}.jsx`, import.meta.glob("./Pages/**/*.jsx")),
  setup({ el, App, props }) {
    removeLoader();
    return render(
      <ThemeProvider theme={theme}>
        <IntlProvider locale="es" messages={appLocale.es}>
          <App {...props}>
            {({ Component, key, props }) => (
              <div>
                {route().t.url !== props.ziggy.location && props.auth.user && <NavBar auth={props.auth} />}
                <Component {...props} />
              </div>
            )}
          </App>
        </IntlProvider>
        <NotificationContainer />
      </ThemeProvider>,
      el
    );
  },
});

InertiaProgress.init({ color: "#4B5563" });
