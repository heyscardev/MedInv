import AsyncTable from '@/Components/Common/AsyncTable'
import MultiButton from '@/Components/Common/MultiButton'
import SectionTitle from '@/Components/Common/SectionTitle'
import Table from '@/Components/Common/Table'
import Head from '@/Components/Custom/Head'
import IconButton from '@/Components/Custom/IconButton'
import IntlFormatCurrency from '@/Components/Custom/IntlFormatCurrency'
import IntlFormatNumber from '@/Components/Custom/IntlFormatNumber'
import EditMedicamentModal from '@/Components/Layouts/Medicaments/EditMedicamentModal'
import { visit } from '@/HTTPProvider'
import { Delete, Edit, PersonAdd, Restore, RestoreFromTrash } from '@mui/icons-material'
import { Box } from '@mui/material'
import { format } from 'date-fns'
import { Fragment, useState } from 'react'
import toast from 'react-hot-toast'
const columnVisibility = {
  created_at: false,
  updated_at: false,
  price: false,
  id:false
}
const routeName ="medicaments"
export default ({units,...props}) => {
  const urlParams = new URLSearchParams(window.location.search)
  const restoreMode = urlParams.has('deleted')
  const [idToEdit, setIdToEdit] = useState(null)
  const toggleEdit = (id) => {
    setIdToEdit(id ? id : null)
  }
  return (
    <Fragment>
      <Head title="medicaments" />
      <SectionTitle title="medicaments" />
      <Table
        
        routeParams={{}}
        initialState={{ columnVisibility }}
        enableRowSelection={false}
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
              return cell.row.original.deleted_at ? (
                  <IconButton
                    color="primary"
                    placement="right" title="restore"
                    onClick={(e) => {
                      const name = cell.row.original.first_name
                      get(
                        route(`${routeName}.restore`, cell.row.original.id),
                        {},
                        {
                          onSuccess: () => {
                            toast.success(
                              `El medicamento ${name}  fue restaurado`,
                            )
                          },
                        },
                      )
                    }}
                  >
                    <Restore />
                  </IconButton>
              ) : (
                <Fragment>
          {/*         {props.can(`${routeName}.edit`) && (
                      <IconButton
                      arrow placement="right" title="delete"
                        color="error"
                        onClick={(e) => setIdToDelete(cell.getValue())}
                      >
                        <Delete />
                      </IconButton>
                  )} */}
                  {props.can(`${routeName}.edit`) && (
                  
                      <IconButton
                      arrow placement="right" title="edit"
                        color="primary"
                        onClick={(e) => setIdToEdit(cell.getValue())}
                      >
                        <Edit />
                      </IconButton>
                  )}
                </Fragment>
              )
            },
          },
          { accessorKey: 'id', header: 'id' },
          { accessorKey: 'name', header: 'name' },
          { accessorKey: 'code', header: 'code' },
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
            /* enableColumnFilter: false, */
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
          {
            accessorKey: 'created_at',
            header: 'created_at',
            accessorFn: ({ created_at }) =>
              !created_at
                ? '00/00/0000 00:00:00'
                : format(new Date(created_at), 'hh:mm dd MMMM yyyy'),
          },
          {
            accessorKey: 'updated_at',
            header: 'updated_at',
            accessorFn: ({ updated_at }) =>
              !updated_at
                ? '00/00/0000 00:00:00'
                : format(new Date(updated_at), 'hh:mm dd MMMM yyyy'),
          },
         
        ]}
      />
       <MultiButton
        actions={[
          {
            icon: <PersonAdd />,
            name: 'user',
            onClick: (e) => {
              toggleEdit(-1)
            },
          },
       /*    {
            icon: <RestoreFromTrash />,
            name: restoreMode ? 'exitRestoreMode' : 'medicamentRestore',
            ...(restoreMode
              ? { sx: { backgroundColor: 'primary.dark', color: '#fff' } }
              : {}),
            onClick: (e) => {
              if (restoreMode) {
                return visit(route(`${routeName}.index`))
              }
              return visit(route(`${routeName}.index`, { deleted: true }))
            },
          }, */
        ]}
      />
      <EditMedicamentModal   units={units}
        medicaments={[]}
        medicament={{ ..._.find(props.data, { id: idToEdit }) }}
        open={!!idToEdit}
        onClose={() => setIdToEdit(false)} />
    </Fragment>
  )
}
