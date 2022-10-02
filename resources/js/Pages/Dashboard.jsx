import DashboardButton from "@/Components/Common/DashboardButton";
import { Assessment, Medication, MoveUp, ShoppingCart, Store } from "@mui/icons-material";
import { Grid, Paper } from "@mui/material";
import { Fragment } from "react";

export default ({ can, auth }) => {
  const pages = [
    /*    can('user.index') ? ["Usuarios", route("user.index"), <People />] : null,
    can('medicament.index') ? ["Medicamentos", route("medicament.index"), <Medication />] : null,
    can('unit.index') ? ["Unidades", route("unit.index"), <Scale />] : null,
    can('doctor.index') ? ["Doctores", route("doctor.index"), <Masks />] : null,
    can('patient.index') ? ["Pacientes", route("patient.index"), <Sick />] : null, */

    can("module.index") ? { name: "modules", route: route("module.index"), Icon: Store } : null,
    can("medicament.index")
      ? {
          name: "medicaments",
          route: route("medicament.index"),
          Icon: Medication,
        }
      : null,
    can("buy.index") ? { name: "buys", route: route("buy.index"), Icon: ShoppingCart } : null,
    can("transfer.index")
      ? {
          name: "transfers",
          route: route("buy.index"),
          Icon: MoveUp,
          outlined: true,
          disabled: true,
        }
      : null,
    can("report.index")
      ? {
          name: "reports",
          route: route("buy.index"),
          Icon: Assessment,
          outlined: true,
          disabled: true,
        }
      : null,
  ];
  return (
    <Fragment>
      <Paper>{`Bienvenido a medinv ${auth.user.first_name} ${auth.user.last_name}`}</Paper>
      <Grid container spacing={4} justifyContent="space-between" alignItems="center" padding={4}>
        {pages.map((page) =>
          page ? (
            <Grid key={page.route} item xs={12} sm={6} md={3} xl={2} justifyContent="center" display="flex">
              <DashboardButton {...page} />
            </Grid>
          ) : null
        )}
      </Grid>
    </Fragment>
  );
};
