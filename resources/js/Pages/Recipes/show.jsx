import IntlMessage from '@/Components/Common/IntlMessage'
import { Container, Divider, Grid, Stack, Typography } from '@mui/material'
import { format } from 'date-fns'
import { Fragment } from 'react'
import ReportTemplate from '@/Components/ReportTemplate'
import MaterialReactTable from 'material-react-table'

export default ({ recipe, data }) => {
  const pathology = recipe.pathology_id ? recipe.pathology.name : ''
  return (
    <Fragment>
      <ReportTemplate
        {...{
          titleReport: `recipe Nº ${recipe.id}`,
          nameReport: `${recipe.recipe_type}`,
          typeReport: pathology,
        }}
      >
        <Stack spacing={2} padding={4}>
          <Grid
            container
            alignItems="flex-end"
            justifyContent="center"
            marginBottom={3}
          >
            <Grid item xs={12} sm={8}>
              <Stack>
                <Typography variant="h6" color="primary">
                  <IntlMessage id={'patient'} />:{' '}
                  {recipe.patient_id
                    ? recipe.patient.first_name + ' ' + recipe.patient.last_name
                    : ''}
                </Typography>
              </Stack>
            </Grid>
            <Grid item xs={12} sm={4}>
              <Stack>
                <Typography variant="span" color="primary">
                  <IntlMessage id={'user'} />:{' '}
                  {recipe.user_id
                    ? recipe.user.first_name + ' ' + recipe.user.last_name
                    : ''}
                </Typography>
              </Stack>
            </Grid>
            <Grid item xs={12} sm={8}>
              <Stack>
                <Typography variant="h6" color="primary">
                  <IntlMessage id={'doctor'} />:{' '}
                  {recipe.doctor_id
                    ? recipe.doctor.first_name + ' ' + recipe.doctor.last_name
                    : ''}
                </Typography>
              </Stack>
            </Grid>
            <Grid item xs={12} sm={4}>
              <Stack>
                <Typography
                  variant="span"
                  // color="secondary.dark"
                >
                  <IntlMessage id={'created_at'} />:{' '}
                  {format(new Date(recipe.created_at), 'dd MMMM yyyy')}
                </Typography>
              </Stack>
            </Grid>

            <Grid item xs={12} sm={8}>
              <Stack>
                <Typography
                  variant="h6"
                  // color="secondary.dark"
                >
                  <IntlMessage id={'module'} />:{' '}
                  {recipe.module_id ? recipe.module.name : ''}
                </Typography>
              </Stack>
            </Grid>

            <Grid item xs={12} sm={4}>
              <Stack>
                <Typography variant="span" color="secondary.dark">
                  <IntlMessage id={'updated_at'} />:{' '}
                  {format(new Date(recipe.updated_at), 'dd MMMM yyyy')}
                </Typography>
              </Stack>
            </Grid>

            <Grid item xs={12} sm={8}>
              <Stack>
                <Typography
                  variant="h6"
                  textAlign="left"
                  color="primary"
                ></Typography>
              </Stack>
            </Grid>

            <Grid item xs={12} sm={4}>
              <Stack>
                <Typography variant="p" textAlign="right" color="error">
                  {recipe.deleted_at && (
                    <span>
                      <IntlMessage id={'deleted_at'} />:
                      {format(new Date(recipe.deleted_at), 'dd MMMM yyyy')}
                    </span>
                  )}
                </Typography>
              </Stack>
            </Grid>

            <Grid item xs={12} sm={12}>
              <Stack>
                <Typography
                  variant="h6"
                  textAlign="left"
                  color="secondary.dark"
                >
                  <IntlMessage id={'description'} />: {recipe.description}
                </Typography>
              </Stack>
            </Grid>
          </Grid>
          {/* </Stack> */}

          {/* asyncronous table for view and filters for recipes of doctor */}
          <MaterialReactTable
            initialState={{ density: 'comfortable' }}
            enableTopToolbar={false}
            enableBottomToolbar={false}
            enablePagination={false}
            enableColumnActions={false}
            enableColumnFilters={false}
            enableRowVirtualization
            muiTableContainerProps={{ sx: { maxHeight: '100%' } }}
            data={data}
            columns={[
              // {
              //     accessorKey: "id",
              //     header: "ID",
              //     maxSize:10,
              // },
              {
                accessorKey: 'code',
                header: 'Código',
                maxSize: 10,
              },
              {
                accessorKey: 'name',
                header: 'Medicamento',
                maxSize: 100,
              },
              {
                accessorKey: 'unit.name',
                header: 'Unidad',
                maxSize: 20,
              },
              {
                accessorKey: 'pivot.prescribed_amount',
                header: 'Cantidad preescrita',
                maxSize: 20,
              },
              {
                accessorKey: 'pivot.quantity',
                header: 'Cantidad entregada',
                maxSize: 20,
              },
            ]}
          />
        </Stack>
      </ReportTemplate>
    </Fragment>
  )
}
