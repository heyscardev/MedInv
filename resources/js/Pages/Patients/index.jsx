import AsyncTable from '@/Components/Common/AsyncTable'
import ConfirmModal from '@/Components/Common/ConfirmModal'
import IntlMessage from '@/Components/Common/IntlMessage'
import MultiButton from '@/Components/Common/MultiButton'
import SectionTitle from '@/Components/Common/SectionTitle'
import Head from '@/Components/Custom/Head'
import Tooltip from '@/Components/Custom/Tooltip'
import EditPatientModal from '@/Components/Layouts/Patients/EditPatientModal'
import { destroy, get, visit } from '@/HTTPProvider'
import {
  ChildCare,
  Delete,
  Edit,
  HighlightOff,
  PersonAdd,
  Restore,
  RestoreFromTrash,
} from '@mui/icons-material'
import { Button, Grid, IconButton, ToggleButton } from '@mui/material'
import { format } from 'date-fns'
import { Fragment, useState } from 'react'
import toast from 'react-hot-toast'
import { useIntl } from 'react-intl'

const columnVisibility = {
  id: false,
  deleted_at: false,
  created_at: false,
  updated_at: false,
  direction: false,
  phone: false,
  email: false,
}
const routeName = 'patient'
export default ({ module, ...props }) => {
  const { formatMessage } = useIntl()
  const urlParams = new URLSearchParams(window.location.search)
  const restoreMode = urlParams.has('deleted')
  const [idToEdit, setIdToEdit] = useState(null)
  const toggleEdit = (id) => {
    setIdToEdit(id ? id : null)
  }

  const [idToDelete, setIdToDelete] = useState(null)
  const toggleConfirmDelete = (id) => {
    setIdToDelete(id ? id : null)
  }
  return (
    <Fragment>
      <Head title="patients" />
      <SectionTitle title="patients" />
      <Grid container spacing={1} justifyContent="flex-end" paddingRight={2}>
        {props.can(`${routeName}.restore`) && (
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
                id={restoreMode ? 'exitRestoreMode' : 'patientRestore'}
              />
            </Button>
          </Grid>
        )}
        {props.can(`${routeName}.store`) && (
          <Grid item>
            <Button
              sx={{ color: 'white.main' }}
              startIcon={<PersonAdd />}
              variant="contained"
              onClick={(e) => {
                toggleEdit(-1)
              }}
            >
              <IntlMessage id="newPatient" />
            </Button>
          </Grid>
        )}
      </Grid>

      {props.data.data && (
        <AsyncTable
          enableRowSelection={false}
          initialState={{ columnVisibility }}
          routeName={route().current()}
          /* routeParams={{ module: module ? module.id : null }} */
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
                return cell.row.original.deleted_at &&
                  props.can('patient.restore') ? (
                  <Tooltip arrow placement="right" title="delete">
                    <IconButton
                      color="primary"
                      onClick={(e) => {
                        const name = cell.row.original.first_name
                        get(
                          route(`${routeName}.restore`, cell.row.original.id),
                          {},
                          {
                            onSuccess: () => {
                              toast.success(
                                `El paciente ${name}  fue restaurado`,
                              )
                            },
                          },
                        )
                      }}
                    >
                      <Restore />
                    </IconButton>
                  </Tooltip>
                ) : (
                  <>
                    {props.can('patient.destroy') && (
                      <Tooltip arrow placement="right" title="delete">
                        <IconButton
                          color="error"
                          onClick={(e) => setIdToDelete(cell.getValue())}
                        >
                          <Delete />
                        </IconButton>
                      </Tooltip>
                    )}
                    {props.can('patient.update') && (
                      <Tooltip arrow placement="right" title="edit">
                        <IconButton
                          color="primary"
                          onClick={(e) => setIdToEdit(cell.getValue())}
                        >
                          <Edit />
                        </IconButton>
                      </Tooltip>
                    )}
                  </>
                )
              },
            },
            { accessorKey: 'id', header: 'id' },
            {
              accessorKey: 'c_i',
              header: 'c_i',
              accessorFn: ({ nationality, c_i }) => `${nationality}- ${c_i}`,
            },
            { accessorKey: 'n_history', header: 'n_history' },
            { accessorKey: 'first_name', header: 'first_name' },
            { accessorKey: 'last_name', header: 'last_name' },
            {
              typeColumn: 'date',
              accessorKey: 'birth_date',
              header: 'birth_date',
              accessorFn: ({ birth_date }) => {
                const birthArray = birth_date.split('-')
                return format(
                  new Date(
                    Number(birthArray[0]),
                    Number(birthArray[1]) - 1,
                    Number(birthArray[2]),
                  ),
                  'dd 	MMMM yyyy',
                )
              },
            },
            {
              accessorKey: 'child',
              header: 'isChild',
              accessorFn: ({ child }) =>
                child ? (
                  <ChildCare sx={{ marginLeft: 1 }} color="success" />
                ) : (
                  <HighlightOff sx={{ marginLeft: 1 }} color="error" />
                ),
              size: 30,
              muiTableHeadCellProps: {
                align: 'left',
              },
              muiTableBodyCellProps: {
                align: 'left',
              },
              enableClickToCopy: false,
              Filter: ({ column }) => {
                const filterValue = column.getFilterValue() || []
                return (
                  <IconButton
                    color={column.getFilterValue() ? 'success' : 'secondary'}
                    onClick={() => {
                      if (column.getFilterValue())
                        return column.setFilterValue(false)
                      column.setFilterValue(true)
                    }}
                  >
                    <ChildCare />
                  </IconButton>
                )
              },
            },
            { accessorKey: 'email', header: 'email' },
            { accessorKey: 'direction', header: 'direction' },
            {
              accessorKey: 'gender',
              header: 'gender',
              accessorFn: ({ gender }) => <IntlMessage id={gender || ''} />,
              filterSelectOptions: [
                {
                  text: formatMessage({ id: 'Male' }),
                  value: 'Male',
                },
                {
                  text: formatMessage({ id: 'Female' }),
                  value: 'Female',
                },
              ],
              filterVariant: 'select',
            },

            {
              typeColumn: 'date',
              accessorKey: 'created_at',
              header: 'created_at',
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
            {
              accessorKey: 'deleted_at',
              header: 'deleted_at',
              typeColumn: 'date',
              accessorFn: ({ deleted_at }) =>
                !deleted_at
                  ? formatMessage({ id: 'active' })
                  : format(new Date(deleted_at), 'hh:mm dd MMMM yyyy'),
            },
          ]}
        />
      )}
      {/*  <MultiButton
        actions={[
          ...(props.can('patient.store')
            ? [
                {
                  icon: <PersonAdd />,
                  name: 'createPatient',
                  onClick: (e) => {
                    toggleEdit(-1)
                  },
                },
              ]
            : []),
          ...(props.can('patient.restore')
            ? [
                {
                  icon: <RestoreFromTrash />,
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
      <EditPatientModal
        open={idToEdit ? true : false}
        onClose={() => toggleEdit(null)}
        item={{ ..._.find(props.data.data, { id: idToEdit }) }}
      />
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
                { id: 'deleteMessage' },
                {
                  value: _.find(props.data.data, { id: idToDelete })[
                    'first_name'
                  ],
                },
              )
            : null
        }
      />
    </Fragment>
  )
}
