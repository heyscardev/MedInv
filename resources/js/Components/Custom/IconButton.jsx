import { PropaneSharp } from "@mui/icons-material";
import { IconButton } from "@mui/material";
import { useIntl } from "react-intl";
import Tooltip from "./Tooltip";

export default (props) => {
    const { formatMessage } = useIntl();
    return props.title ? (
        <Tooltip title={formatMessage({ id: props.title })}>
            <IconButton {...props} title={null} />
        </Tooltip>
    ) : (
        <IconButton {...props}  />
    );
};
