import * as React from 'react';
import Button from '@mui/material/Button';
import Dialog from '@mui/material/Dialog';
import Slide from '@mui/material/Slide';
import { DialogActions, DialogContent, DialogContentText, DialogTitle } from '@mui/material';

const Transition = React.forwardRef(function Transition(props, ref) {
    return <Slide direction="up" ref={ref} {...props} />;
  });

export default ({open,onClose,message,onSubmit}) => {
  return (
    <Dialog
        open={open}
        maxWidth="sm"
        onClose={onClose}
        TransitionComponent={Transition}
      >
        
        <DialogTitle sx={{backgroundColor:"primary.dark",color:"primary.light"}} >Medinv-Confirmación</DialogTitle>
        <DialogContent>
          <DialogContentText sx={{margin:"40px 10px",textAlign:"center"}} >
            {message}
          </DialogContentText>
       
        </DialogContent>
        <DialogActions>
          <Button onClick={onClose} variant="outlined">Cerrar</Button>
          <Button onClick={onSubmit} color="error" variant="contained">Si!</Button>
        </DialogActions>
      </Dialog>
  );
}
