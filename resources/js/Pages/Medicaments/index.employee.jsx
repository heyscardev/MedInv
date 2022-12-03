import AsyncTable from '@/Components/Common/AsyncTable'
import SectionTitle from '@/Components/Common/SectionTitle'
import Head from '@/Components/Custom/Head'
import IntlFormatCurrency from '@/Components/Custom/IntlFormatCurrency'
import IntlFormatNumber from '@/Components/Custom/IntlFormatNumber'
import { Box } from '@mui/material'
import { Fragment } from 'react'
const columnVisibility = {
  created_at: false,
  updated_at: false,
  price: false,
}
export default (props) => {
  return (
    <Fragment>
      <Head title="medicaments" />
      <SectionTitle title="medicaments" />
      <AsyncTable
        routeName="medicament.index"
        routeParams={{}}
        initialState={{ columnVisibility }}
        enableRowSelection={false}
        // onAsync={tableUpdate}
        data={props.data}
        columns={[
          { accessorKey: 'id', header: 'id' },
          { accessorKey: 'name', header: 'name' },
          {
            accessorKey: 'price_sale',
            header: 'price',
            filterVariant: 'range',
            Cell: ({ cell }) => <IntlFormatCurrency value={cell.getValue()} />,
          },
          {
            accessorKey: 'unit.name',
            header: 'unit',
          },
          /*

          {
            accessorKey: "quantity_exist",
            header: "inventory",
            filterVariant: "range",
            Cell: ({ cell }) => (
              <Box
                sx={(theme) => ({
                  backgroundColor:
                    cell.getValue() < 10
                      ? theme.palette.error.main
                      : cell.getValue() >= 10 && cell.getValue() < 500
                      ? theme.palette.primary.main
                      : theme.palette.primary.dark,
                  borderRadius: "0.25rem",
                  color: "#fff",
                  p: "0.25rem",
                  textAlign: "right",
                })}
              >
                <IntlFormatNumber value={cell.getValue()} />
              </Box>
            ),
          },

          {
            accessorKey: "pivot.updated_at",
            header: "updated_at",

          }, */
          {
            enableColumnFilter: false,
            accessorKey: 'quantity_global',
            header: 'globalInventory',
            filterVariant: 'range',
            Cell: ({ cell }) => (
              <Box
                sx={(theme) => ({
                  backgroundColor:
                    cell.getValue() < 100
                      ? theme.palette.error.main
                      : cell.getValue() >= 100 && cell.getValue() < 1000
                      ? theme.palette.primary.main
                      : theme.palette.primary.dark,
                  borderRadius: '0.25rem',
                  color: '#fff',
                  p: '0.25rem',
                  textAlign: 'right',
                })}
              >
                <IntlFormatNumber value={cell.getValue()} />
              </Box>
            ),
          },
        ]}
      />
    </Fragment>
  )
}
