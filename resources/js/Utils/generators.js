import { format } from "date-fns";
import es from "date-fns/locale/es";
import { useIntl } from "react-intl";

const generatorTableColumns = (data, excludes = { email_verified_at: true }) => {
  const { formatMessage } = useIntl();
  const columns = [];

  if (data && data[0]) {
   
    for (const key in data[0]) {
      if (excludes[key] === true) continue;
      switch (key) {
        case "id":
          columns.push({
            accessorKey: key,
            header: formatMessage({ id: key }),
            enableColumnOrdering: false,
            enableEditing: false,
            size: 80,
          });
          break;
          case "created_at":
            case "updated_at":
           columns.push(    {
            accessorKey: key,
            header: key,
            accessorFn: (col) => (!col[key] ? "00/00/0000 00:00:00" : format(new Date(col[key]),"hh:mm dd MMMM yyyy",{locale:es})),
          },)   
            break;
        default:
          columns.push({
            accessorKey: key,
            header: formatMessage({ id: key }),
          });
          break;
      }
    }
  }

  return columns;
};

/* columns={[
    {
      accessorKey: "id",
      header: "ID",
      enableColumnOrdering: false,
      enableEditing: false,
      size: 80,
    },
    {
      accessorKey: "name",
      header: "Nombre",
    },
    {
      accessorKey: "description",
      header: "Descripción",
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
  ]} */

export { generatorTableColumns };
