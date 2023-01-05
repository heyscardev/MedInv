import LogoTypography from '@/Components/LogoTypography'
import { Check, Inbox } from '@mui/icons-material'
import {
  Container,
  Grid,
  List,
  ListItem,
  ListItemButton,
  ListItemIcon,
  ListItemText,
  Paper,
  Stack,
  Typography,
} from '@mui/material'

export default () => {
  return (
    <Stack>
      <LogoTypography subtitle="SystemInformation" />

      <Container maxWidth="md">
        <Paper sx={{ marginTop: 2, padding: 2 }}>
          <p>
            MedInv es un sistema creado para el manejo de iventarios del seguro
            pastor oropeza con la finalidad de tener un control de los
            medicamento a travez de la compra transferencia y entrega (a travez
            de recipes) y llevar un registro completo de las transaccones de los
            usuarios .
          </p>
          <br />
          <br />
          <p>con el sistema web medinv se puede hacer:</p>

          <br />
          <List>
            <ListItem color="primary">
              <Check color="primary" sx={{ marginRight: 2 }} />
              <ListItemText primary="Busquedas avanzadas de medicamentos" />
            </ListItem>
            <ListItem color="primary">
              <Check color="primary" sx={{ marginRight: 2 }} />
              <ListItemText primary="controlar el accesso y permisos de los usuario" />
            </ListItem>
            <ListItem color="primary">
              <Check color="primary" sx={{ marginRight: 2 }} />
              <ListItemText primary="Control de medicamentos y permisos hacia dotores" />
            </ListItem>
            <ListItem color="primary">
              <Check color="primary" sx={{ marginRight: 2 }} />
              <ListItemText primary="Control de medicamentos a pacientes" />
            </ListItem>
            <ListItem color="primary">
              <Check color="primary" sx={{ marginRight: 2 }} />
              <ListItemText primary="Crear almacenes virtuales (Modulos)" />
            </ListItem>
            <ListItem color="primary">
              <Check color="primary" sx={{ marginRight: 2 }} />
              <ListItemText primary="Asignar operadores a Modulos" />
            </ListItem>
            <ListItem color="primary">
              <Check color="primary" sx={{ marginRight: 2 }} />
              <ListItemText primary="Asignar operadores a Modulos" />
            </ListItem>
            <ListItem color="primary">
              <Check color="primary" sx={{ marginRight: 2 }} />
              <ListItemText primary="Registrar entradas de medicamentos (Compras)" />
            </ListItem>
            <ListItem color="primary">
              <Check color="primary" sx={{ marginRight: 2 }} />
              <ListItemText primary="Mover medicamentos entre modulos (Transferencias)" />
            </ListItem>
            <ListItem color="primary">
              <Check color="primary" sx={{ marginRight: 2 }} />
              <ListItemText primary="registrar salida de medicamentos hacia pacientes (Recipes)" />
            </ListItem>
            <ListItem color="primary">
              <Check color="primary" sx={{ marginRight: 2 }} />
              <ListItemText primary="obtener comprobantes descargables de operaciones,inventario (Reportes)" />
            </ListItem>
            <ListItem color="primary">
              <Check color="primary" sx={{ marginRight: 2 }} />
              <ListItemText primary="copias de seguridad automaticas en tu correo " />
            </ListItem>
          </List>
          <Grid container marginTop={2}>
            <Grid item xs={12} sm={4}>
              informacion sobre el desarrollador:
            </Grid>
            <Grid item xs={12} sm={4}>
              <b>Correo: </b>heyscarromero@gmail.com
            </Grid>
            <Grid item xs={12} sm={4}>
              <b>Telefono: </b>+ 58 416 751 5821
            </Grid>
          </Grid>
        </Paper>
        <Paper sx={{ marginTop: 2, padding: 2 }}>
          <Typography variant="h4" color="primary.main">
            Hospital Dr Pastor Oropeza Riera
          </Typography>
          <Typography variant="body1" color="secondary.dark">
            El Hospital Dr. Pastor Oropeza Riera o simplemente Hospital Pastor
            Oropeza de Barquisimeto1​ es un centro de salud localizado en la
            Avenida La Salle2​ frente a la Urbanización El Sisal II, municipio
            Iribarren en la ciudad de Barquisimeto,3​ la capital del estado Lara
            en la parte centro occidental del país sudamericano de Venezuela.
          </Typography>
          <Grid container marginTop={2}>
            <Grid item xs={12} sm={4}>
              
            </Grid>
            <Grid item xs={12} sm={4}>
              <b>Ubicacion: </b>
              <a
                target="_blank"
                href="https://www.google.com/maps/place/10%C2%B003'52.7%22N+69%C2%B021'56.2%22W/@10.06465,-69.365602,15z/data=!4m5!3m4!1s0x0:0xebd4bdcd964179f8!8m2!3d10.06465!4d-69.365602?hl=es-419"
              >
                abrir en google maps
              </a>
            </Grid>
            <Grid item xs={12} sm={4}>
              <b>Telefono: </b>+58 251-4421089
            </Grid>
          </Grid>
        </Paper>
      </Container>
    </Stack>
  )
}
