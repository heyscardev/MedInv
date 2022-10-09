import IconButton from "@/Components/Custom/IconButton";
import { visit } from "@/HTTPProvider";
import { Delete, MoveUp } from "@mui/icons-material";
import { Button } from "@mui/material";

export default (module)=>({ table }) => {
    const handleTransferMedicaments = () => {
      const rows= table.getSelectedRowModel().flatRows.map((row) => {
       return row.original.id;
      });
      visit(route('transfer.create',{module:module.id,selected_medicaments:rows}))
    };

    const handleActivate = () => {
      table.getSelectedRowModel().flatRows.map((row) => {
        alert('activating ' + row.getValue('name'));
      });
    };

    const handleContact = () => {
      table.getSelectedRowModel().flatRows.map((row) => {
        alert('contact ' + row.getValue('name'));
      });
    };

    return table.getSelectedRowModel().flatRows.length !== 0?(
      <div style={{ display: 'flex', gap: '0.5rem' }}>
       <IconButton
       title="transferSelectedMedicaments"
          onClick={handleTransferMedicaments}
          disabled={table.getSelectedRowModel().flatRows.length === 0}
          color="primary"
        >
          <MoveUp  />
        </IconButton>

      </div>
    ):null;
  }
