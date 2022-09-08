import { visit } from "@/HTTPProvider";
import { NavigateNext } from "@mui/icons-material";
import { Breadcrumbs, Link, Typography, Container } from "@mui/material";

const handdleClick = (e) => {
    e.preventDefault();
    visit(e.target.href);
};
export default ({ links }) => {
    return (
        <Breadcrumbs
            color="primary"
            separator={<NavigateNext fontSize="small" />}
            aria-label="breadcrumb"
            sx={{ marginTop: 3, marginBottom: 3 }}
        >
            {links.map((item) => (
                <Link
                    underline="hover"
                    key="1"
                    color="inherit"
                    href={
                        item.id ? route(item.route, item.id) : route(item.route)
                    }
                    onClick={handdleClick}
                >
                    {item.name}
                </Link>
            ))}
        </Breadcrumbs>
    );
};
