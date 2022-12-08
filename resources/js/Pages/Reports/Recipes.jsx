import IntlFormatCurrency from '@/Components/Custom/IntlFormatCurrency'
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
                maxSize:10,
            },
            {
                accessorKey: 'created_at',
                header: 'Fecha de registro',
                accessorFn: ({ created_at }) =>
                  format(new Date(created_at), 'hh:mm:aa dd/MM/yyyy'),
                maxSize:70,
            },
            {
              accessorKey: 'recipe_type',
              header: 'Tipo de Recipe',

              maxSize:60,
            },
            {
                accessorKey: 'patient_id',
                header: 'Paciente',
                accessorFn: ({ patient }) => `${patient.first_name} ${patient.last_name}`,

                maxSize:90,
            },
            {
                accessorKey: 'doctor_id',
                header: 'Doctor',
                accessorFn: ({ doctor }) => `${doctor.first_name} ${doctor.last_name}`,

                maxSize:90,
            },
            // {
            //   accessorKey: 'pathology_id',
            //   header: 'Patología',
            //   accessorFn: ({ pathology }) => pathology ? pathology.name : '',

            //   maxSize:60,
            // },
            {
                accessorKey: 'module.name',
                header: 'Módulo',
                maxSize:200,
            },
            // {
            //     accessorKey: 'user_id',
            //     header: 'Usuario Responsable',
            //     accessorFn: ({ user }) => `${user.first_name} ${user.last_name}`,

            //     maxSize:90,
            // },
        ]
    );

  return (
    <ReportTemplate {...{ start_date, end_date, nameReport: report_type, orientation: 'landscape' }}>
        <MaterialReactTable
          initialState={{ density: 'comfortable' }}
          enableStickyHeader
        //   enableTopToolbar={false}
          enableBottomToolbar={false}
          enablePagination={false}
          enableColumnActions={false}
          enableColumnFilters={false}
          enableRowVirtualization
          muiTableContainerProps={{ sx: { maxHeight: '100%' } }}
          positionExpandColumn="last"
          displayColumnDefOptions={{
            'mrt-row-expand': {
              minSize: 0,
              size:10,
              muiTableHeadCellProps: {
                align: 'center',
              },
              muiTableBodyCellProps: {
                align: 'center',
              },
            },
          }}

          data={data}
          columns={columns}
          renderDetailPanel={({ row }) => (
            <Box>
                <Typography variant="div" display="flex" justifyContent="space-between" sx={{ width: '95%', fontSize: '.8rem', marginBottom:1 }}>
                      <span>{ row.original.user_id ? `Usuario: ${row.original.user.first_name} ${row.original.user.last_name}` : `` }</span>
                      <span>{ row.original.pathology_id ? `Patología: ${row.original.pathology.name}` : `` }</span>
                </Typography>

                <table style={{ width: '95%', background:palette.primary.light }}>
                    <thead>
                        <tr>
                          <th>Código</th>
                          <th>Medicamento</th>
                          <th>Unidad</th>
                          <th style={{ textAlign:'right' }}>Cantidad preescrita</th>
                          <th style={{ textAlign:'right' }}>Cantidad entregada</th>
                        </tr>
                    </thead>
                    <tbody>
                        { row.original.medicaments.map( (item) => (
                            <tr key={item.id}>
                                <td>{item.code}</td>
                                <td>{item.name}</td>
                                <td>{item.unit.name}</td>
                                <td style={{ textAlign:'right' }}>{item.pivot.prescribed_amount}</td>
                                <td style={{ textAlign:'right' }}>{item.pivot.quantity}</td>
                            </tr>
                        ) )}
                    </tbody>
                </table>
            </Box>
          )}
        />

        <Grid container sx={{ marginTop: 3 }}>
            <Grid item xs={6}></Grid>
            <Grid item xs={6} display="flex" justifyContent="end">
                <Typography>
                    Total de recipes: {total_rows}
                </Typography>
            </Grid>
        </Grid>
    </ReportTemplate>
  )
}
