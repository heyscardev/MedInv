import Breadcrums from "@/Components/Common/Breadcrums";
import GenericCrud from "@/Components/Common/GenericCrud";
import SearchInput from "@/Components/Common/SearchInput";
import MedicamentButton from "@/Components/Layouts/Medicaments/MedicamentButton";
import EditModal from "@/Components/Layouts/Users/EditModal";
import { visit } from "@/HTTPProvider";
import { PersonAdd } from "@mui/icons-material";
import { Autocomplete, Grid } from "@mui/material";
import { Fragment, useState } from "react";
import { useIntl } from "react-intl";

export default ({ data, ...props }) => {
    const { formatMessage } = useIntl();

    return (
        <Fragment>
            <Breadcrums
                links={[
                    { name: "Dashboard", route: "dashboard" },
                    {
                        name: formatMessage({ id: "medicaments" }),
                        route: "medicament.index",
                    },
                ]}
            />

            <Grid container padding={2} spacing={2}>
                <Grid item xs={12}>
                    <SearchInput
                        onSubmit={(search) =>
                            visit(
                                route(
                                    "medicament.index",
                                    { search },
                                    { only: ["data"] }
                                )
                            )
                        }
                    />
                </Grid>
                {data.map((medicament) => (
                    <Grid key={medicament.id} item sx={12} sm={6} xl={4}>
                        <MedicamentButton medicament={medicament} />
                    </Grid>
                ))}
            </Grid>
            {/*  <GenericCrud
        data={props.data}
        columnVisibility={{}}
        routeName="medicament"
        EditModal={EditModal}
        multiButtonActions={[
          {
            icon: <PersonAdd />,
            name: "crear",
          },
        ]}
        columns={[
          {
            accessorKey: "id",
            header: "ID",
            enableColumnOrdering: false,
            enableEditing: false,
            size: 80,
          },
          {
            accessorKey: "code",
            header: "Codigo",
          },
          {
            accessorKey: "name",
            header: "Nombre",
          },
          {
            accessorKey: "price_sale",
            header: "Precio de venta",
          },
          {
            accessorKey: "quantity_exist",
            header: "Cantidad Existente",
          },
          {
            accessorKey: "created_at",
            header: "Fecha de Creacion",
            accessorFn: ({ created_at }) => (!created_at ? "00/00/0000 00:00:00" : created_at),
          },
          {
            accessorKey: "updated_at",
            header: "Fecha de Ultima Modificacion",
            accessorFn: ({ updated_at }) => (!updated_at ? "00/00/0000 00:00:00" : updated_at),
          },
        ]}
      /> */}
        </Fragment>
    );
};
