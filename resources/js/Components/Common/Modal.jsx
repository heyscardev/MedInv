import { Dialog, DialogContent, DialogTitle, Typography, useTheme } from "@mui/material";
import LogoTypography from "../LogoTypography";
import IntlMessage from "./IntlMessage";

export default ({
  open,
  onClose,
  containerProps,
  fullWidth = true,
  maxWidth = "sm",
  children,
  headerMedinv = false,
  subtitle ="empty"
}) => {
  const { primary } = useTheme().palette;
  return (
    <Dialog open={open} onClose={onClose} fullWidth={fullWidth} maxWidth={maxWidth}>
      {headerMedinv && (
        <DialogTitle>
          <div style={{ textAlign: "center" }}>
            <LogoTypography />
            <Typography variant="h5" color="secondary.dark">
                <IntlMessage  id={subtitle}/>
            </Typography>
          </div>
        </DialogTitle>
      )}
      <DialogContent sx={{ borderTop: `10px solid ${primary.main}`, ...containerProps }} children={children} />
    </Dialog>
  );
};
