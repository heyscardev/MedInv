import ConfirmModal from '@/Components/Common/ConfirmModal'
import GenericCrud from '@/Components/Common/GenericCrud'
import SectionTitle from '@/Components/Common/SectionTitle'
import Head from '@/Components/Custom/Head'
import IconButton from '@/Components/Custom/IconButton'
import EditModal from '@/Components/Layouts/MedicamentGroups/EditGroupModal'
import { destroy, put } from '@/HTTPProvider'
import { formatCrtUpdtAt } from '@/Utils/format'
import { BookmarkAdd, Edit } from '@mui/icons-material'
import { Switch } from '@mui/material'
import { Fragment } from 'react'
import { useIntl } from 'react-intl'

export default ({ data, can }) => {
  const { formatMessage } = useIntl()
  return (
    <Fragment>
      <Head title="medicamentGroups" />
      <SectionTitle title="medicamentGroups" />
      <GenericCrud
        data={data}
        columnVisibility={{ id: false }}
        routeName={'medicament.group'}
        deleteKeyMessage={'name'}
        EditModal={EditModal}
        createButtonTitle="newMedicamentGroup"
        messageSuccessRestore={(value) =>
          formatMessage(
            { id: 'restoreMedicamentGroupMessage' },
            { value: value.name },
          )
        }
        messageDelete={(value) =>
          formatMessage(
            { id: 'deleteMedicamentGroupMessage' },
            { value: value.name },
          )
        }
        enableEditAction={can('medicament.group.update')}
        enableDeleteAction={can('medicament.group.delete')}
        columns={[
          {
            accessorKey: 'id',
            header: 'id',
            // header: formatMessage({id:"id"}),
            enableColumnOrdering: false,
            enableEditing: false,
            size: 80,
          },
          {
            accessorKey: 'name',
            header: 'name',
            // header: formatMessage({id:"name"}),
          },
          {
            accessorKey: 'restricted',
            header: 'restricted',
            Cell: ({ cell }) => (
              <Switch
                checked={!!cell.getValue()}
                onChange={(e) => {
                  const item = cell.row.original;
                   put(route("medicament.group.update",item.id),{restricted:!cell.getValue()})
                }}
              />
            ),
            // header: formatMessage({id:"name"}),
          },
          {
            accessorKey: 'description',
            header: 'description',
            // header: formatMessage({id:"description"}),
          },
          {
            accessorKey: 'created_at',
            header: 'created_at',
            // header: formatMessage({id:"created_at"}),
            accessorFn: ({ created_at }) => formatCrtUpdtAt(created_at),
          },
          {
            accessorKey: 'updated_at',
            header: 'updated_at',
            // header: formatMessage({id:"updated_at"}),
            accessorFn: ({ updated_at }) => formatCrtUpdtAt(updated_at),
          },
        ]}
      />
    </Fragment>
  )
}
