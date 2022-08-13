import {
    Dialog,
    DialogContent,
    useTheme,
  } from "@mui/material";

  
  export default ({ open, onClose, containerProps, fullWidth = true ,children}) => {
    const { primary } = useTheme().palette;
    return (
      <Dialog open={open} onClose={onClose} fullWidth={fullWidth}   >
        <DialogContent  sx={{borderTop:`10px solid ${primary.main}`,...containerProps}} children={children} />
      </Dialog>
    );
  };
  