/* import {
  ArrowRight,
  BorderAllOutlined,
  CheckBox,
  ClearAll,
  Close,
  Delete,
  DensityLarge,
  DensityMedium,
  DensitySmall,
  DragHandle,
  DynamicFeed,
  Edit,
  ExpandLess,
  ExpandMore,
  FilterAlt,
  FilterAltOff,
  FilterList,
  FilterListOff,
  Fullscreen,
  FullscreenExit,
  KeyboardDoubleArrowDown,
  MoreHoriz,
  MoreVert,
  PushPin,
  RestartAlt,
  Save,
  Search,
  SearchOff,
  Sort,
  ViewColumn,
  VisibilityOff,
} from '@mui/icons-material' */
import React, { useEffect, useMemo, useState } from 'react'
import MaterialReactTable from 'material-react-table'
import { get, visit } from '@/HTTPProvider'
import { useIntl } from 'react-intl'
import PropTypes from 'prop-types'
import { orderBy } from 'lodash'
import DatePicker from './Inputs/DatePicker'
import { isValid } from 'date-fns'
import { Paper, Stack } from '@mui/material'
import DatePickerRangeFilter from './FiltersTable/DatePickerRangeFilter'
import NumberBoxOutput from './FiltersTable/NumberBoxOutput'

const columnsFormat = (columns, formatMessage) => {
  return columns.map((item) => {
    const dataToColumn = {
      enableClickToCopy: true,
      ...item,
    }
    if (item.typeColumn === 'date') {
      dataToColumn.Filter = DatePickerRangeFilter
     
    }
    if (item.typeColumn === 'numberBox') {
      dataToColumn.Cell = ({ cell }) => (
        <NumberBoxOutput value={cell.getValue()} />
      )
      dataToColumn.muiTableBodyCellProps = { align: 'right' }
    }
    if (!item.noTranslate && item.header)
      dataToColumn.header = formatMessage({ id: item.header })
    return dataToColumn
  })
}
const onAsyncDefault = ({
  pagination,
  sorting,
  columnFilters,
  globalFilter,
  setIsLoading,
  routeName,
  routeParams,
}) => {
  const urlParams = new URLSearchParams(window.location.search)
  const restoreMode = urlParams.has('deleted')
  setIsLoading(true)
  visit(
    route(routeName, {
      page: pagination.pageIndex + 1,
      page_size: pagination.pageSize,
      orderBy: sorting,
      search: globalFilter,
      filters: columnFilters,
      deleted:restoreMode?true:null,
      ...routeParams,
    }),
    {
      onFinish: () => {
        setIsLoading(false)
      },
      replace: true,
      preserveScroll: true,
      noLoader: true,
      only: ['data', 'errors'],
    },
  )
}

const AsyncTable = ({
  elevation=2,
  sx={margin:2},
  initialState = {},
  data,
  columns = [
    {
      header: null,
      accessorFn: null,
      accessorKey: null,
      accessor: null,
      enableClickToCopy: true,
      enableColumnFilter: true,
      typeColumn: null,
      enableColumnSorting: null,
      noTranslate: false,
      enableColumnOrdering: null,
    },
  ],
  onAsync,
  routeName,
  enableRowSelection = true,
  routeParams = {},
  ...materialTableProps
}) => {
  const [isLoading, setIsLoading] = useState(false)
  const [isRefetching, setIsRefetching] = useState(false)
  const [columnFilters, setColumnFilters] = useState([])
  const [globalFilter, setGlobalFilter] = useState('')
  const [sorting, setSorting] = useState([])
  const { formatMessage } = useIntl()
  const [pagination, setPagination] = useState({
    pageIndex: 0,
    pageSize: 10,
  })
  useEffect(() => {
    if (!isLoading) {
      const params = {
        columnFilters,
        pagination,
        setIsLoading,
        globalFilter: globalFilter ? globalFilter : null,
        sorting,
        routeName,
        routeParams,
      }

      if (onAsync) return onAsync(params)
      onAsyncDefault(params)
    }
  }, [
    pagination.pageIndex,
    pagination.pageSize,
    columnFilters,
    globalFilter,
    sorting,
    routeName,
  ])

  return (
    <Paper elevation={elevation} sx={sx}>
      <MaterialReactTable
        enableStickyHeader
        enableColumnOrdering
        {...materialTableProps}
        columns={[...columnsFormat(columns, formatMessage)]}
        data={data.data}
        enableRowSelection={enableRowSelection}
        getRowId={(originalRow) => originalRow.id}
        initialState={{
          density: 'compact',
          showColumnFilters: true,
          columnVisibility: { id: false },
          ...initialState
        }}
        enableGlobalFilter={false}
        manualFiltering
        manualPagination
        manualSorting
        onColumnFiltersChange={setColumnFilters}
        onGlobalFilterChange={setGlobalFilter}
        onPaginationChange={setPagination}
        onSortingChange={setSorting}
        rowCount={data.total}
        muiTablePaginationProps={{
          rowsPerPageOptions: [10, 20, 50, 100],
        }}
        state={{
          columnFilters,
          globalFilter,
          isLoading,
          pagination,
          showProgressBars: isRefetching,
          sorting,
        }}
        localization={{
          actions: 'Acciones',
          cancel: 'Cancelar',
          changeFilterMode: 'Cambia el modo de filtro',
          clearFilter: 'Filtro claro',
          clearSearch: 'Borrar búsqueda',
          clearSort: 'Ordenar claro',
          columnActions: 'Acciones de columna',
          edit: 'Editar',
          expand: 'Expandir',
          expandAll: 'Expandir todo',
          filterByColumn: 'Filtrar por {column}',
          filterMode: 'Modo de filtro: {filterType}',
          grab: 'Agarrar',
          groupByColumn: 'Agrupar por {column}',
          groupedBy: 'Agrupados por ',
          hideAll: 'Ocultar todo',
          hideColumn: 'Ocultar columna de {column}',
          rowActions: 'Acciones de fila',
          pinToLeft: 'Alfile a la izquierda',
          pinToRight: 'Alfile a la derecha',
          save: 'Salvar',
          search: 'Búsqueda',
          selectedCountOfRowCountRowsSelected:
            '{selectedCount} de {rowCount} fila(s) seleccionadas',
          showAll: 'Mostrar todo',
          showAllColumns: 'Mostrar todas las columnas',
          showHideColumns: 'Mostrar/Ocultar columnas',
          showHideFilters: 'Alternar filtros',
          showHideSearch: 'Alternar búsqueda',
          sortByColumnAsc: 'Ordenar por {column} ascendente',
          sortByColumnDesc: 'Ordenar por {column} descendiendo',
          thenBy: ', entonces por ',
          toggleDensity: 'Alternar relleno denso',
          toggleFullScreen: 'Alternar pantalla completa',
          toggleSelectAll: 'Seleccionar todo',
          toggleSelectRow: 'Seleccionar fila',
          ungroupByColumn: 'Desagrupar por {column}',
          unpin: 'Quitar pasador',
          unpinAll: 'Afilar todo',
          unsorted: 'Sin clasificar',
          sortedByColumnAsc: 'Ordenar por {column} Ascendente',
          sortedByColumnDesc: 'Ordenar por {column} Descendente',
          and: '&',
          clickToCopy: 'copiar al portapapeles',
          move: 'Mover',
        }}
      />
    </Paper>
  )
}

export default AsyncTable
