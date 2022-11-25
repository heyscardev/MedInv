import AsyncTable from '@/Components/Common/AsyncTable'
import MultiButton from '@/Components/Common/MultiButton'
import IntlFormatCurrency from '@/Components/Custom/IntlFormatCurrency'
import IntlFormatNumber from '@/Components/Custom/IntlFormatNumber'
import EditRecipeModal from '@/Components/Layouts/Recipes/EditRecipeModal'
import { MoveUp, PostAdd } from '@mui/icons-material'
import { Box } from '@mui/material'
import { Fragment, useState } from 'react'

export default (props) => {
  const [idToEdit, setIdToEdit] = useState(null)
  const toggleEdit = (id) => {
    setIdToEdit(id ? id : null)
  }
  return (
    <Fragment>
      {props.data.data && (
        <AsyncTable
          routeName="recipe.index"
          routeParams={{}}
          // onAsync={tableUpdate}
          data={props.data}
          columns={[{ accessorKey: 'id', header: 'id' }]}
        />
      )}
      <MultiButton
        actions={[
          {
            icon: <PostAdd />,
            name: 'createRecipe',
            onClick: (e) => {
              toggleEdit(-1)
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
