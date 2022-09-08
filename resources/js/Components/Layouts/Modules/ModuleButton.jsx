
import VisitButton from "@/Components/Custom/VisitButton"
import { Store } from "@mui/icons-material"
import { Box, Button, Paper, Typography } from "@mui/material"

export default ({ module }) => {

    return (
        <Paper color="primary " variant="outlined" sx={{
            transition:".2s transform ease-in-out",
            ':hover': {
                transform: "scale(1.05)"
            }
        }} square >
            <VisitButton variant="outlined" color="primary" href={route('module.show',module.id)} fullWidth >
                <Box
                    sx={{
                        bgcolor: 'background.default',
                        display: 'flex',
                        alignItems: "center",
                        position: 'absolute',
                        top: 0,
                        left: 0,
                        bottom: 0,
                        backgroundColor: "primary.dark",
                        width: "100px",
                        gridTemplateColumns: { md: '1fr 1fr' },
                    }}
                >
                    <Typography sx={{
                        transform: "rotate(-90deg)"
                    }} color="secondary" variant="subtitle1" children="Modulo" />
                </Box>
                <Box
                    sx={{
                        marginLeft: "100px",
                        p: 2,
                        bgcolor: 'background.default',
                        display: 'flex',
                        flexDirection: "column",
                        alignItems: "center",
                        backgroundColor: "transparent",
                        gridTemplateColumns: { md: '1fr 1fr' },
                        gap: 2,
                    }}
                >
                    <Store fontSize="large" />
                    <Typography variant="subtitle1" children={module.name} />
                </Box>

            </VisitButton>
        </Paper>
    )

}