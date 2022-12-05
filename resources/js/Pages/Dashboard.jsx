import DashboardButton from '@/Components/Common/DashboardButton'
import { Head } from '@inertiajs/inertia-react'
import {
  Assessment,
  Home,
  Masks,
  Medication,
  MoveDown,
  MoveUp,
  People,
  PeopleAltOutlined,
  Receipt,
  ShoppingCart,
  Sick,
  Store,
} from '@mui/icons-material'
import { Grid, Paper, Typography } from '@mui/material'
import { Fragment } from 'react'

export default ({ can, auth }) => {
  const pages = [
    {
      name: 'intro',
      route: route().t.url,
      Icon: Home,
    },

    can('medicament.index')
      ? {
          name: 'medicaments',
          route: route('medicament.index'),
          Icon: Medication,
        }
      : null,
    can('module.index')
      ? { name: 'modules', route: route('module.index'), Icon: Store }
      : null,

    can('buy.index')
      ? { name: 'buys', route: route('buy.index'), Icon: ShoppingCart }
      : null,
    can('transfer.index')
      ? {
          name: 'transfers',
          route: route('transfer.index'),
          Icon: MoveDown,
        }
      : null,
    can('recipe.index')
      ? {
          name: 'recipes',
          route: route('recipe.index'),
          Icon: Receipt,
        }
      : null,
    can('user.index')
      ? { name: 'users', route: route('user.index'), Icon: People }
      : null,
    can('doctor.index')
      ? { name: 'doctors', route: route('doctor.index'), Icon: Masks }
      : null,
    can('patient.index')
      ? { name: 'patients', route: route('patient.index'), Icon: Sick }
      : null,

    can('report.index')
      ? {
          name: 'reports',
          route: route('buy.index'),
          Icon: Assessment,
          outlined: true,
          disabled: true,
        }
      : null,
    can('user.activity.index')
        ? {
            name: 'user_activity',
            route: route('user.activity.index'),
            Icon: PeopleAltOutlined
        }
        : null,
  ]
  return (
    <Fragment>
      <Head title="DashBoard" />
      <Paper sx={{ marginTop: 2, padding: 2, width: '50%', marginLeft: 3 }}>
        Bienvenido a{" "}
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
