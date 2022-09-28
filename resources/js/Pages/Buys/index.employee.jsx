import Breadcrums from "@/Components/Common/Breadcrums"
import { Fragment } from "react"
import { useIntl } from "react-intl";

export default (props)=>{
const {formatMessage} = useIntl();
    return (
        <Fragment>
        <Breadcrums
            links={[
                { name: "Dashboard", route: "dashboard" },
                {
                    name: formatMessage({id:'buys'}),
                    route: "buy.index",
                },
            ]}
        />
        </Fragment>
    )

}