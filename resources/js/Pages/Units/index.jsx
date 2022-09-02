import GenericCrud from "@/Components/Common/GenericCrud";
import EditModal from "@/Components/Layouts/Units/EditModal";
import { formatCrtUpdtAt } from "@/Utils/format";
import { generatorTableColumns } from "@/Utils/generators";
import { PersonAdd } from "@mui/icons-material";
import { Fragment } from "react";
import { useIntl } from "react-intl";

export default (props) => {
  const {formatMessage} = useIntl();
  return (
    <Fragment>
      <GenericCrud
        data={props.data}
        columnVisibility={{}}
        routeName="unit"
        deleteKeyMessage={"name"}
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
            header: formatMessage({id:"id"}),
            enableColumnOrdering: false,
            enableEditing: false,
            size: 80,
          },
          {
            accessorKey: "name",
            header: formatMessage({id:"name"}),
          },
          {
            accessorKey: "description",
            header: formatMessage({id:"description"}),
          },
          {
            accessorKey: "created_at",
            header: formatMessage({id:"created_at"}),
            accessorFn: ({ created_at }) => formatCrtUpdtAt(created_at),
          },
          {
            accessorKey: "updated_at",
            header: formatMessage({id:"updated_at"}),
            accessorFn: ({ updated_at }) => formatCrtUpdtAt(updated_at),
          },
          ]}
      />
    </Fragment>
  );
};
