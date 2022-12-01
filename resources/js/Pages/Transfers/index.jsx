import AsyncTable from '@/Components/Common/AsyncTable'
import EntityDelete from '@/Components/Common/EntityDeleted'
import MultiButton from '@/Components/Common/MultiButton'
import SectionTitle from '@/Components/Common/SectionTitle'
import IconButton from '@/Components/Custom/IconButton'
import { visit } from '@/HTTPProvider'
import * as iconsMaterial from '@mui/icons-material'
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
      <SectionTitle
        title="transfers"
        noTranslateSubtitle
        subtitle={props.module ? props.module.name : null}
      />

      <AsyncTable
        routeName={route().current()}
        enableRowSelection={false}
        routeParams={{ module: props.module ? props.module.id : null }}
        // renderTopToolbarCustomActions={ActionsTableShow(props.module)}
        // onAsync={tableUpdate}
        data={props.data}
        initialState={{ columnVisibility: { id: false } }}
        columns={[
          { accessorKey: 'id', header: 'id', id: 'id' },

          {
            //columnDefType: 'display',
            header: 'actions',
            size: 80,
            enableColumnOrdering: false,
            enableClickToCopy: false,

            Cell: ({ cell }) => (
              <IconButton placement="right" color="primary" title="show">
                <iconsMaterial.Visibility />
              </IconButton>
            ),
          },
          { accessorKey: 'user.first_name', header: 'user' },
          {
            accessorKey: 'module_send.name',
            header: 'moduleSend',
            Cell: ({ cell }) => {
              return (
                <EntityDelete
                  deleted_at={cell.row.original.module_send.deleted_at}
                >
                  {cell.getValue()}
                </EntityDelete>
              )
            },
          },
          {
            accessorKey: 'module_receive.name',
            header: 'moduleReceive',
            Cell: ({ cell }) => {
              return (
                <EntityDelete
                  deleted_at={cell.row.original.module_receive.deleted_at}
                >
                  {cell.getValue()}
                </EntityDelete>
              )
            },
          },

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
      <MultiButton
        actions={[
          {
            icon: <iconsMaterial.MoveDown />,
            name: 'newTransfer',
            onClick: (e) => {
              visit(
                route(`transfer.create`, {
                  id: props.module ? props.module.id : null,
                }),
              )
            },
          },
        ]}
      />
    </Fragment>
  )
}
