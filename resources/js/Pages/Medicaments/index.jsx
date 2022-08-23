import GenericCrud from "@/Components/Common/GenericCrud";
import EditModal from "@/Components/Layouts/Users/EditModal";
import { PersonAdd } from "@mui/icons-material";
import { Fragment } from "react";

export default (props) => {
  return (
    <Fragment>
      <GenericCrud
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
      />
    </Fragment>
  );
};
