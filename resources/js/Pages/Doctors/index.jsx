import Table from '@/Components/Common/Table'

import ConfirmModal from '@/Components/Common/ConfirmModal'
import MultiButton from '@/Components/Common/MultiButton'
import SectionTitle from '@/Components/Common/SectionTitle'
import Head from '@/Components/Custom/Head'
import IconButton from '@/Components/Custom/IconButton'
import Tooltip from '@/Components/Custom/Tooltip'
import EditDoctorModal from '@/Components/Layouts/Doctors/EditDoctorModal'
import { destroy, get, visit } from '@/HTTPProvider'
import {
  formatCiFromDataBase,
  formatDateFromDataBase,
  formatGenderFromDataBase,
} from '@/Utils/format'
import {
  AddBusiness,
  Delete,
  Edit,
  EditAttributes,
  EditAttributesRounded,
  PersonAdd,
  Restore,
  RestoreFromTrash,
} from '@mui/icons-material'
import { format } from 'date-fns'
import { es } from 'date-fns/locale'
import _ from 'lodash'
import { Fragment, useEffect, useState } from 'react'
import { useIntl } from 'react-intl'
import toast from 'react-hot-toast'
import EditDoctorMedicamentGroup from '@/Components/Layouts/Doctors/EditDoctorMedicamentGroup'
import { Button, Grid } from '@mui/material'
import IntlMessage from '@/Components/Common/IntlMessage'

const formatDataUser = (user) => {
  const birth_date = formatDateFromDataBase(user.birth_date)
  return {
    ...user,
    birth_date,
  }
}
//const data for table
const columnVisibility = {
  id: false,
  last_name: true,
  phone: false,
  direction: false,
  email: false,
  birth_date: false,
  created_at: false,
  updated_at: false,
  deleted_at: false,
}
const routeName = 'doctor'

export default ({ services = [], medicamentGroups, ...props }) => {
  const urlParams = new URLSearchParams(window.location.search)
  const restoreMode = urlParams.has('deleted')
  //Accedemos a los valores

  const [dataTable, setDataTable] = useState([])

  useEffect(() => {
    setDataTable(props.data.map(formatDataUser))
  }, [props.data])

  const { formatMessage } = useIntl()
  const [idToDelete, setIdToDelete] = useState(null)
  const toggleConfirmDelete = (id) => {
    setIdToDelete(id ? id : null)
  }

  const [idToEdit, setIdToEdit] = useState(null)
  const toggleEdit = (id) => {
    setIdToEdit(id ? id : null)
  }
  const [idToEditGroup, setIdToEditGroup] = useState(null)
  const toggleEditGroup = (id) => {
    setIdToEditGroup(id ? id : null)
  }
  return (
    <Fragment>
      <Head title="doctors" />
      <SectionTitle title="doctors" />
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
                id={restoreMode ? 'exitRestoreMode' : 'doctorRestore'}
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
              <IntlMessage id="newDoctor" />
            </Button>
          </Grid>
        )}
      </Grid>
      <Table
        initialState={{ columnVisibility }}
        data={dataTable}
        columns={[
          {
            id: 'actions',
            accessorKey: 'id',
            columnDefType: 'display',
            header: 'actions',
            size: 80,

            Cell: ({ cell }) => {
              return cell.row.original.deleted_at ? (
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
                            toast.success(`El doctor ${name}  fue restaurado`)
                          },
                        },
                      )
                    }}
                  >
                    <Restore />
                  </IconButton>
                </Tooltip>
              ) : (
                <Fragment>
                  {props.can(`${routeName}.edit`) && (
                    <IconButton
                      arrow
                      placement="right"
                      title="delete"
                      color="error"
                      onClick={(e) => setIdToDelete(cell.getValue())}
                    >
                      <Delete />
                    </IconButton>
                  )}
                  {props.can(`${routeName}.delete`) && (
                    <IconButton
                      placement="right"
                      title="edit"
                      color="primary"
                      onClick={(e) => setIdToEdit(cell.getValue())}
                    >
                      <Edit />
                    </IconButton>
                  )}
                  {props.can(`${routeName}.medicament.group.edit`) && (
                    <IconButton
                      arrow
                      placement="right"
                      title="editMedicamentGroup"
                      color="primary"
                      onClick={(e) => setIdToEditGroup(cell.getValue())}
                    >
                      <EditAttributes />
                    </IconButton>
                  )}
                </Fragment>
              )
            },
          },
          {
            accessorKey: 'id',
            header: 'id',
            enableColumnOrdering: false,
            enableEditing: false,
            size: 80,
          },
          {
            accessorKey: 'code',
            header: 'code',
          },
          {
            accessorKey: 'first_name',
            header: 'first_name',
          },
          {
            accessorKey: 'last_name',
            header: 'last_name',
          },
          {
            accessorKey: 'email',
            header: 'email',
          },
          {
            accessorKey: 'c_i',
            header: 'c_i',
            accessorFn: ({ nationality, c_i }) => `${nationality}- ${c_i}`,
          },
          {
            accessorKey: 'birth_date',
            header: 'birth_date',
            accessorFn: ({ birth_date }) =>
              format(new Date(birth_date), 'dd 	MMMM yyyy', { locale: es }),
          },
          {
            accessorKey: 'gender',
            header: 'gender',
            accessorFn: ({ gender }) => formatGenderFromDataBase(gender),
            filterSelectOptions: [
              {
                text: formatMessage({ id: 'Male' }),
                value: formatMessage({ id: 'Male' }),
              },
              {
                text: formatMessage({ id: 'Female' }),
                value: formatMessage({ id: 'Female' }),
              },
            ],
            filterVariant: 'select',
          },
          {
            accessorKey: 'phone',
            header: 'phone',
          },

          /*  {
            accessorKey: 'state',
            header: 'state',
            Cell: ({ cell }) => {
              return (
                <div>
                  <Switch
                    checked={!!cell.getValue()}
                    disabled={cell.row.original.deleted_at}
                    // disabled={cell.row.getValue('roles') && _.find(cell.row.getValue('roles'),{name:"administrador"})}
                    onChange={(e, newValue) => {
                      put(route('user.update', cell.row.getValue('id')), {
                        id: cell.row.getValue('id'),
                        state: newValue,
                      })
                    }}
                  />
                </div>
              )
            },
          }, */
          {
            accessorKey: 'created_at',
            header: 'created_at',
            accessorFn: ({ created_at }) =>
              !created_at
                ? '00/00/0000 00:00:00'
                : format(new Date(created_at), 'hh:mm dd MMMM yyyy', {
                    locale: es,
                  }),
          },
          {
            accessorKey: 'updated_at',
            header: 'updated_at',
            accessorFn: ({ updated_at }) =>
              !updated_at
                ? '00/00/0000 00:00:00'
                : format(new Date(updated_at), 'hh:mm dd MMMM yyyy', {
                    locale: es,
                  }),
          },
          {
            accessorKey: 'deleted_at',
            header: 'deleted_at',

            accessorFn: ({ deleted_at }) =>
              !deleted_at
                ? formatMessage({ id: 'active' })
                : format(new Date(deleted_at), 'hh:mm dd MMMM yyyy', {
                    locale: es,
                  }),
          },
        ]}
      />

      <ConfirmModal
        open={_.find(dataTable, { id: idToDelete }) ? true : false}
        onClose={() => toggleConfirmDelete(null)}
        onSubmit={() => {
          destroy(route(routeName + '.destroy', idToDelete))
        }}
        message={
          _.find(dataTable, { id: idToDelete })
            ? formatMessage(
                { id: 'deleteMessage' },
                { value: _.find(dataTable, { id: idToDelete })['first_name'] },
              )
            : null
        }
      />

      <EditDoctorModal
        services={services}
        open={idToEdit ? true : false}
        onClose={() => toggleEdit(null)}
        item={{ ..._.find(dataTable, { id: idToEdit }) }}
      />
      <EditDoctorMedicamentGroup
        medicamentGroups={medicamentGroups || []}
        open={!!idToEditGroup}
        onClose={() => toggleEditGroup(null)}
        item={{ ..._.find(dataTable, { id: idToEditGroup }) }}
      />
    </Fragment>
  )
}
