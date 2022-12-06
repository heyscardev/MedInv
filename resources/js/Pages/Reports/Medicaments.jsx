import ReportTemplate from '@/Components/ReportTemplate'
import { Grid, Typography } from '@mui/material'
import { format } from 'date-fns'
import MaterialReactTable from 'material-react-table'

export default ({ data, total_rows, report_type, start_date, end_date }) => {
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
          data={data}
          columns={[
            {
              accessorKey: 'code',
              header: 'Código',

              minSize: '0px',
            },
            {
              accessorKey: 'name',
              header: 'Nombre',

              minSize: '0px',
            },
            {
              accessorKey: 'unit.name',
              header: 'Unidad',

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

        <Grid item xs={6} display="flex" justifyContent="end">
            <Typography variant="h6" sx={{ fontSize:'.8rem' }}>
                Total de medicamentos: {total_rows}
            </Typography>
        </Grid>
      </Grid>
    </ReportTemplate>
  )
}
