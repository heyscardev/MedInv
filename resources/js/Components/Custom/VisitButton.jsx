import { visit } from "@/HTTPProvider";
import { Button } from "@mui/material";
const handleClick = (e) => {
  e.preventDefault();
  visit(e.currentTarget.href);
};
export default ({ onClick = handleClick, ...props }) => (
  <Button
    {...props}
    onClick={(e) => {
      e.preventDefault();
      onClick(e);
    }}
  />
);
