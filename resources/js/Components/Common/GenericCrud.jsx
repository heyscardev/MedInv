import ConfirmModal from '@/Components/Common/ConfirmModal'
import MultiButton from '@/Components/Common/MultiButton'
import { destroy } from '@/HTTPProvider'
import { generatorTableColumns } from '@/Utils/generators'
import {
  DataSaverOn,
  Delete,
  Edit,
  PersonAdd,
  Restore,
} from '@mui/icons-material'
import _ from 'lodash'
import { Fragment, useEffect, useState } from 'react'
import { useIntl } from 'react-intl'
import IconButton from '../Custom/IconButton'
import Table from './Table'

export default ({
  columns,
  enableEditAction,
  enableDeleteAction,
  enableRestoreAction,
  enableShowAction,
  messageSuccessRestore = (item) => `El recurso N° ${item.id}  fue restaurado`,
  messageDelete = (item) =>
    `Esta Seguro que desea eliminar el recurso N° ${item.id}`,
  EditModal,
  actions = ['create', 'update', 'delete'],
  routeName,
  data,
  columnVisibility = {},
  multiButtonActions,
  deleteKeyMessage,
}) => {
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
        actions={actions}
        initialState={{ columnVisibility }}
        onDelete={(id) => toggleConfirmDelete(id)}
        onEdit={(id) => toggleEdit(id)}
        data={data}
        columns={[
          {
            id: 'actions',
            accessorKey: 'id',
            columnDefType: 'display',
            header: 'actions',
            size: 80,

            Cell: ({ cell }) => {
              const item = cell.row.original
              return item.deleted_at && enableRestoreAction ? (
                <IconButton
                  arrow
                  placement="right"
                  title="restore"
                  color="primary"
                  onClick={(e) => {
                    const item = cell.row.original
                    get(
                      route(`${routeName}.restore`, item.id),
                      {},
                      {
                        onSuccess: () => {
                          toast.success(messageSuccessRestore(item))
                        },
                      },
                    )
                  }}
                >
                  <Restore />
                </IconButton>
              ) : (
                <Fragment>
                  {enableDeleteAction && (
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
                  {enableEditAction && (
                    <IconButton
                      arrow
                      placement="right"
                      title="edit"
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
          ...(columns ? columns : generatorTableColumns(data)),
        ]}
      />
      <MultiButton
        actions={[
          {
            icon: <DataSaverOn />,
            name: 'create',
            onClick: (e) => {
              toggleEdit(-1)
            },
          },
        ]}
        // actions={ multiButtonActions }
      />

      <ConfirmModal
        open={_.find(data, { id: idToDelete }) ? true : false}
        onClose={() => toggleConfirmDelete(null)}
        onSubmit={() => {
          destroy(route(routeName + '.destroy', idToDelete,),{onSuccess:()=>{
            toggleConfirmDelete(null);
          }})
        }}
        message={
          _.find(data, { id: idToDelete })
            ? messageDelete(_.find(data, { id: idToDelete }))
            : null
        }
      />

      <EditModal
        open={idToEdit ? true : false}
        onClose={() => toggleEdit(null)}
        item={{ ..._.find(data, { id: idToEdit }) }}
      />
    </Fragment>
  )
}
