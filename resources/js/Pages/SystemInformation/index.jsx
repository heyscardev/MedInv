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
            MedInv es un sistema creado para el manejo de inventarios del Seguro
            Pastor Oropeza Riera con la finalidad de tener un control de los
            medicamento a través de la compra transferencia y entrega (a través
            de récipes) y llevar un registro completo de las transacciones de los
            usuarios.
          </p>
          <br />
          <br />
          <p>Con el sistema WEB MedInv se puede hacer:</p>

          <br />
          <List>
            <ListItem color="primary">
              <Check color="primary" sx={{ marginRight: 2 }} />
              <ListItemText primary="Búsquedas avanzadas de medicamentos" />
            </ListItem>
            <ListItem color="primary">
              <Check color="primary" sx={{ marginRight: 2 }} />
              <ListItemText primary="Controlar el accesso y permisos de los usuario" />
            </ListItem>
            <ListItem color="primary">
              <Check color="primary" sx={{ marginRight: 2 }} />
              <ListItemText primary="Control de medicamentos y permisos hacia doctores" />
            </ListItem>
            <ListItem color="primary">
              <Check color="primary" sx={{ marginRight: 2 }} />
              <ListItemText primary="Control de medicamentos a pacientes" />
            </ListItem>
            <ListItem color="primary">
              <Check color="primary" sx={{ marginRight: 2 }} />
              <ListItemText primary="Crear almacenes virtuales (Módulos)" />
            </ListItem>
          
            <ListItem color="primary">
              <Check color="primary" sx={{ marginRight: 2 }} />
              <ListItemText primary="Asignar operadores a Módulos" />
            </ListItem>
            <ListItem color="primary">
              <Check color="primary" sx={{ marginRight: 2 }} />
              <ListItemText primary="Registrar entradas de medicamentos (Compras)" />
            </ListItem>
            <ListItem color="primary">
              <Check color="primary" sx={{ marginRight: 2 }} />
              <ListItemText primary="Mover medicamentos entre Módulos (Transferencias)" />
            </ListItem>
            <ListItem color="primary">
              <Check color="primary" sx={{ marginRight: 2 }} />
              <ListItemText primary="Registrar salida de medicamentos hacia pacientes (Recipes)" />
            </ListItem>
            <ListItem color="primary">
              <Check color="primary" sx={{ marginRight: 2 }} />
              <ListItemText primary="Obtener comprobantes descargables de operaciones, inventario (Reportes)" />
            </ListItem>
            <ListItem color="primary">
              <Check color="primary" sx={{ marginRight: 2 }} />
              <ListItemText primary="Copias de seguridad automáticas en tu correo " />
            </ListItem>
          </List>
          <Grid container marginTop={2}>
            <Grid item xs={12} sm={4}>
              Información sobre el desarrollador:
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
            El Hospital Dr. Pastor Oropeza Riera conocido como el Pastor
            Oropeza de Barquisimeto​ es un centro de salud localizado en la
            Avenida La Salle​ frente a la Urbanización El Sisal II, Municipio
            Iribarren en la ciudad de Barquisimeto,​ la capital del estado Lara
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
