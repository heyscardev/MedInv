import GenericCrud from "@/Components/Common/GenericCrud";
import SectionTitle from "@/Components/Common/SectionTitle";
import EditModal from "@/Components/Layouts/MedicamentGroups/EditGroupModal";
import { formatCrtUpdtAt } from "@/Utils/format";
import { BookmarkAdd } from "@mui/icons-material";
import { Fragment } from "react";
import { useIntl } from "react-intl";

export default ({ data }) => {
  const {formatMessage} = useIntl();
  return (
    <Fragment>
      <SectionTitle title="medicamentGroups" />
      <GenericCrud
        data={data}
        columnVisibility={{}}
        routeName={route().current()}
        deleteKeyMessage={"name"}
        EditModal={EditModal}
        multiButtonActions={[
          {
            icon: <BookmarkAdd />,
            name: "create",
          },
        ]}
        columns={[
          {
            accessorKey: "id",
            header: "id",
            // header: formatMessage({id:"id"}),
            enableColumnOrdering: false,
            enableEditing: false,
            size: 80,
          },
          {
            accessorKey: "name",
            header: "name",
            // header: formatMessage({id:"name"}),
          },
          {
            accessorKey: "description",
            header: "description",
            // header: formatMessage({id:"description"}),
          },
          {
            accessorKey: "created_at",
            header: "created_at",
            // header: formatMessage({id:"created_at"}),
            accessorFn: ({ created_at }) => formatCrtUpdtAt(created_at),
          },
          {
            accessorKey: "updated_at",
            header: "updated_at",
            // header: formatMessage({id:"updated_at"}),
            accessorFn: ({ updated_at }) => formatCrtUpdtAt(updated_at),
          },
          ]}
      />
    </Fragment>
  );
};
