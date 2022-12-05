import Table from '@/Components/Common/Table'
import {  Visibility } from '@mui/icons-material'
import { format } from 'date-fns'
import { es } from 'date-fns/locale'
import { Fragment, useState } from 'react'
import _ from 'lodash'
import SectionTitle from '@/Components/Common/SectionTitle'
import { IconButton } from '@mui/material'
import ShowModalActivity from '@/Components/Layouts/Activity/ShowModal'

export default ({ data }) => {

    const [idToShow, setIdToShow] = useState(null)
    const toggleShow = (id) => {
        setIdToShow(id ? id : null)
    }

  return (
    <Fragment>
      <SectionTitle title="user_activity" />
      <Table
        initialState={{ columnVisibility: { id: false } }}
        data={data}
        columns={[
          {
            accessorKey: 'id',
            header: 'id',
            enableColumnOrdering: false,
            enableEditing: false,
            size: 80,
          },
          {
            accessorKey: 'log_date',
            header: 'log_date',
            accessorFn: ({ log_date, dateHumanize }) =>
              !log_date
                ? '00/00/0000 00:00:00'
                : format(new Date(log_date), 'hh:mm dd MMMM yyyy', {
                    locale: es,
                  }) + ' ' + dateHumanize,
          },
          {
            accessorKey: 'user',
            header: 'user',
            accessorFn: ({ user: { first_name, last_name } }) => {
              return `${first_name} ${last_name}`
            },
          },
        //   {
        //     accessorKey: 'log_type',
        //     header: 'log_type',
        //   },
        //   {
        //     accessorKey: 'table_name',
        //     header: 'table_name',
        //   },
          {
            accessorKey: 'log_type',
            header: 'log_type',
            accessorFn: ({ log_type, table_name }) => {
              return table_name
                    ? `${log_type} from ${table_name}`
                    : `${log_type}`
            },
          },
          {
            id: 'actions',
            accessorKey: 'id',
            columnDefType: 'display',
            header: 'actions',
            size: 80,
            Cell: ({ cell }) => {
              return (
                <Fragment>
                  <IconButton
                    placement="right"
                    title="show"
                    color="primary"
                    onClick={(e) => setIdToShow(cell.getValue())}
                  >
                    <Visibility />
                  </IconButton>
                </Fragment>
              )
            },
          },

        ]}
      />

      <ShowModalActivity
        open={ idToShow ? true : false }
        onClose={ () => toggleShow(null) }
        item={{ ..._.find( data, { id: idToShow }) }}
      />

    </Fragment>
  )
}
