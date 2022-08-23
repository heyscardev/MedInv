import ConfirmModal from "@/Components/Common/ConfirmModal";
import MultiButton from "@/Components/Common/MultiButton";
import { destroy } from "@/HTTPProvider";
import { PersonAdd } from "@mui/icons-material";
import _ from "lodash";
import { Fragment, useState } from "react";
import Table from "./Table";

export default ({ columns, EditModal, routeName, data, columnVisibility ={}, multiButtonActions }) => {
  const [idToDelete, setIdToDelete] = useState(null);
  const toggleConfirmDelete = (id) => {
    setIdToDelete(id ? id : null);
  };

  const [idToEdit, setIdToEdit] = useState(null);
  const toggleEdit = (id) => {
    setIdToEdit(id ? id : null);
  };
  return (
    <Fragment>
      <Table
        initialState={{ columnVisibility }}
        onDelete={(id) => toggleConfirmDelete(id)}
        onEdit={(id) => toggleEdit(id)}
        data={data}
        columns={columns}
      />
      <MultiButton
        actions={[
          {
            icon: <PersonAdd />,
            name: "crear",
            onClick: (e) => {
              toggleEdit(-1);
            },
          },
        ]}
      />
      <ConfirmModal
        open={_.find(data, { id: idToDelete }) ? true : false}
        onClose={() => toggleConfirmDelete(null)}
        onSubmit={() => {
          destroy(route(routeName + ".destroy", idToDelete));
        }}
        message={
          _.find(data, { id: idToDelete })
            ? `¿Esta Seguro de Eliminar al Usuario: ${_.find(data, { id: idToDelete }).first_name} ${
                _.find(data, { id: idToDelete }).last_name
              }?`
            : null
        }
      />
      <EditModal
        open={idToEdit ? true : false}
        onClose={() => toggleEdit(null)}
        item={{ ..._.find(data, { id: idToEdit }) }}
      />
    </Fragment>
  );
};
