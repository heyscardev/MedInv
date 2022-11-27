import Breadcrums from "@/Components/Common/Breadcrums";
import Table from "@/Components/Common/Table";
import IconButton from "@/Components/Custom/IconButton";
import IntlFormatCurrency from "@/Components/Custom/IntlFormatCurrency";
import IntlFormatDate from "@/Components/Custom/IntlFormatDate";
import IntlFormatNumber from "@/Components/Custom/IntlFormatNumber";
import { visit } from "@/HTTPProvider";
import { AddShoppingCart, MoveUp, PostAdd } from "@mui/icons-material";
import { Box, Container } from "@mui/material";
import { Fragment } from "react";
import { FormattedDate } from "react-intl";

export default ({ data, module, ...props }) => {
    return (
        <Fragment>
      {/*       <Breadcrums
                links={[
                    { name: "dashboard", route: "dashboard" },
                    { name: "modules", route: "module.index" },
                    {
                        name: module.name,
                        route: "module.show",
                        id: module.id,
                        noTranslate:true
                    },
                    {
                        id: module.id,
                        name: "buys",
                        route: "module.buy.index",
                        noTranslate:true
                    },
                ]}
            /> */}

            <Table
                data={data}
                columns={[
                    { accessorKey: "created_at", header: "date" , 
                    Cell: ({ cell }) => (
                        <IntlFormatDate  value={cell.getValue()} />
                    ),},
                    {
                        accessorKey: "total_medicaments",
                        header: "totalMedicaments",
                    },
                    { accessorKey: "total_quantity", header: "totalQuantity" },
                    {
                        accessorKey: "total_price",
                        header: "totalPrice",
                        filterVariant: "range",
                        Cell: ({ cell }) => (
                            <IntlFormatCurrency value={cell.getValue()} />
                        ),
                    },
                ]}
            />
        </Fragment>
    );
};
