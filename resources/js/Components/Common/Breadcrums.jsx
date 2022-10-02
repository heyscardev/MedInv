import { visit } from "@/HTTPProvider";
import { NavigateNext } from "@mui/icons-material";
import { Breadcrumbs, Link } from "@mui/material";
import { useIntl } from "react-intl";

const visitPage =(route)=> (e) => {
  e.preventDefault();
  visit(route);
};
export default ({ links }) => {
  const { formatMessage } = useIntl();
  return (
    <Breadcrumbs
      color="primary"
      separator={<NavigateNext fontSize="small" />}
      aria-label="breadcrumb"
      sx={{ marginTop: 3, marginBottom: 3, marginLeft: 2 }}
    >
      {links.map(({ item, name, id, noTranslate, ...rest }) => (
        <Link
          {...rest}
          underline="hover"
          key="1"
          color="inherit"
          onClick={visitPage(id ? route(rest.route, id) : route(rest.route))}
        >
          {noTranslate ? name : formatMessage({ id: name })}
        </Link>
      ))}
    </Breadcrumbs>
  );
};
