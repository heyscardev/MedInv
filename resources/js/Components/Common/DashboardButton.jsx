import VisitButton from "@/Components/Custom/VisitButton";
import { Store, ViewModule } from "@mui/icons-material";
import { Box, Button, Paper, Typography, useTheme } from "@mui/material";
import { useIntl } from "react-intl";



export default ({
    name = "start",
    route = "/",
    Icon = ViewModule,
    image,
    subtitle,
    outlined,
    ...rest
}) => {
    const { palette } = useTheme();
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
                    ...(image?
                        {
                            background: `${palette.gradientTransparent.black50},url(${image})`,
                            backgroundSize: "cover",
                            // backgroundAttachment: "fixed",
                        }:{}
                    ),
                }}
                fullWidth
                {...rest}
            >

                <Box
                    sx={{
                        bgcolor: "background.default",
                        display: "flex",
                        flexDirection: "column",
                        alignSelf: "flex-end",
                        backgroundColor: "transparent",
                        gap: 2,
                    }}
                >
                    {/* {<Icon color={tema.icon} fontSize="large" />} */}
                    <Typography
                        variant="subtitle1"
                        color={tema.text}
                        fontWeight="bold"
                        paddingBottom={1}
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
