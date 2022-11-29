import AsyncTable from '@/Components/Common/AsyncTable'
import Select from '@/Components/Common/Inputs/Select'
import IntlMessage from '@/Components/Common/IntlMessage'
import MultiButton from '@/Components/Common/MultiButton'
import SectionTitle from '@/Components/Common/SectionTitle'
import EditPatientModal from '@/Components/Layouts/Patients/EditPatientModal'
import EditRecipeModal from '@/Components/Layouts/Recipes/EditRecipeModal'
import { visit } from '@/HTTPProvider'
import { ChildCare, HighlightOff, PersonAdd, PostAdd } from '@mui/icons-material'
import { IconButton, Stack } from '@mui/material'
import { format } from 'date-fns'
import { Fragment, useState } from 'react'
import { useIntl } from 'react-intl'

const columnVisibility = {
 id:false,
 deleted_at:false,
 created_at:false,
 updated_at:false,
 direction:false,
 phone:false,
 email:false

}
export default ({ module, ...props }) => {
  const {formatMessage}= useIntl();
  const [idToEdit, setIdToEdit] = useState(null)
  const toggleEdit = (id) => {
    setIdToEdit(id ? id : null)
  }
  return (
    <Fragment>
      <SectionTitle title="patients" />
      {props.data.data && (
        <AsyncTable
          enableRowSelection={false}
          initialState={{ columnVisibility }}
          routeName={route().current()}
          /* routeParams={{ module: module ? module.id : null }} */
          // onAsync={tableUpdate}
          data={props.data}
          columns={[
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
              accessorKey: 'child',
              header: 'isChild',
              accessorFn: ({ child }) =>
                child ? (
                  <ChildCare sx={{marginLeft:1}} color="success" />
                ) : (
                  <HighlightOff sx={{marginLeft:1}}  color="error" />
                ),
              size: 30,
              muiTableHeadCellProps: {
                align: 'left',
              },
              muiTableBodyCellProps: {
                align: 'left',
              },
              enableClickToCopy:false,
              Filter: ({ column }) => {
                const filterValue = column.getFilterValue() || []
                return (
                  <IconButton
                    color={column.getFilterValue()?"success":"secondary"}
                    onClick={()=>{
                      if(column.getFilterValue()) return column.setFilterValue(false);
                      column.setFilterValue(true);
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
              Filter: ({ column }) => {
                const filterValue = column.getFilterValue() || []
                return (
                  <Select
                    value={column.getFilterValue() || ''}
                    variant="standard"
                    fullWidth
                    options={[
                      {
                        label: 'Male',
                        value: 'Male',
                      },
                      {
                        label: 'Female',
                        value: 'Female',
                      },
                    ]}
                    onChange={(e) => column.setFilterValue(e.target.value)}
                  />
                )
              },
            },

            {
              typeColumn: 'created_at',
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
              
              accessorFn: ({ deleted_at }) =>
                !deleted_at ? formatMessage({ id: 'active' }) : format(new Date(deleted_at), 'hh:mm dd MMMM yyyy'),
            },
          ]}
        />
      )}
      <MultiButton
        actions={[
          {
            icon: <PersonAdd />,
            name: 'createPatient',
            onClick: (e) => {
             toggleEdit(-1)
            },
          },
        ]}
      />
      <EditPatientModal
        open={idToEdit ? true : false}
        onClose={() => toggleEdit(null)}
        item={{ ..._.find(props.data.data, { id: idToEdit }) }}
      />
    </Fragment>
  )
}
