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
import { IconButton, Paper, Tooltip, useTheme } from "@mui/material";
import MaterialReactTable from "material-react-table";
import { Fragment } from "react";
import { useIntl } from "react-intl";

//nested data is ok, see accessorKeys in ColumnDef below

export default ({sx={margin:2},elevation=2,...props}) => {
    const { primary, error } = useTheme().palette;
    const iconStyle = { color: primary.dark };
    const { formatMessage } = useIntl();
    return (
        <Paper  elevation={elevation} sx={sx}>
            <MaterialReactTable
                enableStickyHeader
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
muiTablePaginationProps={{sx:{backgroundColor:"primary.dark",color:"white.main"}}}

                columns={[

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
                    ...props.columns.map((item) =>
                        item.header && !item.noTranslate
                            ? {
                                  ...item,
                                  header: formatMessage({ id: item.header }),
                              }
                            : item
                    ),
                ]}
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
                    selectedCountOfRowCountRowsSelected:
                        "{selectedCount} de {rowCount} fila(s) seleccionadas",
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
        </Paper>
    );
};
