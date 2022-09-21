import Table from "@/Components/Common/Table";
import { Container, Tooltip } from "@mui/material";
import { AddBox, AddShoppingCart, MoveUp, PostAdd } from "@mui/icons-material";
import IconButton from "@/Components/Custom/IconButton";
import { Fragment, useState } from "react";
import Breadcrums from "@/Components/Common/Breadcrums";
import { InertiaApp } from '@inertiajs/inertia-react'
import Modal from "@/Components/Common/Modal";
import ModalBuyMedicament from "@/Components/Layouts/Modules/ModalBuyMedicament";
import { get, visit } from "@/HTTPProvider";

export default (props) => {
    return (
        <Fragment>
            <Breadcrums links={[
                { name: "Dashboard", route: "dashboard" },
                { name: "Modulos", route: "module.index" },
                { name: props.module.name, route: "module.show", id: props.module.id }
            ]} />
            <Container
                sx={{ padding: 2, display: "flex", justifyContent: "center" }}
            >
                <IconButton color="primary" title="transferMedications">
                    <MoveUp size="large" />
                </IconButton>
                <IconButton color="primary" title="newRecipe">
                    <PostAdd size="large" />
                </IconButton>
                <IconButton color="primary" title="buyMedicaments" onClick={() => { visit(route("module.buy",props.module.id)) }}>
                    <AddShoppingCart size="large"  />
                </IconButton>
            </Container>
            <Table
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
                        Cell: ({ cell }) => cell.getValue() + " Bs.D",
                    },
                    {
                        accessorKey: "pivot.quantity_exist",
                        header: "inventory",
                    },
                    {
                        accessorKey: "quantity_global",
                        header: "globalInventory",
                    },
                ]}
            />
        </Fragment>
    );
};
