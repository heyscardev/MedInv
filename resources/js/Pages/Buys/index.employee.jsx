import AsyncTable from '@/Components/Common/AsyncTable'
import EntityDelete from '@/Components/Common/EntityDeleted'
import MultiButton from '@/Components/Common/MultiButton'
import SectionTitle from '@/Components/Common/SectionTitle'
import Head from '@/Components/Custom/Head'
import IntlFormatCurrency from '@/Components/Custom/IntlFormatCurrency'
import EditRecipeModal from '@/Components/Layouts/Recipes/EditRecipeModal'
import { visit } from '@/HTTPProvider'
import { AddShoppingCart, PostAdd } from '@mui/icons-material'
import { format } from 'date-fns'
import { Fragment, useState } from 'react'
import { useIntl } from 'react-intl'
const routeName = "buy";
const columnVisibility = {
  user: false,
  updated_at: false,
  deleted_at:false
}
export default ({ module, ...props }) => {
    const {formatMessage } = useIntl();
  const [idToEdit, setIdToEdit] = useState(null)
  const toggleEdit = (id) => {
    setIdToEdit(id ? id : null)
  }
  return (
    <Fragment>
      <Head title="buys" />
      <SectionTitle
        title="buys"
        noTranslateSubtitle
        subtitle={module ? module.name : null}
      />
      {props.data.data && (
        <AsyncTable
          enableRowSelection={false}
          initialState={{ columnVisibility }}
          routeName={route().current()}
          routeParams={{ module: module ? module.id : null }}
          // onAsync={tableUpdate}
          data={props.data}
          columns={[
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
                accessorKey: "total_medicaments",
                header: "totalMedicaments",
                typeColumn: 'numberBox',
            },
            { accessorKey: "total_quantity", header: "totalQuantity", typeColumn: 'numberBox', },
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
                {
              accessorKey: 'deleted_at',
              header: 'deleted_at',
              typeColumn: 'date',
              accessorFn: ({ deleted_at }) =>
                !deleted_at ? formatMessage({ id: 'active' }) : format(new Date(deleted_at), 'hh:mm dd MMMM yyyy'),
            },
          ]}
        />
      )}
      <MultiButton
        actions={[
          {
            icon: <AddShoppingCart />,
            name: 'createBuy',
            onClick: (e) => {
              visit(
                route(`buy.create`, {
                  id: module ? module.id : null,
                }),
              )
            },
          },
        ]}
      />
      <EditRecipeModal
        open={idToEdit ? true : false}
        onClose={() => toggleEdit(null)}
        item={{ ..._.find(props.data.data, { id: idToEdit }) }}
      />
    </Fragment>
  )
}
