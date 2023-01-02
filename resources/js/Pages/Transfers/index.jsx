import AsyncTable from '@/Components/Common/AsyncTable'
import ConfirmModal from '@/Components/Common/ConfirmModal'
import EntityDelete from '@/Components/Common/EntityDeleted'
import IntlMessage from '@/Components/Common/IntlMessage'
import MultiButton from '@/Components/Common/MultiButton'
import SectionTitle from '@/Components/Common/SectionTitle'
import Head from '@/Components/Custom/Head'
import IconButton from '@/Components/Custom/IconButton'
import { destroy, visit } from '@/HTTPProvider'
import { Link } from '@inertiajs/inertia-react'
import * as iconsMaterial from '@mui/icons-material'
import { Button, Grid } from '@mui/material'
import { format } from 'date-fns'
import { Fragment, useState } from 'react'
import { useIntl } from 'react-intl'
const routeName = 'transfer'
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
  const urlParams = new URLSearchParams(window.location.search)
  const restoreMode = urlParams.has('deleted')
  const { formatMessage } = useIntl()
  const [idToDelete, setIdToDelete] = useState(null)
  const toggleConfirmDelete = (id) => {
    setIdToDelete(id ? id : null)
  }
  return (
    <Fragment>
      <Head title="transfers" />
      <SectionTitle
        title="transfers"
        noTranslateSubtitle
        subtitle={props.module ? props.module.name : null}
      />
      <Grid container spacing={1} justifyContent="flex-end" paddingRight={2}>
        {/* {props.can(`${routeName}.restore`) && (
          <Grid item>
            <Button
              sx={{ color: 'white.main' }}
              startIcon={<RestoreFromTrash />}
              variant="contained"
              color={restoreMode ? 'warning' : 'error'}
              onClick={(e) => {
                if (restoreMode) {
                  return visit(route(`${routeName}.index`))
                }
                return visit(route(`${routeName}.index`, { deleted: true }))
              }}
            >
              <IntlMessage
                id={restoreMode ? 'exitRestoreMode' : 'recipeRestore'}
              />
            </Button>
          </Grid>
        )} */}
        {props.can(`${routeName}.store`) && (
          <Grid item>
            <Button
              sx={{ color: 'white.main' }}
              startIcon={<iconsMaterial.MoveDown />}
              variant="contained"
             
              onClick={()=>{
                visit(
                  route(`${routeName}.create`, {
                    module_id: props.module ? props.module.id : null,
                  }),
                )
              }}
            
            >
              <IntlMessage id="newTransfer" />
            </Button>
          </Grid>
        )}
      </Grid>
      <AsyncTable
        routeName={route().current()}
        enableRowSelection={false}
        routeParams={{ module: props.module ? props.module.id : null }}
        // renderTopToolbarCustomActions={ActionsTableShow(props.module)}
        // onAsync={tableUpdate}
        data={props.data}
        initialState={{ columnVisibility: { id: false, updated_at: false } }}
        columns={[
          { accessorKey: 'id', header: 'id', id: 'id' },

          {
            id: 'actions',
            accessorKey: 'id',
            columnDefType: 'display',
            header: 'actions',
            size: 80,

            Cell: ({ cell }) => {
              return (
                <>
                  {props.can(`${routeName}.show`) && (
                    <IconButton
                      title="show"
                      placement="right"
                      color="primary"
                      onClick={(e) => {
                        const id = cell.row.original.id
                        visit(route(`${routeName}.show`, id))
                      }}
                    >
                      <iconsMaterial.Visibility />
                    </IconButton>
                  )}
                  {cell.row.original.deleted_at &&
                  props.can(`${routeName}.restore`) ? (
                    <IconButton
                      title="delete"
                      placement="right"
                      color="primary"
                      onClick={(e) => {
                        const id = cell.row.original.id
                        get(
                          route(`${routeName}.restore`, cell.row.original.id),
                          {},
                          {
                            onSuccess: () => {
                              toast.success(
                                `La Transferencia ${id}  fue restaurada`,
                              )
                            },
                          },
                        )
                      }}
                    >
                      <iconsMaterial.Restore />
                    </IconButton>
                  ) : (
                    <>
                      {props.can(`${routeName}.destroy`) && (
                        <IconButton
                          title="delete"
                          color="error"
                          placement="right"
                          onClick={(e) => setIdToDelete(cell.getValue())}
                        >
                          <iconsMaterial.Delete />
                        </IconButton>
                      )}
                      {/*   {props.can(`${routeName}.update`) && (
                    <IconButton
                      title="edit"
                      placement="right"
                      color="primary"
                      onClick={(e) => {
                        visit(
                          route(`${routeName}.edit`, {
                            transfer: cell.row.original.id,
                          }),
                        )
                      }}
                    >
                      <iconsMaterial.Edit />
                    </IconButton>
                  )} */}
                    </>
                  )}
                </>
              )
            },
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
            Cell: ({ cell }) =>
              !cell.getValue()
                ? ' 00 00 00'
                : format(new Date(cell.getValue()), 'hh:mm dd MMMM yyyy'),
          },
          {
            accessorKey: 'updated_at',
            header: 'updated_at',
            typeColumn: 'date',
            Cell: ({ cell }) =>
              !cell.getValue()
                ? ' 00 00 00'
                : format(new Date(cell.getValue()), 'hh:mm dd MMMM yyyy'),
          },
        ]}
      />
      {/*     <MultiButton
        actions={[
          {
            icon: <iconsMaterial.MoveDown />,
            name: 'newTransfer',
            onClick: (e) => {
              visit(
                route(`transfer.create`, {
                  module_send: props.module ? props.module.id : null,
                }),
              )
            },
          },
          ...(props.can('transfer.restore')
          ? [
              {
                icon: <iconsMaterial.RestoreFromTrash />,
                name: restoreMode ? 'exitRestoreMode' : 'patientRestore',
                ...(restoreMode
                  ? { sx: { backgroundColor: 'primary.dark', color: '#fff' } }
                  : {}),
                onClick: (e) => {
                  if (restoreMode) {
                    return visit(route(`${routeName}.index`))
                  }
                  return visit(route(`${routeName}.index`, { deleted: true }))
                },
              },
            ]
          : []),
   
        ]}
      /> */}
      <ConfirmModal
        open={_.find(props.data.data, { id: idToDelete }) ? true : false}
        onClose={() => toggleConfirmDelete(null)}
        onSubmit={() => {
          toggleConfirmDelete(null)
          destroy(route(routeName + '.destroy', idToDelete))
        }}
        message={
          _.find(props.data.data, { id: idToDelete })
            ? formatMessage(
                { id: 'deleteMessageTransfer' },
                { value: _.find(props.data.data, { id: idToDelete })['id'] },
              )
            : null
        }
      />
    </Fragment>
  )
}
