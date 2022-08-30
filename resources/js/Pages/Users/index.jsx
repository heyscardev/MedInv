import GenericCrud from "@/Components/Common/GenericCrud";
import EditModal from "@/Components/Layouts/Users/EditModal";
import { formatCiFromDataBase, formatDateFromDataBase, formatGenderFromDataBase } from "@/Utils/format";
import { PersonAdd } from "@mui/icons-material";
import { format } from "date-fns";
import { es } from "date-fns/locale";
import { Fragment, useEffect, useState } from "react";
const formatDataUser = (user) => {
  const birth_date = formatDateFromDataBase(user.birth_date);
  return {
    ...user,
    birth_date,
  };
};
export default (props) => {
  const [dataTable, setDataTable] = useState([]);
  useEffect(() => {
    setDataTable(props.data.map(formatDataUser));
  }, [props.data]);

  return (
    <Fragment>
      <GenericCrud
        data={dataTable}
        columnVisibility={{ id: false, last_name: false, phone: false, direction: false }}
        routeName="user"
        EditModal={EditModal}
        multiButtonActions={[
          {
            icon: <PersonAdd />,
            name: "crear",
          },
        ]}
      /*   columns={[
          {
            accessorKey: "id",
            header: "ID",
            enableColumnOrdering: false,
            enableEditing: false,
            size: 80,
          },
          {
            accessorKey: "first_name",
            header: "Nombre",
          },
          {
            accessorKey: "last_name",
            header: "Apellido",
          },
          {
            accessorKey: "email",
            header: "Correo",
          },
          {
            accessorKey: "c_i",
            header: "Cedula",
            accessorFn: ({ c_i }) => formatCiFromDataBase(c_i),
          },
          {
            accessorKey: "birth_date",
            header: "Fecha de Nacimiento",
            accessorFn: ({ birth_date }) => format(new Date(birth_date), "dd 	MMMM yyyy", { locale: es }),
          },
          {
            accessorKey: "gender",
            header: "Sexo",
            accessorFn: ({ gender }) => formatGenderFromDataBase(gender),
          },
          {
            accessorKey: "phone",
            header: "Telefono",
          },
          {
            accessorKey: "direction",
            header: "Direccion",
          },
          {
            accessorKey: "created_at",
            header: "Fecha de Creacion",
            accessorFn: ({ created_at }) =>
              !created_at ? "00/00/0000 00:00:00" : format(new Date(created_at), "hh:mm dd MMMM yyyy", { locale: es }),
          },
          {
            accessorKey: "updated_at",
            header: "Fecha de Ultima Modificacion",
            accessorFn: ({ updated_at }) => (!updated_at ? "00/00/0000 00:00:00" : updated_at),
          },
        ]} */
      />
    </Fragment>
  );
};
