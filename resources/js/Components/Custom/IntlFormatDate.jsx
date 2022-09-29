import { format } from "date-fns";
import { es } from "date-fns/locale";
import { FormattedDate } from "react-intl";

export default ({ value }) => {
    return format(new Date(value), "dd/MMMM/yyyy hh:mm:aa", { locale: es });
};
