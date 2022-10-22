import AsyncTable from '@/Components/Common/AsyncTable'
import Breadcrums from '@/Components/Common/Breadcrums'
import CellNumberBox from '@/Components/Common/CellNumberBox'
import Table from '@/Components/Common/Table'
import IconButton from '@/Components/Custom/IconButton'
import IntlFormatCurrency from '@/Components/Custom/IntlFormatCurrency'
import IntlFormatNumber from '@/Components/Custom/IntlFormatNumber'
import Tooltip from '@/Components/Custom/Tooltip'
import ActionsTableShow from '@/Components/Layouts/Modules/ActionsTableShow'
import LogoTypography from '@/Components/LogoTypography'
import { visit } from '@/HTTPProvider'
import * as iconsMaterial from '@mui/icons-material'
import { Box, Container } from '@mui/material'
import { Fragment } from 'react'

const tableUpdate = ({
  pagination,
  columnFilters,
  globalFilter,
  setIsLoading,
  routeName,
  routeParams,
}) => {
  setIsLoading(true)
  visit(
    route(routeName, {
      page: pagination.pageIndex + 1,
      page_size: pagination.pageSize,
      ...columnFilters,
      ...routeParams,
    }),
    {
      onFinish: () => {
        setIsLoading(false)
      },
      preserveScroll: true,
      noLoader: true,
      only: ['data'],
      replace: true,
    },
  )
}
export default (props) => {
  return (
    <Fragment>
      <LogoTypography subtitle="transfers" padding={20} />

      <AsyncTable
        routeName="transfer.index"
        enableRowSelection={false}
        //  routeParams={{ module: props.module.id }}
        // renderTopToolbarCustomActions={ActionsTableShow(props.module)}
        // onAsync={tableUpdate}
        data={props.data}
        initialState={{ columnVisibility: { id: false } }}
        columns={[
          { accessorKey: 'id', header: 'id' ,id:"id" },

          {

            //columnDefType: 'display',
            header: 'actions',
            size: 80,
            enableColumnOrdering: false,
            enableClickToCopy: false,

            Cell: ({ cell }) => (
              <>
              {console.log(cell)}
                <IconButton placement="right" color="primary" title="show">
                  <iconsMaterial.Visibility />
                </IconButton>
              </>
            ),
          },
          { accessorKey: 'user.first_name', header: 'user' },
          { accessorKey: 'module_send.name', header: 'moduleSend' },
          { accessorKey: 'module_receive.name', header: 'moduleReceive' },
          {
            accessorKey: 'quantity_medicaments',
            header: 'quantityMedicaments',
            enableColumnFilter: false,
            typeColumn: 'numberBox',
            enableColumnSorting: false,
          },
          {
            accessorKey: 'total_quantity_medicaments',
            header: 'totalQuantityMedicaments',
            enableColumnFilter: false,
            typeColumn: 'numberBox',
            enableColumnSorting: false,
          },

          {
            accessorKey: 'created_at',
            header: 'created_at',
            typeColumn: 'date',
          },
        ]}
      />
    </Fragment>
  )
}
