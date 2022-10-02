import {
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
} from "@mui/icons-material";
import React, { useEffect, useMemo, useState } from "react";
import MaterialReactTable from "material-react-table";
import { get, visit } from "@/HTTPProvider";
import { useIntl } from "react-intl";
import { orderBy } from "lodash";
/* import { IconButton, Paper, Tooltip, useTheme } from "@mui/material";
import MaterialReactTable from "material-react-table";
import { Fragment } from "react";
import { useIntl } from "react-intl"; */

//nested data is ok, see accessorKeys in ColumnDef below

/* export default ({sx={margin:2},elevation=2,data,...props}) => {
  const { primary, error } = useTheme().palette;
  const iconStyle = { color: primary.dark };
  const { formatMessage } = useIntl();
  console.log(data)
  return (
      <Paper  elevation={elevation} sx={sx}>
          <MaterialReactTable
              enableStickyHeader
              data={data.data}
              {...props}
              icons={{
                  SearchIcon: (prop1) => <Search sx={iconStyle} {...prop1} />,
                  SortIcon: (prop1) => <Sort sx={iconStyle} {...prop1} />,
                  ArrowRightIcon: (prop1) => (
                      <ArrowRight sx={iconStyle} {...prop1} />
                  ),
                  FilterAltIcon: (prop1) => (
                      <FilterAlt sx={iconStyle} {...prop1} />
                  ),
                  FilterListIcon: (prop1) => (
                      <FilterList sx={iconStyle} {...prop1} />
                  ),
                  FilterAltOffIcon: (prop1) => (
                      <FilterAltOff sx={iconStyle} {...prop1} />
                  ),
                  FilterListOffIcon: (prop1) => (
                      <FilterListOff sx={iconStyle} {...prop1} />
                  ),
                  CancelIcon: (prop1) => <Cancel sx={iconStyle} {...prop1} />,
                  CheckBoxIcon: (prop1) => (
                      <CheckBox sx={iconStyle} {...prop1} />
                  ),
                  ClearAllIcon: (prop1) => (
                      <ClearAll sx={iconStyle} {...prop1} />
                  ),
                  FullscreenIcon: (prop1) => (
                      <Fullscreen sx={iconStyle} {...prop1} />
                  ),
                  FullscreenExitIcon: (prop1) => (
                      <FullscreenExit sx={iconStyle} {...prop1} />
                  ),
                  CloseIcon: (prop1) => <Close sx={iconStyle} {...prop1} />,
                  DensityLargeIcon: (prop1) => (
                      <DensityLarge sx={iconStyle} {...prop1} />
                  ),
                  DensityMediumIcon: (prop1) => (
                      <DensityMedium sx={iconStyle} {...prop1} />
                  ),
                  DensitySmallIcon: (prop1) => (
                      <DensitySmall sx={iconStyle} {...prop1} />
                  ),
                  DragHandleIcon: (prop1) => (
                      <DragHandle sx={iconStyle} {...prop1} />
                  ),
                  DynamicFeedIcon: (prop1) => (
                      <DynamicFeed sx={iconStyle} {...prop1} />
                  ),
                  EditIcon: (prop1) => <Edit sx={iconStyle} {...prop1} />,
                  ExpandLessIcon: (prop1) => (
                      <ExpandLess sx={iconStyle} {...prop1} />
                  ),
                  KeyboardDoubleArrowDownIcon: (prop1) => (
                      <KeyboardDoubleArrowDown sx={iconStyle} {...prop1} />
                  ),
                  SearchOffIcon: (prop1) => (
                      <SearchOff sx={iconStyle} {...prop1} />
                  ),
                  ViewColumnIcon: (prop1) => (
                      <ViewColumn sx={iconStyle} {...prop1} />
                  ),
                  ExpandMoreIcon: (prop1) => (
                      <ExpandMore sx={iconStyle} {...prop1} />
                  ),
                  MoreVertIcon: (prop1) => (
                      <MoreVert sx={iconStyle} {...prop1} />
                  ),
                  MoreHorizIcon: (prop1) => (
                      <MoreHoriz sx={iconStyle} {...prop1} />
                  ),
                  PushPinIcon: (prop1) => (
                      <PushPin sx={iconStyle} {...prop1} />
                  ),
                  RestartAltIcon: (prop1) => (
                      <RestartAlt sx={iconStyle} {...prop1} />
                  ),
                  SaveIcon: (prop1) => <Save sx={iconStyle} {...prop1} />,
                  VisibilityOffIcon: (prop1) => (
                      <VisibilityOff sx={iconStyle} {...prop1} />
                  ),
              }} //best practice
              initialState={{
                  density: "compact",
                  expanded: false, //expand all groups by default
                  pagination: { pageIndex: 0, pageSize: 20 },
                  ...props.initialState,
                  // sorting: [{ id: 'state', desc: false }], //sort by state by default
              }}
muiTableContainerProps={{sx:{backgroundColor:"primary.light"}}}

              columns={[
 */
/* {
          id: "actions",
          accessorKey: "id",
          columnDefType: "display",
          header: "Acciones",
          size: 80,


          Cell: ({ cell }) => (
            <Fragment>
              <Tooltip arrow placement="right" title="Eliminar">
                <IconButton color="error" onClick={(e) => props.onDelete(cell.getValue(), e)}>
                  <Delete />
                </IconButton>
              </Tooltip>
              <Tooltip arrow placement="right" title="Editar">
                <IconButton color="primary" onClick={(e) => props.onEdit(cell.getValue(), e)}>
                  <Edit />
                </IconButton>
              </Tooltip>
            </Fragment>
          ),
        }, */
/*                  ...props.columns.map((item) =>
                      item.header && !item.noTranslate
                          ? {
                                ...item,
                                header: formatMessage({ id: item.header }),
                            }
                          : item
                  ),
              ]}

          />
      </Paper>
  );
}; */

/* const localizationInit=()=>{const {formatMessage} = useIntl(); return {
    actions: formatMessage({id:"actions"}),
    and: formatMessage({id:'and'}),
    cancel: formatMessage({id:'cancel'}),
    changeFilterMode: formatMessage({id:'changeFilterMode'}),
    changeSearchMode: formatMessage({id:'changeSearchMode'}),
    clearFilter: formatMessage({id:'clearFilter'}),
    clearSearch: formatMessage({id:'clearSearch'}),
    clearSort: formatMessage({id:'clearSort'}),
    clickToCopy: formatMessage({id:'clickToCopy'}),
    columnActions: formatMessage({id:'columnActions'}),
    copiedToClipboard: formatMessage({id:'copiedToClipboard'}),
    dropToGroupBy: formatMessage({id:'dropToGroupBy'}),
    edit: formatMessage({id:'edit'}),
    expand: formatMessage({id:'expand'}),
    expandAll: formatMessage({id:'expandAll'}),
    filterArrIncludes: formatMessage({id:'filterArrIncludes'}),
    filterArrIncludesAll: formatMessage({id:'filterArrIncludesAll'}),
    filterArrIncludesSome: formatMessage({id:'filterArrIncludesSome'}),
    filterBetween: formatMessage({id:'filterBetween'}),
    filterBetweenInclusive: formatMessage({id:'filterBetweenInclusive'}),
    filterByColumn: formatMessage({id:'filterByColumn'}),
    filterContains: formatMessage({id:'filterContains'}),
    filterEmpty: formatMessage({id:'filterEmpty'}),
    filterEndsWith: formatMessage({id:'filterEndsWith'}),
    filterEquals: formatMessage({id:'filterEquals'}),
    filterEqualsString: formatMessage({id:'filterEqualsString'}),
    filterFuzzy: formatMessage({id:'filterFuzzy'}),
    filterGreaterThan: formatMessage({id:'filterGreaterThan'}),
    filterGreaterThanOrEqualTo: formatMessage({id:'filterGreaterThanOrEqualTo'}),
    filterInNumberRange: formatMessage({id:'filterInNumberRange'}),
    filterIncludesString: formatMessage({id:'filterIncludesString'}),
    filterIncludesStringSensitive: formatMessage({id:'filterIncludesStringSensitive'}),
    filterLessThan: formatMessage({id:'filterLessThan'}),
    filterLessThanOrEqualTo: formatMessage({id:'filterLessThanOrEqualTo'}),
    filterMode: formatMessage({id:'filterMode'}),
    filterNotEmpty: formatMessage({id:'filterNotEmpty'}),
    filterNotEquals: formatMessage({id:'filterNotEquals'}),
    filterStartsWith: formatMessage({id:'filterStartsWith'}),
    filterWeakEquals: formatMessage({id:'filterWeakEquals'}),
    filteringByColumn: formatMessage({id:'filteringByColumn'}),
    goToFirstPage: formatMessage({id:'goToFirstPage'}),
    goToLastPage: formatMessage({id:'goToLastPage'}),
    goToNextPage: formatMessage({id:'goToNextPage'}),
    goToPreviousPage: formatMessage({id:'goToPreviousPage'}),
    grab: formatMessage({id:''}),
    groupByColumn: formatMessage({id:''}),
    groupedBy: formatMessage({id:''}),
    hideAll: formatMessage({id:''}),
    hideColumn: formatMessage({id:''}),
    max: formatMessage({id:''}),
    min: formatMessage({id:''}),
    move: formatMessage({id:''}),
    noRecordsToDisplay: formatMessage({id:''}),
    noResultsFound: formatMessage({id:''}),
    of: formatMessage({id:''}),
    or: formatMessage({id:''}),
    pinToLeft: formatMessage({id:''}),
    pinToRight: formatMessage({id:''}),
    resetColumnSize: formatMessage({id:''}),
    resetOrder: formatMessage({id:''}),
    rowActions: formatMessage({id:''}),
    rowNumber: formatMessage({id:''}),
    rowNumbers: formatMessage({id:''}),
    rowsPerPage: formatMessage({id:''}),
    save: formatMessage({id:''}),
    search: formatMessage({id:''}),
    selectedCountOfRowCountRowsSelected:formatMessage({id:'selectedCountOfRowCountRowsSelected'}),
    select: formatMessage({id:''}),
    showAll: formatMessage({id:''}),
    showAllColumns: formatMessage({id:''}),
    showHideColumns: formatMessage({id:''}),
    showHideFilters: formatMessage({id:''}),
    showHideSearch: formatMessage({id:''}),
    sortByColumnAsc: formatMessage({id:''}),
    sortByColumnDesc: formatMessage({id:''}),
    sortedByColumnAsc: formatMessage({id:''}),
    sortedByColumnDesc: formatMessage({id:''}),
    thenBy: formatMessage({id:''}),
    toggleDensity: formatMessage({id:''}),
    toggleFullScreen: formatMessage({id:''}),
    toggleSelectAll: formatMessage({id:''}),
    toggleSelectRow: formatMessage({id:''}),
    toggleVisibility: formatMessage({id:''}),
    ungroupByColumn: formatMessage({id:''}),
    unpin: formatMessage({id:''}),
    unpinAll: formatMessage({id:''}),
    unsorted: formatMessage({id:''}),
  }} */


const onAsyncDefault = ({ pagination, sorting, columnFilters, globalFilter, setIsLoading, routeName, routeParams }) => {
  setIsLoading(true);
  visit(
    route(routeName, {
      page: pagination.pageIndex + 1,
      page_size: pagination.pageSize,
      orderBy:sorting,
      search:globalFilter,
      filters:columnFilters,
      ...routeParams,
    }),
    {
      onFinish: () => {
        setIsLoading(false);
      },
      replace: true,
      preserveScroll: true,
      noLoader: true,
      only: ["data","errors"],
    }
  );
};

export default ({ initialState={},data, columns, onAsync, routeName, routeParams = {}, ...materialTableProps }) => {
  const [isLoading, setIsLoading] = useState(false);
  const [isRefetching, setIsRefetching] = useState(false);
  const [columnFilters, setColumnFilters] = useState([]);
  const [globalFilter, setGlobalFilter] = useState("");
  const [sorting, setSorting] = useState([]);
  const {formatMessage}= useIntl();
  const [pagination, setPagination] = useState({
    pageIndex: 0,
    pageSize: 10,
  });
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
      };

      if (onAsync) return onAsync(params);
      onAsyncDefault(params);
    }
  }, [pagination.pageIndex, pagination.pageSize, columnFilters, globalFilter, sorting, routeName]);

  return (
    <MaterialReactTable
    enableStickyHeader
      {...materialTableProps}
      columns={[
        ...columns.map((item) =>
          item.header && !item.noTranslate
            ? {
                ...item,
                header: formatMessage({ id: item.header }),
              }
            : item
        ),
      ]}

      data={data.data}
      enableRowSelection
      getRowId={(row) => row.phoneNumber}
      initialState={{ showColumnFilters: true,columnVisibility:{id:false} }}
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
        actions: "Acciones",
        cancel: "Cancelar",
        changeFilterMode: "Cambia el modo de filtro",
        clearFilter: "Filtro claro",
        clearSearch: "Borrar búsqueda",
        clearSort: "Ordenar claro",
        columnActions: "Acciones de columna",
        edit: "Editar",
        expand: "Expandir",
        expandAll: "Expandir todo",
        filterByColumn: "Filtrar por {column}",
        filterMode: "Modo de filtro: {filterType}",
        grab: "Agarrar",
        groupByColumn: "Agrupar por {column}",
        groupedBy: "Agrupados por ",
        hideAll: "Ocultar todo",
        hideColumn: "Ocultar columna de {column}",
        rowActions: "Acciones de fila",
        pinToLeft: "Alfile a la izquierda",
        pinToRight: "Alfile a la derecha",
        save: "Salvar",
        search: "Búsqueda",
        selectedCountOfRowCountRowsSelected: "{selectedCount} de {rowCount} fila(s) seleccionadas",
        showAll: "Mostrar todo",
        showAllColumns: "Mostrar todas las columnas",
        showHideColumns: "Mostrar/Ocultar columnas",
        showHideFilters: "Alternar filtros",
        showHideSearch: "Alternar búsqueda",
        sortByColumnAsc: "Ordenar por {column} ascendente",
        sortByColumnDesc: "Ordenar por {column} descendiendo",
        thenBy: ", entonces por ",
        toggleDensity: "Alternar relleno denso",
        toggleFullScreen: "Alternar pantalla completa",
        toggleSelectAll: "Seleccionar todo",
        toggleSelectRow: "Seleccionar fila",
        ungroupByColumn: "Desagrupar por {column}",
        unpin: "Quitar pasador",
        unpinAll: "Afilar todo",
        unsorted: "Sin clasificar",
        sortedByColumnAsc: "Ordenar por {column} Ascendente",
        sortedByColumnDesc: "Ordenar por {column} Descendente",
        and: "&",
        clickToCopy: "copiar al portapapeles",
        move: "Mover",
      }}
    />
  );
};
