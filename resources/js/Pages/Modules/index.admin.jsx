import Table from '@/Components/Common/Table'
import EditModalUser from '@/Components/Layouts/Users/EditModal'
import {
  formatCiFromDataBase,
  formatDateFromDataBase,
  formatGenderFromDataBase,
} from '@/Utils/format'
import { AddBusiness, Delete, DoorBack, DoorBackOutlined, Edit, PersonAdd } from '@mui/icons-material'
import { format } from 'date-fns'
import { es } from 'date-fns/locale'
import { Fragment, useEffect, useState } from 'react'
import { useIntl } from 'react-intl'
import ConfirmModal from '@/Components/Common/ConfirmModal'
import MultiButton from '@/Components/Common/MultiButton'
import { destroy, put, visit } from '@/HTTPProvider'
import _ from 'lodash'
import Tooltip from '@/Components/Custom/Tooltip'
import IconButton from '@/Components/Custom/IconButton'
import { Switch } from '@mui/material'
import AsyncTable from '@/Components/Common/AsyncTable'
import EditModuleModal from '@/Components/Layouts/Modules/EditModuleModal'
import { Link } from '@inertiajs/inertia-react'

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
  updated_at:false
}
const routeName = 'module'

export default ({data=[],...props}) => {
 

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

            Cell: ({ cell }) => (
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
                   
                    onClick={(e) => visit(route(`${routeName}.show`,cell.getValue()))}
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
            accessorFn:({user})=>user ?user.first_name:formatMessage({id:"noAsigned"}),
            header: 'responsible',
          },
        /*   {
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
            name: 'crear',
            onClick: (e) => {
              toggleEdit(-1)
            },
          },
        ]}
      />

      <ConfirmModal
        open={_.find(data, { id: idToDelete }) ? true : false}
        onClose={() => toggleConfirmDelete(null)}
        onSubmit={() => {
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
        open={idToEdit ? true : false}
        onClose={() => toggleEdit(null)}
        item={{ ..._.find(data, { id: idToEdit }) }}
      /> 
    </Fragment>
  )
}
