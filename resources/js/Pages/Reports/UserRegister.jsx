import ReportTemplate from '@/Components/ReportTemplate'
import { Grid } from '@mui/material'
import { format } from 'date-fns'
import MaterialReactTable from 'material-react-table'

export default ({ users, total_users, report_type, start_date, end_date }) => {
  return (
    <ReportTemplate {...{ start_date, end_date, nameReport: report_type }}>
      <div style={{ marginTop: "20px" }}>
        <MaterialReactTable
          initialState={{ density: 'compact' }}
          enableTopToolbar={false}
          enableColumnActions={false}
          enableBottomToolbar={false}
          enabledGlobalFilterOptions={false}
          enableColumnDragging={false}
          enableColumnFilters={false}
          data={users}
          columns={[
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
              header: 'cedula',
              accessorFn: ({ nationality, c_i }) => `${nationality}- ${c_i}`,

              minSize: '0px',
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
      </div>

      <Grid container sx={{ marginTop: 2 }}>
        <Grid item xs={6}></Grid>

        <Grid item xs={6}>
          total de usuarios registrados: {total_users}
        </Grid>
      </Grid>
    </ReportTemplate>
  )
}
