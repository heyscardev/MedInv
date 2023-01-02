import AsyncTable from '@/Components/Common/AsyncTable'
import ConfirmModal from '@/Components/Common/ConfirmModal'
import EntityDelete from '@/Components/Common/EntityDeleted'
import IntlMessage from '@/Components/Common/IntlMessage'
import MultiButton from '@/Components/Common/MultiButton'
import SectionTitle from '@/Components/Common/SectionTitle'
import Table from '@/Components/Common/Table'
import Head from '@/Components/Custom/Head'
import IconButton from '@/Components/Custom/IconButton'
import { destroy, visit } from '@/HTTPProvider'
import { Link } from '@inertiajs/inertia-react'
import {
  AddShoppingCart,
  Delete,
  Edit,
  Restore,
  Visibility,
} from '@mui/icons-material'
import { Button, Grid } from '@mui/material'
import { format } from 'date-fns'
import { Fragment, useState } from 'react'
import { useIntl } from 'react-intl'
const routeName = 'buy'
const columnVisibility = {
  user: false,
  updated_at: false,
  deleted_at: false,
}
export default ({ module, ...props }) => {
  const { formatMessage } = useIntl()
  const [idToDelete, setIdToDelete] = useState(null)
  const toggleConfirmDelete = (id) => {
    setIdToDelete(id ? id : null)
  }

  return (
    <Fragment>
      <Head title="buys" />
      <SectionTitle
        title="buys"
        noTranslateSubtitle
        subtitle={module ? module.name : null}
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
              startIcon={<AddShoppingCart />}
              variant="contained"
              onClick={() => {
                visit(
                  route(`buy.create`, {
                    module_id: module ? module.id : null,
                  }),
                )
              }}
            >
              <IntlMessage id="newBuy" />
            </Button>
          </Grid>
        )}
      </Grid>
      {props.data && (
        <Table
          enableRowSelection={false}
          initialState={{ columnVisibility }}
          routeName={route().current()}
          routeParams={{ module: module ? module.id : null }}
          // onAsync={tableUpdate}
          data={props.data}
          columns={[
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
                        <Visibility />
                      </IconButton>
                    )}
                    {cell.row.original.deleted_at &&
                    props.can(`${routeName}.restore`) ? (
                      <IconButton
                        title="delete"
                        placement="right"
                        color="primary"
                        onClick={(e) => {
                          const name = cell.row.original.first_name
                          get(
                            route(`${routeName}.restore`, cell.row.original.id),
                            {},
                            {
                              onSuccess: () => {
                                toast.success(
                                  `El Recipe ${name}  fue restaurado`,
                                )
                              },
                            },
                          )
                        }}
                      >
                        <Restore />
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
                            <Delete />
                          </IconButton>
                        )}
                        {/*           {props.can(`${routeName}.update`) && (
                      
                        <IconButton
                        title="edit"
                        placement="right"
                          color="primary"
                          onClick={(e) => {
visit(route(`buy.edit`,{buy:cell.row.original.id}))
                          }}
                        >
                          <Edit />
                        </IconButton>
                    )} */}
                      </>
                    )}
                  </>
                )
              },
            },
            { accessorKey: 'id', header: 'id' },
            {
              accessorKey: 'user',
              header: 'user',
              accessorFn: ({ user }) => {
                return user ? `${user.first_name} ${user.last_name}` : ''
              },
              Cell: ({ cell }) => {
                return (
                  <EntityDelete
                    deleted_at={
                      cell.row.original.user
                        ? cell.row.original.user.deleted_at
                        : null
                    }
                  >
                    {cell.getValue()}
                  </EntityDelete>
                )
              },
            },
            {
              accessorKey: 'module',
              header: 'module',
              accessorFn: ({ module }) => {
                return module ? `${module.name}` : ''
              },
              Cell: ({ cell }) => {
                return (
                  <EntityDelete
                    deleted_at={
                      cell.row.original.module
                        ? cell.row.original.module.deleted_at
                        : null
                    }
                  >
                    {cell.getValue()}
                  </EntityDelete>
                )
              },
            },
            {
              accessorKey: 'total_medicaments',
              header: 'totalMedicaments',
              typeColumn: 'numberBox',
            },
            {
              accessorKey: 'total_quantity',
              header: 'totalQuantity',
              typeColumn: 'numberBox',
            },
            /*  {
                accessorKey: "total_price",
                header: "totalPrice",
                filterVariant: "range",
                Cell: ({ cell }) => (
                    <IntlFormatCurrency value={cell.getValue()} />
                ),
            }, */
            {
              typeColumn: 'date',
              accessorKey: 'created_at',
              header: 'date',
              accessorFn: ({ created_at }) =>
                !created_at
                  ? '00/00/0000 00:00:00'
                  : format(new Date(created_at), 'hh:mm dd MMMM yyyy'),
            },
            {
              typeColumn: 'date',
              accessorKey: 'updated_at',
              header: 'updated_at',
              accessorFn: ({ updated_at }) =>
                !updated_at
                  ? '00/00/0000 00:00:00'
                  : format(new Date(updated_at), 'hh:mm dd MMMM yyyy'),
            },
            /*         {
              accessorKey: 'deleted_at',
              header: 'deleted_at',
              typeColumn: 'date',
              accessorFn: ({ deleted_at }) =>
                !deleted_at
                  ? formatMessage({ id: 'active' })
                  : format(new Date(deleted_at), 'hh:mm dd MMMM yyyy'),
            }, */
          ]}
        />
      )}

      <ConfirmModal
        open={_.find(props.data, { id: idToDelete }) ? true : false}
        onClose={() => toggleConfirmDelete(null)}
        onSubmit={() => {
          toggleConfirmDelete(null)
          destroy(route(routeName + '.destroy', idToDelete))
        }}
        message={
          _.find(props.data, { id: idToDelete })
            ? formatMessage(
                { id: 'deleteMessageBuy' },
                { value: _.find(props.data, { id: idToDelete })['id'] },
              )
            : null
        }
      />
    </Fragment>
  )
}
