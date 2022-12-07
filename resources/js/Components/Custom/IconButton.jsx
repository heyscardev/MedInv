import { PropaneSharp } from "@mui/icons-material";
import { IconButton } from "@mui/material";
import { useIntl } from "react-intl";
import Tooltip from "./Tooltip";

export default ({title,placement,arrow=false,onClick,...rest}) => {
    const { formatMessage } = useIntl();
    return title ? (
        <Tooltip title={title} placement={placement} arrow={arrow} >
            <IconButton onClick={onClick}{...rest} title={null} />
        </Tooltip>
    ) : (
        <IconButton onClick={onClick} {...rest}  />
    );
};
