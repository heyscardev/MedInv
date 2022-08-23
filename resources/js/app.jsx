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
const appName = window.document.getElementsByTagName("title")[0]?.innerText || "Laravel";

createInertiaApp({
  title: (title) => `${title} - ${appName}`,
  resolve: (name) => resolvePageComponent(`./Pages/${name}.jsx`, import.meta.glob("./Pages/**/*.jsx")),
  setup({ el, App, props }) {
    removeLoader();
    return render(
      <ThemeProvider theme={theme}>
        <App {...props}>
          {({ Component, key, props }) => (
            <div>
              {(route().t.url !== props.ziggy.location && props.auth.user) && <NavBar auth={props.auth} />}
              <Component {...props} />
            </div>
          )}
        </App>
        <NotificationContainer />
      </ThemeProvider>,
      el
    );
  },
});

InertiaProgress.init({ color: "#4B5563" });
