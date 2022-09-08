import { Tooltip } from "@mui/material";

export default (props) => (
    <Tooltip
        placement="bottom"
        enterDelay={500}
        PopperProps={{
            sx: {
                "& .MuiTooltip-tooltip": {
                    border: "solid white 1px",
                    backgroundColor:"primary.dark",
                    color: "white.main",
                    fontSize:10
                },
            },
        }}
        {...props}
    />
);
