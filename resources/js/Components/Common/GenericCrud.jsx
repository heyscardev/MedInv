import ConfirmModal from "@/Components/Common/ConfirmModal";
import MultiButton from "@/Components/Common/MultiButton";
import { destroy } from "@/HTTPProvider";
import { generatorTableColumns } from "@/Utils/generators";
import { DataSaverOn, PersonAdd } from "@mui/icons-material";
import _ from "lodash";
import { Fragment, useEffect, useState } from "react";
import { useIntl } from "react-intl";
import Table from "./Table";

export default ({ columns, EditModal,actions=["create","update","delete"], routeName, data, columnVisibility = {}, multiButtonActions, deleteKeyMessage }) => {
  const { formatMessage } = useIntl();
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
      actions={actions}
        initialState={{ columnVisibility }}
        onDelete={(id) => toggleConfirmDelete(id)}
        onEdit={(id) => toggleEdit(id)}
        data={data}
        columns={columns ? columns : generatorTableColumns(data)}
      />
      <MultiButton
        actions={[
          {
            icon: <DataSaverOn />,
            name: 'create',
            onClick: (e) => {
              toggleEdit(-1);
            },
          },
        ]}
        // actions={ multiButtonActions }
      />

      <ConfirmModal
        open={_.find(data, { id: idToDelete }) ? true : false}
        onClose={() => toggleConfirmDelete(null)}
        onSubmit={() => {
          destroy(route(routeName + ".destroy", idToDelete));
        }}
        message={
          _.find(data, { id: idToDelete })
            ? formatMessage({ id: "deleteMessage" }, { value: _.find(data, { id: idToDelete })[deleteKeyMessage ? deleteKeyMessage : 'id'] })
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
