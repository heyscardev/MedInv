import ReportTemplate from '@/Components/ReportTemplate'
import { Grid, Typography } from '@mui/material'
import { format } from 'date-fns'
import MaterialReactTable from 'material-react-table'

export default ({ data, total_rows, report_type, start_date, end_date }) => {
  return (
    <ReportTemplate {...{ start_date, end_date, nameReport: report_type, orientation: 'landscape' }}>
      <div style={{ margin: "10px" }}>
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

              minSize: '0px',
            },
            {
              accessorKey: 'module_send.name',
              header: 'Módulo envía',

              maxSize: '30px',
            },
            {
              accessorKey: 'module_receive.name',
              header: 'Módulo recibe',

              minSize: '0px',
            },
            {
              accessorKey: 'user_id',
              header: 'Usuario Responsable',
              accessorFn: ({ user }) => `${user.first_name} ${user.last_name}`,

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

        <Grid container sx={{ marginTop: 3 }}>
            <Grid item xs={6}></Grid>

            <Grid item xs={6} display="flex" justifyContent="end">
                Total de transferencias: {total_rows}
            </Grid>
        </Grid>
      </div>
    </ReportTemplate>
  )
}
