import ReportTemplate from '@/Components/ReportTemplate'
import { fabClasses, Grid, Typography } from '@mui/material'
import { format } from 'date-fns'
import MaterialReactTable from 'material-react-table'

export default ({ data, total_rows, report_type, start_date, end_date }) => {
  return (
    <ReportTemplate {...{ start_date, end_date, nameReport: report_type, orientation: 'landscape' }}>
        <MaterialReactTable
          initialState={{ density: 'compact' }}
          enableTopToolbar={false}
          enableColumnActions={false}
          enableBottomToolbar={false}
          enabledGlobalFilterOptions={false}
          enableColumnDragging={false}
          enableColumnFilters
          enablePagination={false}
          enableColumnResizing
          enableTableFooter
          enableStickyHeader
          autoResetExpanded
          data={data}
          columns={[
            {
              accessorKey: 'id',
              header: 'ID',
              maxSize:2,
            },
            {
              accessorKey: 'module_send.name',
              header: 'Módulo envía',
              maxSize:90,
            },
            {
              accessorKey: 'module_receive.name',
              header: 'Módulo recibe',
              maxSize:90,
            },
            {
              accessorKey: 'user_id',
              header: 'Usuario Responsable',
              accessorFn: ({ user }) => `${user.first_name} ${user.last_name}`,

              maxSize:30,
            },
            {
              accessorKey: 'created_at',
              header: 'Fecha de registro',
              accessorFn: ({ created_at }) =>
                format(new Date(created_at), 'hh:mm:aa dd/MM/yyyy'),
              maxSize:27,
            },
          ]}
        />

        <Grid container sx={{ marginTop: 3 }}>
            <Grid item xs={6}></Grid>

            <Grid item xs={6} display="flex" justifyContent="end">
                <Typography>
                    Total de transferencias: {total_rows}
                </Typography>
            </Grid>
        </Grid>
    </ReportTemplate>
  )
}
