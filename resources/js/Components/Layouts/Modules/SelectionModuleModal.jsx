import Modal from "@/Components/Common/Modal";
import { Grid } from "@mui/material";
import ModuleButton from "./ModuleButton";
export default ({
  modules = [],
  open,
  onClose,
  moduleSelected,
  moduleDisableds = [],
  label,
  onSelect = (module) => {},
}) => {
  return (
    <Modal {...{ open, onClose, maxWidth: "xl" }} headerMedinv subtitle={label || "selectModule"}>
      <Grid container spacing={2} justifyContent="center" marginTop={2}>
        {modules.map((module) => (
          <Grid key={module.id} item xs={12} sm={10} md={6} lg={4}>
            <ModuleButton
              module={module}
              disabled={(moduleSelected && moduleSelected.id === module.id) || !!_.find(moduleDisableds, { id: module.id })}
              withUser={!!module.user}
              onClick={(e) => {
                onClose();
                onSelect(module);
              }}
            />
          </Grid>
        ))}
      </Grid>
    </Modal>
  );
};
