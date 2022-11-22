import { Tooltip } from '@mui/material'
import { useIntl } from 'react-intl'

export default ({ title, ...props }) => {
  const { formatMessage } = useIntl()
  return (
    <Tooltip
      placement="bottom"
      enterDelay={500}
      PopperProps={{
        sx: {
          '& .MuiTooltip-tooltip': {
            border: 'solid white 1px',
            backgroundColor: 'primary.dark',
            color: 'white.main',
            fontSize: 10,
          },
        },
      }}
      title={formatMessage({ id: title })}
      {...props}
    />
  )
}
