import AsyncTable from '@/Components/Common/AsyncTable'
import EntityDelete from '@/Components/Common/EntityDeleted'
import MultiButton from '@/Components/Common/MultiButton'
import SectionTitle from '@/Components/Common/SectionTitle'
import Head from '@/Components/Custom/Head'
import { visit } from '@/HTTPProvider'
import { PostAdd } from '@mui/icons-material'
import { format } from 'date-fns'
import { Fragment, useState } from 'react'

const columnVisibility = {
  user: false,
  updated_at: false,
}
export default ({ module, ...props }) => {
  const [idToEdit, setIdToEdit] = useState(null)
  const toggleEdit = (id) => {
    setIdToEdit(id ? id : null)
  }
  return (
    <Fragment>
<Head title="recipes" />
    <SectionTitle title="recipes" noTranslateSubtitle subtitle={module?module.name:null} />
      {props.data.data && (
        <AsyncTable
          enableRowSelection={false}
          initialState={{ columnVisibility }}
          routeName={ route().current() }
          routeParams={{ module: module ? module.id : null }}
          // onAsync={tableUpdate}
          data={props.data}
          columns={[
            { accessorKey: 'id', header: 'id' },
            {
              accessorKey: 'user',
              header: 'user',
              accessorFn: ({ user: { first_name, last_name } }) => {
                return `${first_name} ${last_name}`
              },
            },
            {
              accessorKey: 'module',
              header: 'module',
              accessorFn: ({ module: { name } }) => {
                return `${name}`
              },
              Cell:({cell})=>{
                return <EntityDelete deleted_at={cell.row.original.module.deleted_at}>{cell.getValue()}</EntityDelete>
              }
            },
            {
              accessorKey: 'doctor',
              header: 'doctor',
              accessorFn: ({ doctor }) => {
                return doctor ? `${doctor.first_name} ${doctor.last_name}` : ''
              },
              Cell:({cell})=>{
                return <EntityDelete deleted_at={cell.row.original.doctor.deleted_at}>{cell.getValue()}</EntityDelete>
              }
            },
            {
              accessorKey: 'patient',
              header: 'patient',
              accessorFn: ({ patient: { first_name, last_name } }) => {
                return `${first_name} ${last_name}`
              },
              Cell:({cell})=>{
                return <EntityDelete deleted_at={cell.row.original.patient.deleted_at}>{cell.getValue()}</EntityDelete>
              }
            },

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
            /*     {
              accessorKey: 'deleted_at',
              header: 'deleted_at',

              accessorFn: ({ deleted_at }) =>
                !deleted_at ? formatMessage({ id: 'active' }) : format(new Date(deleted_at), 'hh:mm dd MMMM yyyy'),
            }, */
          ]}
        />
      )}
      <MultiButton
        actions={[
          {
            icon: <PostAdd />,
            name: 'createRecipe',
            onClick: (e) => {
              visit(
                route(`recipe.create`, {
                  module_id: module ? module.id : null,
                }),
              )
            },
          },
        ]}
      />

    </Fragment>
  )
}
