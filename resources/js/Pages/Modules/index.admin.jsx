import ConfirmModal from '@/Components/Common/ConfirmModal'
import MultiButton from '@/Components/Common/MultiButton'
import SectionTitle from '@/Components/Common/SectionTitle'
import Table from '@/Components/Common/Table'
import Head from '@/Components/Custom/Head'
import IconButton from '@/Components/Custom/IconButton'
import Tooltip from '@/Components/Custom/Tooltip'
import EditModuleModal from '@/Components/Layouts/Modules/EditModuleModal'
import { destroy, get, visit } from '@/HTTPProvider'
import {
  AddBusiness,
  Delete,
  DoorBackOutlined,
  Edit,
  Restore,
  RestoreFromTrash,
} from '@mui/icons-material'
import { format } from 'date-fns'
import { es } from 'date-fns/locale'
import _ from 'lodash'
import { Fragment, useState } from 'react'
import toast from 'react-hot-toast'
import { useIntl } from 'react-intl'

//const data for table
const columnVisibility = {
  id: false,
  updated_at: false,
}
const routeName = 'module'

export default ({ users = [], data = [], ...props }) => {
  const urlParams = new URLSearchParams(window.location.search)
  const restoreMode = urlParams.has('deleted')
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
      <Head title="modules" />
      <SectionTitle title="modules" />
      <Table
        initialState={{ columnVisibility }}
        data={data}
        columns={[
          {
            id: 'actions',
            accessorKey: 'id',
            columnDefType: 'display',
            header: 'actions',
            size: 80,

            Cell: ({ cell }) =>
              cell.row.original.deleted_at ? (
                <Tooltip arrow placement="right" title="delete">
                  <IconButton
                    color="primary"
                    onClick={(e) => {
                      const name = cell.row.original.name
                      get(
                        route(`${routeName}.restore`, cell.row.original.id),
                        {},
                        {
                          onSuccess: () => {
                            toast.success(
                              `El modulo ${name}  fue restaurado`,
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
                <Fragment>
                  <Tooltip arrow placement="right" title="delete">
                    <IconButton
                      color="error"
                      onClick={(e) => setIdToDelete(cell.getValue())}
                    >
                      <Delete />
                    </IconButton>
                  </Tooltip>
                  <Tooltip arrow placement="right" title="edit">
                    <IconButton
                      color="primary"
                      onClick={(e) => setIdToEdit(cell.getValue())}
                    >
                      <Edit />
                    </IconButton>
                  </Tooltip>
                  <Tooltip arrow placement="right" title="enter">
                    <IconButton
                      color="primary"
                      onClick={(e) =>
                        visit(route(`${routeName}.show`, cell.getValue()))
                      }
                    >
                      <DoorBackOutlined />
                    </IconButton>
                  </Tooltip>
                </Fragment>
              ),
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
            accessorKey: 'name',
            header: 'name',
          },
          {
            accessorFn: ({ user }) =>
              user ? user.first_name : formatMessage({ id: 'noAsigned' }),
            header: 'responsible',
          },
          /*{
            accessorKey: 'state',
            header: 'state',
            Cell: ({ cell }) => {
              return (
                <div>
                  <Switch
                    checked={cell.getValue()}
                   // disabled={cell.row.getValue('roles') && _.find(cell.row.getValue('roles'),{name:"administrador"})}
                    onChange={(e, newValue) => {
                      put(route('user.update', cell.row.getValue('id')), {
                        id:cell.row.getValue('id'),
                        state: newValue,
                      })
                    }}
                  />
                </div>
              )
            },
          },*/
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
              !updated_at ? '00/00/0000 00:00:00' : updated_at,
          },
        ]}
      />
      <MultiButton
        actions={[
          {
            icon: <AddBusiness />,
            name: 'createModule',
            onClick: (e) => {
              toggleEdit(-1)
            },
          },
          {
            icon: <RestoreFromTrash />,
            name: restoreMode ? 'exitRestoreMode' : 'moduleRestore',
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
        open={_.find(data, { id: idToDelete }) ? true : false}
        onClose={() => toggleConfirmDelete(null)}
        onSubmit={() => {
          toggleConfirmDelete(null);
          destroy(route(routeName + '.destroy', idToDelete))
        }}
        message={
          _.find(data, { id: idToDelete })
            ? formatMessage(
                { id: 'deleteMessage' },
                { value: _.find(data, { id: idToDelete })['name'] },
              )
            : null
        }
      />

      <EditModuleModal
        users={users}
        open={idToEdit ? true : false}
        onClose={() => toggleEdit(null)}
        item={{ ..._.find(data, { id: idToEdit }) }}
      />
    </Fragment>
  )
}
