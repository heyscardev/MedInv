import Modal from "@/Components/Common/Modal";
import LogoTypography from "@/Components/LogoTypography";
import { Cancel } from "@mui/icons-material";
import { Button, DialogActions, Typography } from "@mui/material";

export default ({ open, onClose, item = [] }) => {

    const action = item.log_type ?? '';
    const entity = item.table_name ?? '';
    const data   = item.json_data ?? [];
        console.log(data);
    return (
        <Modal {...{ open, onClose }}>
            <div style={{ textAlign: "center" }}>
                <LogoTypography />
                <Typography variant="h5" color="primary">
                    { action } { entity ? `[ ${entity} ]` : `` }
                </Typography>
            </div>

            <Typography variant="h6" color="secondary.dark">
                <div> {JSON.stringify(data)} </div>

                <ul>
                    {/* {!data ? "loading..." : data.map((value, index) => (
                        <li key={index}>{value}</li>
                    ))} */}

                    {/* {
                        data.map((e, i) => {
                            <li key={i}> xxx </li>
                        })
                    } */}
                </ul>

            </Typography>

            <DialogActions
                sx={{
                    display: "flex",
                    justifyContent: "center",
                }}
            >
                <Button
                    startIcon={<Cancel />}
                    onClick={onClose}
                    variant="contained"
                    color="error"
                    sx={{ color: "#fff" }}
                >
                    cerrar
                </Button>
            </DialogActions>
        </Modal>
    );
};
