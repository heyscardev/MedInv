import { visit } from '@/HTTPProvider'
import { Typography, useTheme } from '@mui/material'
import _ from 'lodash'
import { useIntl } from 'react-intl'

import logo from '@/assets/images/ivss.png'

const toWelcome = (e) => {
  visit('/')
}
export default ({
  imgSize,
  variant = 'h1',
  color1,
  color2,
  colorSubtitle = 'secondary.dark',
  fontWeight = 'bolder',
  justifyContent = 'center',
  fontSize,
  gutterBottom = false,
  WelcomeLink,
  title,
  subtitle,
  ...props
}) => {
  const { palette } = useTheme()
  const { formatMessage } = useIntl()
  return (
    <span
      onClick={WelcomeLink ? toWelcome : (e) => {}}
      style={{ cursor: WelcomeLink ? 'default' : 'pointer', ...props }}
    >
      <Typography
        gutterBottom={gutterBottom}
        variant={variant}
        fontWeight={fontWeight}
        fontSize={fontSize}
        flexWrap="noWrap"
        display="flex"
        textAlign="center"
        justifyContent={justifyContent}
        alignItems="center"
      >
        <img src={logo} alt="ivss-logo" style={{ height: imgSize || 120 }} />
        <span
          style={{
            color: _.get(palette, color1, undefined) || palette.primary.main,
          }}
        >
          Med
        </span>
        <span
          style={{
            color: _.get(palette, color2, undefined) || palette.primary.light,
          }}
        >
          Inv
        </span>
      </Typography>
      <div style={{ textAlign: 'center' }}>
        {title && (
          <Typography
            variant="h4"
            color={palette.primary.light}
            children={formatMessage({ id: title })}
          />
        )}
        {subtitle && (
          <Typography
            variant="h5"
            color={colorSubtitle}
            children={formatMessage({ id: subtitle })}
          />
        )}
      </div>
    </span>
  )
}
