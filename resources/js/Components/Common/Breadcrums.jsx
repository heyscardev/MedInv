import { visit } from "@/HTTPProvider";
import { NavigateNext } from "@mui/icons-material";
import { Breadcrumbs, Link, Typography, Container } from "@mui/material";
import { useIntl } from "react-intl";

const handdleClick = (e) => {
    e.preventDefault();
    visit(e.target.href);
};
export default ({ links }) => {
    const {formatMessage} = useIntl();
    return (
        <Breadcrumbs
            color="primary"
            separator={<NavigateNext fontSize="small" />}
            aria-label="breadcrumb"
            sx={{ marginTop: 3, marginBottom: 3, marginLeft:2 }}
        >
            {links.map(({route:routeHref,item,name,id,noTranslate,...rest}) => (
                <Link
                {...rest}
                    underline="hover"
                    key="1"
                    color="inherit"
                    href={
                        id ? route(routeHref, id) : route(routeHref)
                    }
                    onClick={handdleClick}
                >
                    {noTranslate?name:formatMessage({id:name})}
                </Link>
            ))}
        </Breadcrumbs>
    );
};
