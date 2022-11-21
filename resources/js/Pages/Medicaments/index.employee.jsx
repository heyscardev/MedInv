import AsyncTable from "@/Components/Common/AsyncTable";
import IntlFormatCurrency from "@/Components/Custom/IntlFormatCurrency";
import IntlFormatNumber from "@/Components/Custom/IntlFormatNumber";
import { Box } from "@mui/material";
import { Fragment } from "react";

export default (props) => {
  return (
    <Fragment>
      <AsyncTable
        routeName="medicament.index"
        routeParams={{ }}
       // onAsync={tableUpdate}
        data={props.data}
        columns={[
          { accessorKey: "id", header: "id" },
          { accessorKey: "name", header: "name" },
           {
            accessorKey: "price_sale",
            header: "price",
            filterVariant: "range",
            Cell: ({ cell }) => <IntlFormatCurrency value={cell.getValue()} />,
          },
        /*

          {
            accessorKey: "quantity_exist",
            header: "inventory",
            filterVariant: "range",
            Cell: ({ cell }) => (
              <Box
                sx={(theme) => ({
                  backgroundColor:
                    cell.getValue() < 10
                      ? theme.palette.error.main
                      : cell.getValue() >= 10 && cell.getValue() < 500
                      ? theme.palette.primary.main
                      : theme.palette.primary.dark,
                  borderRadius: "0.25rem",
                  color: "#fff",
                  p: "0.25rem",
                  textAlign: "right",
                })}
              >
                <IntlFormatNumber value={cell.getValue()} />
              </Box>
            ),
          },

          {
            accessorKey: "pivot.updated_at",
            header: "updated_at",

          }, */
          {

            enableColumnFilter:false,
            accessorKey: "quantity_global",
            header: "globalInventory",
            filterVariant: "range",
            Cell: ({ cell }) => (
              <Box
                sx={(theme) => ({
                  backgroundColor:
                    cell.getValue() < 100
                      ? theme.palette.error.main
                      : cell.getValue() >= 100 && cell.getValue() < 1000
                      ? theme.palette.primary.main
                      : theme.palette.primary.dark,
                  borderRadius: "0.25rem",
                  color: "#fff",
                  p: "0.25rem",
                  textAlign: "right",
                })}
              >
                <IntlFormatNumber value={cell.getValue()} />
              </Box>
            ),
          },
        ]}
      />
    </Fragment>
  );
};
