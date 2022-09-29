import AsyncTable from "@/Components/Common/AsyncTable";
import Breadcrums from "@/Components/Common/Breadcrums";
import Table from "@/Components/Common/Table";
import IconButton from "@/Components/Custom/IconButton";
import IntlFormatCurrency from "@/Components/Custom/IntlFormatCurrency";
import IntlFormatNumber from "@/Components/Custom/IntlFormatNumber";
import { visit } from "@/HTTPProvider";
import { AddShoppingCart, MoveUp, PostAdd, ShoppingCart } from "@mui/icons-material";
import { Box, Container } from "@mui/material";
import { Fragment } from "react";

export default (props) => {
    return (
        <Fragment>
            <Breadcrums
                links={[
                    { name: "dashboard", route: "dashboard" },
                    { name: "modules", route: "module.index" },
                    {
                        noTranslate:true,
                        name: props.module.name,
                        route: "module.show",
                        id: props.module.id,
                    },
                ]}
            />
            <Container
                sx={{ padding: 2, display: "flex", justifyContent: "center" }}
            >
                <IconButton color="primary" title="transferMedications">
                    <MoveUp size="large" />
                </IconButton>
                <IconButton color="primary" title="newRecipe">
                    <PostAdd size="large" />
                </IconButton>
                <IconButton
                    color="primary"
                    title="buyMedicaments"
                    onClick={() => {
                        visit(
                            route("module.buy.create", {
                                id: props.module.id,
                            })
                        );
                    }}
                >
                    <AddShoppingCart size="large" />
                </IconButton>
                <IconButton
                    color="primary"
                    title="showBuys"
                    onClick={() => {
                        visit(
                            route("module.buy.index", {
                                id: props.module.id,
                            })
                        );
                    }}
                >
                    <ShoppingCart size="large" />
                </IconButton>
            </Container>
            <AsyncTable
                data={props.data}
                columns={[
                    { accessorKey: "code", header: "code" },
                    { accessorKey: "name", header: "name" },
                    {
                        accessorKey: "unit.name",
                        header: "unit",
                    },
                    {
                        accessorKey: "price_sale",
                        header: "price",
                        filterVariant: "range",
                        Cell: ({ cell }) => (
                            <IntlFormatCurrency value={cell.getValue()} />
                        ),
                    },
                    {
                        accessorKey: "pivot.quantity_exist",
                        header: "inventory",
                        filterVariant: "range",
                        Cell: ({ cell }) => (
                            <Box
                                sx={(theme) => ({
                                    backgroundColor:
                                        cell.getValue() < 10
                                            ? theme.palette.error.main
                                            : cell.getValue() >= 10 &&
                                              cell.getValue() < 500
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
                        accessorKey: "quantity_global",
                        header: "globalInventory",
                        filterVariant: "range",
                        Cell: ({ cell }) => (
                            <Box
                                sx={(theme) => ({
                                    backgroundColor:
                                        cell.getValue() < 100
                                            ? theme.palette.error.main
                                            : cell.getValue() >= 100 &&
                                              cell.getValue() < 1000
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
