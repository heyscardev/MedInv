import IntlMessage from "@/Components/Common/IntlMessage";
import VisitButton from "@/Components/Custom/VisitButton";
import { Store } from "@mui/icons-material";
import { Box, Button, Paper, Stack, Typography } from "@mui/material";

export default ({ module, onClick, disabled, withUser = false }) => {
  return module ? (
    <Paper
      color="primary "
      variant="outlined"
      sx={{
        transition: ".2s transform ease-in-out",
        ":hover": {
          transform: !disabled ? "scale(1.05)" : "",
        },
      }}
      square
    >
      <VisitButton
        variant="outlined"
        disabled={disabled}
        color="primary"
        href={module ? route("module.show", module.id) : ""}
        sx={{ padding: 0, display: "flex", justifyContent: "start" }}
        onClick={onClick}
        fullWidth
      >
        <div style={{ width: "100%", display: "flex", justifyContent: "flex-start" }}>
          <Box
            sx={{
              bgcolor: "background.default",
              display: "flex",
              alignItems: "center",
              textAlign: "center",
              padding: 2,
              backgroundColor: "primary.dark",
            }}
          >
            <Typography
              sx={{
                writingMode: "vertical-rl",
              }}
              color="secondary"
              variant="subtitle1"
              children="Modulo"
            />
          </Box>
          <Box
            sx={{
              p: 2,
              bgcolor: "background.default",
              display: "flex",
              flexDirection: "column",
              alignItems: "center",
              backgroundColor: "transparent",
              gap: 2,
              margin: "auto",
            }}
          >
            <Store fontSize="large" />
            <Typography variant="subtitle1" children={module.name} />

            {withUser && (
              <Typography variant="body2" color="error">
                <IntlMessage id="responsible" />: {module.user.first_name}
              </Typography>
            )}
          </Box>
        </div>
      </VisitButton>
    </Paper>
  ) : (
    <Paper
      color="primary "
      variant="outlined"
      sx={{
        transition: ".2s transform ease-in-out",
        ":hover": {
          transform: "scale(1.05)",
        },
      }}
      square
    >
      {" "}
      <VisitButton
        variant="outlined"
        color="error"
        sx={{ padding: 0, display: "flex", justifyContent: "start" }}
        onClick={onClick}
        fullWidth
      >
        <div style={{ width: "100%", display: "flex", justifyContent: "flex-start" }}>
          <Box
            sx={{
              bgcolor: "error.main",
              display: "flex",
              alignItems: "center",
              textAlign: "center",
              padding: 2,
            }}
          >
            <Typography
              sx={{
                writingMode: "vertical-rl",
              }}
              color="secondary"
              variant="subtitle1"
              children="Modulo"
            />
          </Box>
          <Box
            sx={{
              p: 2,
              bgcolor: "background.default",
              display: "flex",
              flexDirection: "column",
              alignItems: "center",
              backgroundColor: "transparent",
              gap: 2,
              margin: "auto",
            }}
          >
            <Store fontSize="large" />
            <Typography variant="subtitle1" children={<IntlMessage id="noModule" />} />
          </Box>
        </div>
      </VisitButton>
    </Paper>
  );
};
