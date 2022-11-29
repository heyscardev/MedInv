import { Typography } from '@mui/material'
import IntlMessage from './IntlMessage'

const SectionTitle = ({ title, subtitle, noTranslateSubtitle }) => {
  return (
    <Typography
      variant="h2"
      textAlign="center"
      width="100%"
      marginTop={2}
      style={{
        backgroundImage: 'linear-gradient(45deg, #18a1d4 50%, #036C93 50%)',
        display: 'inline-block',
        WebkitBackgroundClip: 'text',
        WebkitTextFillColor: 'transparent',
      }}
    >
      {title && <IntlMessage id={title} />}
      <Typography
        variant="body2"
        style={{
          backgroundImage: 'linear-gradient(45deg, #808080 50%, #808080 50%)',
          display: 'inline-block',
          WebkitBackgroundClip: 'text',
          WebkitTextFillColor: 'transparent',
        }}
      >
        {!noTranslateSubtitle
          ? subtitle && <IntlMessage id={subtitle} />
          : subtitle}
      </Typography>
    </Typography>
  )
}
export default SectionTitle
