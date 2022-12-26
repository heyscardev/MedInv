import DashboardButton from '@/Components/Common/DashboardButton'
import { Head } from '@inertiajs/inertia-react'
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
  ShoppingCart,
  Sick,
  Store,
} from '@mui/icons-material'
import { Grid, Paper, Typography } from '@mui/material'
import { Fragment } from 'react'

import imgHome from '@/assets/images/welcome-principal.jpg'
import imgUnits from '@/assets/images/units.jpg'
import imgServices from '@/assets/images/services.png'
import imgPathologies from '@/assets/images/pathologies.jpg'
import imgMedicaments from '@/assets/images/medicaments.jpg'
import imgModules from '@/assets/images/modules.jpg'
import imgDoctors from '@/assets/images/doctors.jpg'
import imgUsers from '@/assets/images/users.jpg'
import imgPatients from '@/assets/images/patients.jpg'
import imgRecipes from '@/assets/images/recipes.jpg'
import imgBuys from '@/assets/images/buys.jpg'
import imgTransfers from '@/assets/images/transfers.jpg'
import imgReports from '@/assets/images/reports.jpg'
import imgActivities from '@/assets/images/activities.jpg'

export default ({ can, auth, page }) => {
  let pages

  if (page == 'preferences') {
    pages = [
      {
        name: 'dashboard',
        route: route('dashboard'),
        Icon: Dashboard,
      },
      can('pathology.index')
        ? {
            name: 'pathologies',
            route: route('pathology.index'),
            Icon: Medication,
            image: imgPathologies,
          }
        : null,
      can('service.index')
        ? {
            name: 'services',
            route: route('service.index'),
            Icon: Medication,
            image: imgServices,
          }
        : null,
      can('medicament.group.index')
        ? {
            name: 'medicamentGroups',
            route: route('medicament.group.index'),
            Icon: Medication,
            //   image: imgUnits,
          }
        : null,
      can('unit.index')
        ? {
            name: 'units',
            route: route('unit.index'),
            Icon: Medication,
            image: imgUnits,
          }
        : null,
    ]
  } else {
    pages = [
      {
        name: 'intro',
        route: route().t.url,
        Icon: Home,
        image: imgHome,
      },
      can('user.index')
        ? {
            name: 'users',
            route: route('user.index'),
            Icon: People,
            image: imgUsers,
          }
        : null,
      can('doctor.index')
        ? {
            name: 'doctors',
            route: route('doctor.index'),
            Icon: Masks,
            image: imgDoctors,
          }
        : null,
      can('patient.index')
        ? {
            name: 'patients',
            route: route('patient.index'),
            Icon: Sick,
            image: imgPatients,
          }
        : null,

      can('medicament.index')
        ? {
            name: 'medicaments',
            route: route('medicament.index'),
            Icon: Medication,
            image: imgMedicaments,
          }
        : null,
      can('module.index')
        ? {
            name: 'modules',
            route: route('module.index'),
            Icon: Store,
            image: imgModules,
          }
        : null,

      can('buy.index')
        ? {
            name: 'buys',
            route: route('buy.index'),
            Icon: ShoppingCart,
            image: imgBuys,
          }
        : null,
      can('transfer.index')
        ? {
            name: 'transfers',
            route: route('transfer.index'),
            Icon: MoveDown,
            image: imgTransfers,
          }
        : null,
      can('recipe.index')
        ? {
            name: 'recipes',
            route: route('recipe.index'),
            Icon: Receipt,
            image: imgRecipes,
          }
        : null,

      can('user.activity.index')
        ? {
            name: 'user_activity',
            route: route('user.activity.index'),
            Icon: PeopleAltOutlined,
            image: imgActivities,
          }
        : null,
      can('report.index')
        ? {
            name: 'reports',
            route: route('report.index'),
            Icon: Assessment,
            image: imgReports,
          }
        : null,
    ]
  }

  return (
    <Fragment>
      <Head title="DashBoard" />
      <Paper sx={{ marginTop: 2, padding: 2, width: '50%', marginLeft: 3 }}>
        Bienvenido a{' '}
        <Typography variant="span" fontWeight="500" color="primary">
          MedInv
        </Typography>
        {` ${auth.user.first_name} ${auth.user.last_name} `}
        {auth.user.roles.length && (
          <Typography
            variant="body2"
            fontWeight="800"
            textTransform="uppercase"
            color="error"
          >
            {auth.user.roles[0].name}
          </Typography>
        )}
      </Paper>
      <Grid
        container
        spacing={4}
        display="flex"
        justifyContent={{ xs: 'center', sm: 'left' }}
        alignItems="center"
        padding={4}
      >
        {pages.map((page) =>
          page ? (
            <Grid key={page.route} item xs={10} sm={6} md={2} xl={2}>
              <DashboardButton {...page} />
            </Grid>
          ) : null,
        )}
      </Grid>
    </Fragment>
  )
}
