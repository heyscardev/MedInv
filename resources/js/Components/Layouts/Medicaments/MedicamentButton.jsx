import IntlFormatCurrency from "@/Components/Custom/IntlFormatCurrency";
import VisitButton from "@/Components/Custom/VisitButton";
import { Medication, Store } from "@mui/icons-material";
import { Box, Button, Paper, Typography } from "@mui/material";
import { useIntl } from "react-intl";

export default ({ medicament }) => {
    const { formatMessage } = useIntl();
    return (
        <Paper
            color="primary "
            variant="outlined"
            sx={{
                transition: ".2s ease-in-out",
                ":hover": {
                    transform: "scale(1.05)",
                },
            }}
            square
        >
            <VisitButton
                variant="outlined"
                color="primary"
                fullWidth
                sx={{
                    minHeight: "150px",
                    ":hover": {
                        backgroundColor: "primary.dark",
                        color: "white.main",
                    },
                }}
            >
                <Box
                    sx={{
                        bgcolor: "background.default",
                        display: "flex",
                        alignItems: "center",
                        justifyContent: "center",
                        flexDirection: "column",
                        position: "absolute",
                        top: 0,
                        left: 0,
                        bottom: 0,
                        backgroundColor: "primary.dark",
                        width: "120px",
                        gridTemplateColumns: { md: "1fr 1fr" },
                    }}
                >
                    <Medication fontSize="large" color="white" />
                    <Typography
                        variant="body2"
                        textAlign="right"
                        color="white.main"
                        children={formatMessage({ id: "medicament" })}
                    />
                </Box>

                <Box
                    sx={{
                        marginLeft: "120px",
                        bgcolor: "Background.default",
                        display: "flex",
                        flexDirection: "column",
                        backgroundColor: "transparent",
                        gap: 1,
                        width: "100%",
                        height: "100%",
                    }}
                >
                    <Typography
                        variant="body"
                        textAlign="right"
                        children={medicament.code}
                        sx={{
                            position: "absolute",
                            top: 0,
                            bottom: 0,
                            left: "0",
                            textAlign:"center",
                            writingMode:"vertical-lr",
                            marginLeft: "120px",
                        }}
                    />
                    <Typography
                        variant="h5"
                        textAlign="right"
                        children={medicament.name}
                    />
                    <Typography
                        variant="h6"
                        textAlign="right"
                        children={medicament.unit.name}
                    />
                    <Box>
                        <Typography
                            variant="body"
                            textAlign="right"
                            color="error.main"
                            children={
                                formatMessage({ id: "quantityGlobal" }) +
                                `: ${medicament.quantity_global}`
                            }
                        />
                          <Typography
                            variant="h4"
                            textAlign="right"
                            color="secondary.dark"
                            children={
                                 <IntlFormatCurrency value={medicament.price_sale} />}
                            
                        />
                    </Box>
                </Box>
            </VisitButton>
        </Paper>
    );
};
