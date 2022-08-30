import GenericCrud from "@/Components/Common/GenericCrud";
import EditModal from "@/Components/Layouts/Users/EditModal";
import { generatorTableColumns } from "@/Utils/generators";
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
        columns={generatorTableColumns(props.data)}
      />
    </Fragment>
  );
};
