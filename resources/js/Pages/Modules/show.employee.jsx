import AsyncTable from '@/Components/Common/AsyncTable'
import Breadcrums from '@/Components/Common/Breadcrums'
import CellNumberBox from '@/Components/Common/CellNumberBox'
import IntlMessage from '@/Components/Common/IntlMessage'
import Table from '@/Components/Common/Table'
import IconButton from '@/Components/Custom/IconButton'
import IntlFormatCurrency from '@/Components/Custom/IntlFormatCurrency'
import IntlFormatNumber from '@/Components/Custom/IntlFormatNumber'
import ActionsTableShow from '@/Components/Layouts/Modules/ActionsTableShow'
import { visit } from '@/HTTPProvider'
import { Head, Link } from '@inertiajs/inertia-react'
import {
  AddShoppingCart,
  LowPriority,
  MoveUp,
  PostAdd,
  Receipt,
  ShoppingCart,
  Store,
} from '@mui/icons-material'
import {
  Box,
  Button,
  ButtonGroup,
  Container,
  Grid,
  Paper,
  Typography,
} from '@mui/material'
import { Fragment } from 'react'

/* const tableUpdate = ({
  pagination,
  columnFilters,
  globalFilter,
  setIsLoading,
  routeName,
  routeParams,
}) => {
  setIsLoading(true)
  visit(
    route(routeName, {
      page: pagination.pageIndex + 1,
      page_size: pagination.pageSize,
      ...columnFilters,
      ...routeParams,
    }),
    {
      onFinish: () => {
        setIsLoading(false)
      },
      preserveScroll: true,
      noLoader: true,
      only: ['data'],
      replace: true,
    },
  )
} */
export default (props) => {
  return (
    <Fragment>
      <Head title={`${props.module.name}`} />
      {/* name of module */}
      <Grid container padding={2}>
        <Grid item xs={12} sm={6} lg={4}>
          <Paper elevation={2} sx={{ padding: 1 }}>
            <Typography
              display="flex"
              alignItems="center"
              columnGap={1}
              variant="h6"
              color="primary"
            >
              <Store />
              <IntlMessage id={'module'} />: {props.module.name}
            </Typography>
          </Paper>
        </Grid>
      </Grid>
      {/* actions for module */}
      <Container sx={{ padding: 2, display: 'flex', justifyContent: 'center' }}>
        <ButtonGroup
          variant="text"
          aria-label="text button group"
          size="lg"
          fullWidth
        >
          <Button
            startIcon={<ShoppingCart size="large" />}
            onClick={() => {
              visit(
                route('module.buy.index', {
                  module: props.module.id,
                }),
              )
            }}
          >
            <IntlMessage id="buys" />
          </Button>
          <Button
            startIcon={<AddShoppingCart size="large" />}
            onClick={() => {
              visit(
                route('buy.create', {
                  id: props.module.id,
                }),
              )
            }}
          >
            <IntlMessage id="newBuy" />
          </Button>
          <Button
            startIcon={<LowPriority size="large" />}
            onClick={() => {
              visit(
                route('module.transfer.index', {
                  id: props.module.id,
                }),
              )
            }}
          >
            <IntlMessage id="transfers" />
          </Button>
          <Button
            startIcon={<MoveUp size="large" />}
            onClick={() => {
              visit(
                route('transfer.create', {
                  id: props.module.id,
                }),
              )
            }}
          >
            <IntlMessage id="newTransfer" />
          </Button>
          <Button
            startIcon={<Receipt size="large" />}
            onClick={() => {
              visit(
                route('module.recipe.index', {
                  id: props.module.id,
                }),
              )
            }}
          >
            <IntlMessage id="recipes" />
          </Button>
          <Button
            startIcon={<PostAdd size="large" />}
            onClick={() => {
              visit(
                route('recipe.create', {
                  module_id: props.module.id,
                }),
              )
            }}
          >
            <IntlMessage id="newRecipe" />
          </Button>
        </ButtonGroup>
      </Container>
      {/* asyncronous table for view and filters for medicaments of module */}
      <AsyncTable
        routeName="module.show"
        routeParams={{ module: props.module.id }}
        renderTopToolbarCustomActions={ActionsTableShow(props.module)}
        enableRowSelection={false}
        // onAsync={tableUpdate}
        data={props.data}
        initialState={{ columnVisibility: { id: false } }}
        columns={[
          { accessorKey: 'id', header: 'id' },
          { accessorKey: 'code', header: 'code', enableClickToCopy: true },
          { accessorKey: 'name', header: 'name' },
          {
            accessorKey: 'unit.name',
            header: 'unit',
          },
          {
            accessorKey: 'price_sale',
            header: 'price',
            filterVariant: 'range',
            Cell: ({ cell }) => <IntlFormatCurrency value={cell.getValue()} />,
          },
          {
            accessorKey: 'pivot.quantity_exist',
            header: 'inventory',
            filterVariant: 'range',

            typeColumn: 'numberBox',
          },
          {
            enableColumnFilter: false,
            accessorKey: 'quantity_global',
            header: 'globalInventory',
            filterVariant: 'range',

            typeColumn: 'numberBox',
          },
          {
            accessorKey: 'pivot.updated_at',
            header: 'updated_at',
          },
        ]}
      />
    </Fragment>
  )
}
