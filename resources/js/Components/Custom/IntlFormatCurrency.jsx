import { FormattedNumber, useIntl } from "react-intl";
import IntlMessage from "../Common/IntlMessage";

export default ({value,minimumFractionDigits,maximumFractionDigits}) => {
    const {formatMessage} = useIntl();
    return(
    <FormattedNumber
        value={value || 0}
        style="currency"
        currency={formatMessage({id:'formatCurrency'})}
        minimumFractionDigits={minimumFractionDigits || 2}
        maximumFractionDigits={maximumFractionDigits || 2}

    />
)};
