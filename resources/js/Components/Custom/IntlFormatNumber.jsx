import { FormattedNumber, useIntl } from "react-intl"

export default ({value = 0,...rest})=>{

    return (<FormattedNumber
        {...{value,...rest}}
        />)

}
