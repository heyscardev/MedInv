import { visit } from "@/HTTPProvider";
import { Button } from "@mui/material";
const handleClick = (e) => {
    e.preventDefault();
    visit(e.currentTarget.href);
}
export default (props) => <Button {...props} onClick={handleClick} />