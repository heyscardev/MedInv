import ReportTemplate from '@/Components/ReportTemplate'
import { Box, fabClasses, Grid, Typography, useTheme } from '@mui/material'
import { width } from '@mui/system'
import { format } from 'date-fns'
import MaterialReactTable from 'material-react-table'
import { useMemo } from 'react'

export default ({ data, total_rows, report_type, start_date, end_date }) => {

    const { palette } = useTheme();

    const columns = useMemo(
        () => [
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
        ]
    );

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
          enableRowVirtualization
          data={data}
          columns={columns}
          renderDetailPanel={({ row }) => (
            <Box>
                <table style={{ width: '98%', background:palette.primary.light }}>
                    <tbody>
                        { row.original.medicaments.map( (item) => (
                            <tr key={item.id}>
                                <td>{item.code}</td>
                                <td>{item.name}</td>
                                <td>{item.unit.name}</td>
                                <td>{item.pivot.quantity}</td>
                            </tr>
                        ) )}
                    </tbody>
                </table>
            </Box>
          )}
          positionExpandColumn="last"
          displayColumnDefOptions={{
            'mrt-row-expand': {
              minSize: 0,
              size:2,
              muiTableHeadCellProps: {
                align: 'right',
              },
              muiTableBodyCellProps: {
                align: 'right',
              },
            },
          }}
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
