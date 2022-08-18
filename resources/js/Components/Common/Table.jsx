import React, { useMemo } from "react";
import MaterialReactTable from "material-react-table";
import {
    ArrowRight,
    CheckBox,
    ClearAll,
    Close,
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
    KeyboardArrowDown,
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
import { Table, ThemeProvider, useTheme } from "@mui/material";

//nested data is ok, see accessorKeys in ColumnDef below

export default (props) => {
    const { primary, error } = useTheme().palette;
    const iconStyle = { color: primary.main };
    return (
        <MaterialReactTable
        enableStickyHeader
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
                CheckBoxIcon: (prop1) => <CheckBox sx={iconStyle} {...prop1} />,
                ClearAllIcon: (prop1) => <ClearAll sx={iconStyle} {...prop1} />,
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
                MoreVertIcon: (prop1) => <MoreVert sx={iconStyle} {...prop1} />,
                MoreHorizIcon: (prop1) => (
                    <MoreHoriz sx={iconStyle} {...prop1} />
                ),
                PushPinIcon: (prop1) => <PushPin sx={iconStyle} {...prop1} />,
                RestartAltIcon: (prop1) => (
                    <RestartAlt sx={iconStyle} {...prop1} />
                ),
                SaveIcon: (prop1) => <Save sx={iconStyle} {...prop1} />,
                VisibilityOffIcon: (prop1) => (
                    <VisibilityOff sx={iconStyle} {...prop1} />
                ),
            }} //best practice
            enablePinning
            {...props}
        />
    );
};
