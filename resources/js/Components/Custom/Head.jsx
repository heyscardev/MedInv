import { Head } from "@inertiajs/inertia-react";
import { format } from "date-fns";
import { useIntl } from "react-intl"

export default ({title,key,...props})=>{
    const {formatMessage} = useIntl();
    return <Head title={formatMessage({id:title})} {...{key,...props}}/>
}