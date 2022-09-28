import VisitButton from "@/Components/Custom/VisitButton";
import { Store, ViewModule } from "@mui/icons-material";
import { Box, Button, Paper, Typography } from "@mui/material";
import { useIntl } from "react-intl";

export default ({
    name = "start",
    route = "/",
    Icon = ViewModule,
    subtitle,
    outlined,
    ...rest
}) => {
    const { formatMessage } = useIntl();
    const tema = outlined ? {text:"primary.main",icon:"primary" ,variant:"outlined"}:{text:"white.main",icon:"white",variant:"contained"};
    return (

            <VisitButton
                variant={tema.variant}
                color="primary"
                href={route}
                sx={{
                    position: "relative",
                    width: "100%",
                    "::after": {
                        content: '""',
                        display: "block",
                        paddingBottom: "100%",
                    },
                    transition: ".2s transform ease-in-out",
                    ":hover": {
                        transform: "scale(1.05)",
                    },
                }}
                fullWidth
                {...rest}
            >
                <Box
                    sx={{
                        bgcolor: "background.default",
                        display: "flex",
                        flexDirection: "column",
                        alignItems: "center",
                        backgroundColor: "transparent",
                        gap: 2,
                    }}
                >
                    {<Icon color={tema.icon} fontSize="large" />}
                    <Typography
                        variant="subtitle1"
                        color={tema.text}
                        children={formatMessage({ id: name })}
                    />
                    {subtitle && (
                        <Typography
                            color={tema.text}
                            variant="subtitle"
                            children={formatMessage({ id: subtitle })}
                        />
                    )}
                </Box>
            </VisitButton>
    );
};
