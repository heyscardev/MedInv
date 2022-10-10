import AsyncTable from "@/Components/Common/AsyncTable";
import Breadcrums from "@/Components/Common/Breadcrums";
import CellNumberBox from "@/Components/Common/CellNumberBox";
import Table from "@/Components/Common/Table";
import IconButton from "@/Components/Custom/IconButton";
import IntlFormatCurrency from "@/Components/Custom/IntlFormatCurrency";
import IntlFormatNumber from "@/Components/Custom/IntlFormatNumber";
import ActionsTableShow from "@/Components/Layouts/Modules/ActionsTableShow";
import LogoTypography from "@/Components/LogoTypography";
import { visit } from "@/HTTPProvider";
import { AddShoppingCart, MoveUp, PostAdd, ShoppingCart } from "@mui/icons-material";
import { Box, Container } from "@mui/material";
import { Fragment } from "react";

const tableUpdate = ({ pagination, columnFilters, globalFilter, setIsLoading, routeName, routeParams }) => {
  setIsLoading(true);
  visit(
    route(routeName, {
      page: pagination.pageIndex + 1,
      page_size: pagination.pageSize,
      ...columnFilters,
      ...routeParams,
    }),
    {
      onFinish: () => {
        setIsLoading(false);
      },
      preserveScroll: true,
      noLoader: true,
      only: ["data"],
      replace: true,
    }
  );
};
export default (props) => {
  return (
    <Fragment>
      <LogoTypography />

      <AsyncTable
        routeName="transfer.index"
      //  routeParams={{ module: props.module.id }}
       // renderTopToolbarCustomActions={ActionsTableShow(props.module)}
        // onAsync={tableUpdate}
        data={props.data}
        initialState={{ columnVisibility: { id: false } }}
        columns={[

          { accessorKey: "user.first_name", header: "user", enableClickToCopy: true },
          { accessorKey: "module_send.name", header: "moduleSend", enableClickToCopy: true },
          { accessorKey: "module_receive.name", header: "moduleReceive", enableClickToCopy: true },
/*           {
            accessorKey: "unit.name",
            header: "unit",
          },
          {
            accessorKey: "price_sale",
            header: "price",
            filterVariant: "range",
            Cell: ({ cell }) => <IntlFormatCurrency value={cell.getValue()} />,
          },
          {
            accessorKey: "pivot.quantity_exist",
            header: "inventory",
            filterVariant: "range",
            Cell: ({ cell }) => <CellNumberBox value={cell.getValue()} />,
          },
          {
            enableColumnFilter: false,
            accessorKey: "quantity_global",
            header: "globalInventory",
            filterVariant: "range",
            Cell: ({ cell }) => <CellNumberBox value={cell.getValue()} />,
          }, */
          {
            accessorKey: "created_at",
            header: "created_at",
          },
        ]}
      />
    </Fragment>
  );
};
