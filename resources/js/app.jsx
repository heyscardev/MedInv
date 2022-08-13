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
const appName = window.document.getElementsByTagName("title")[0]?.innerText || "Laravel";

createInertiaApp({
  title: (title) => `${title} - ${appName}`,
  resolve: (name) => resolvePageComponent(`./Pages/${name}.jsx`, import.meta.glob("./Pages/**/*.jsx")),
  setup({ el, App, props }) {
    removeLoader();
    return render(
      <ThemeProvider theme={theme}>
      <App {...props} />
      <NotificationContainer />
    </ThemeProvider>, el);
  },
});

InertiaProgress.init({ color: "#4B5563" });
