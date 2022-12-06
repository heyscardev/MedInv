import Table from '@/Components/Common/Table'
import EditModalUser from '@/Components/Layouts/Users/EditModal'
import {
  formatCiFromDataBase,
  formatDateFromDataBase,
  formatGenderFromDataBase,
} from '@/Utils/format'
import {
  Delete,
  Edit,
  People,
  PersonAdd,
  Restore,
  RestoreFromTrash,
  Visibility,
} from '@mui/icons-material'
import { format } from 'date-fns'
import { es } from 'date-fns/locale'
import { Fragment, useEffect, useState } from 'react'
import { useIntl } from 'react-intl'
import ConfirmModal from '@/Components/Common/ConfirmModal'
import MultiButton from '@/Components/Common/MultiButton'
import { destroy, get, put, visit } from '@/HTTPProvider'
import _ from 'lodash'
import Tooltip from '@/Components/Custom/Tooltip'
import IconButton from '@/Components/Custom/IconButton'
import { Switch } from '@mui/material'
import { Head, usePage } from '@inertiajs/inertia-react'
import SectionTitle from '@/Components/Common/SectionTitle'
import toast from 'react-hot-toast'

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
  last_name: false,
  phone: false,
  direction: false,
  deleted_at: false,
}
const routeName = 'user'

export default ({ ...props }) => {
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
  return (
    <Fragment>
      <Head title={formatMessage({ id: 'users' })} />
      <SectionTitle title="users" />
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
                <IconButton
                  placement="right"
                  title="delete"
                  color="primary"
                  onClick={(e) => {
                    const name = cell.row.original.first_name
                    get(
                      route(`${routeName}.restore`, cell.row.original.id),
                      {},
                      {
                        onSuccess: () => {
                          toast.success(`El Usuario ${name}  fue restaurado`)
                        },
                      },
                    )
                  }}
                >
                  <Restore />
                </IconButton>
              ) : (
                <Fragment>
                   <IconButton
                    placement="right"
                    title="viewUserActivity"
                    color="error"
                    onClick={(e) => visit(route('user.activity.index',{user:cell.row.original.id}))}
                  >
                    <Visibility />
                  </IconButton>
                  <IconButton
                    placement="right"
                    title="delete"
                    color="error"
                    onClick={(e) => {setIdToDelete(cell.getValue())}}
                  >
                    <Delete />
                  </IconButton>
                  <IconButton
                    placement="right"
                    title="edit"
                    color="primary"
                    onClick={(e) => {
<<<<<<< Updated upstream
                      if(cell.row.original.id ===  props.auth.user.id)return toast.error('el usuario actual solo se edita desde el  menu de la barra de navegacion -> preferencias')
=======
                      if(cell.row.original.id ===  props.auth.user.id)return toast.error('el usuario actual solo se edita desde el  menu de la barra de navegacion -> ajuste de usuario')
>>>>>>> Stashed changes
                      setIdToEdit(cell.getValue())}}
                  >
                    <Edit />
                  </IconButton>
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
            accessorFn: ({ c_i }) => formatCiFromDataBase(c_i),
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
          },
          {
            accessorKey: 'phone',
            header: 'phone',
          },
          {
            accessorKey: 'direction',
            header: 'direction',
          },
          {
            accessorKey: 'state',
            header: 'state',
            Cell: ({ cell }) => {
              return (
                <div>
                  
                  <Switch
                    checked={!!cell.getValue()}
                    disabled={!!cell.row.original.deleted_at || cell.row.original.id ===  props.auth.user.id}
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
          },
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
      <MultiButton
        actions={[
          {
            icon: <PersonAdd />,
            name: 'user',
            onClick: (e) => {
              toggleEdit(-1)
            },
          },
          {
            icon: <RestoreFromTrash />,
            name: restoreMode ? 'exitRestoreMode' : 'usersRestore',
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
        ]}
      />

      <ConfirmModal
        open={_.find(dataTable, { id: idToDelete }) ? true : false}
        onClose={() => toggleConfirmDelete(null)}
        onSubmit={() => {
          toggleConfirmDelete(null);
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

      <EditModalUser
        open={idToEdit ? true : false}
        onClose={() => toggleEdit(null)}
        item={{ ..._.find(dataTable, { id: idToEdit }) }}
      />
    </Fragment>
  )
}
