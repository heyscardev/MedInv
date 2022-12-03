import { PropaneSharp } from "@mui/icons-material";
import { IconButton } from "@mui/material";
import { useIntl } from "react-intl";
import Tooltip from "./Tooltip";

export default ({title,placement,onClick,...rest}) => {
    const { formatMessage } = useIntl();
    return title ? (
        <Tooltip title={title} placement={placement} >
            <IconButton onClick={onClick}{...rest} title={null} />
        </Tooltip>
    ) : (
        <IconButton onClick={onClick} {...rest}  />
    );
};
