import ReportTemplate from '@/Components/ReportTemplate'
import { Box, Grid, Typography } from '@mui/material'
import { format } from 'date-fns'
import MaterialReactTable from 'material-react-table'

export default ({ data, total_rows, report_type, start_date, end_date }) => {
  return (
    <ReportTemplate {...{ start_date, end_date, nameReport: report_type }}>
        <MaterialReactTable
          initialState={{ density: 'compact' }}
          enableTopToolbar={false}
          enableColumnActions={false}
          enableBottomToolbar={false}
          enabledGlobalFilterOptions={false}
          enableColumnDragging={false}
          enableColumnFilters={false}
          data={data}
          columns={[
            {
                accessorKey: 'id',
                header: 'ID',
                maxSize:2,
            },
            {
              accessorKey: 'first_name',
              header: 'Nombre',

              minSize: '0px',
            },
            {
              accessorKey: 'last_name',
              header: 'Apellido',

              minSize: '0px',
            },
            {
              accessorKey: 'c_i',
              header: 'Cédula',
              accessorFn: ({ nationality, c_i }) => `${nationality}- ${c_i}`,

              minSize: '0px',
            },
            {
                accessorKey: 'email',
                header: 'Correo',

                minSize: '0px',
            },
            {
                accessorKey: 'phone',
                header: 'Teléfono',

                minSize: '0px',
            },
            {
                accessorKey: 'state',
                header: 'Estado',
                accessorFn: ({ state, deleted_at }) => {
                    return deleted_at ? 'Borrado' : state ? 'Activo' : 'Desactivado'
                },
                Cell: ({ cell }) => (
                    <Box
                    sx={(theme) => ({
                        backgroundColor:
                            cell.getValue() == 'Activo'
                            ? theme.palette.success.main
                            : cell.getValue() == 'Borrado'
                            ? theme.palette.error.main
                            : theme.palette.secondary.main,
                        borderRadius: '0.25rem',
                        color: theme.palette.primary.dark,
                        p: '0.25rem',
                        textAlign: 'center',
                        width:'4.5rem',
                    })}
                    >
                    { cell.getValue() }
                    </Box>
                ),
            },
            {
              accessorKey: 'created_at',
              header: 'Fecha de registro',
              accessorFn: ({ created_at }) =>
                format(new Date(created_at), 'hh:mm:aa dd/MM/yyyy'),
              minSize: '0px',
            },
          ]}
        />

        <Grid container sx={{ marginTop: 3 }}>
            <Grid item xs={6}></Grid>

            <Grid item xs={6} display="flex" justifyContent="end">
                <Typography>
                    Total de usuarios registrados: {total_rows}
                </Typography>
            </Grid>
        </Grid>
    </ReportTemplate>
  )
}
