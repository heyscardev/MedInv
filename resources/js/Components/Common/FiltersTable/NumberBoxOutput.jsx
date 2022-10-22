import IntlFormatNumber from '@/Components/Custom/IntlFormatNumber'
import { Box } from '@mui/material'

export default ({ value }) => (
  <Box
    sx={(theme) => ({
      minWidth:
        ( Math.log10(Number(value) )*20 *Number(value) /(Number(value) *1.1) ) + 'px',
      backgroundColor:
        value < 100
          ? theme.palette.error.main
          : value >= 100 && value < 1000
          ? theme.palette.primary.main
          : theme.palette.primary.dark,
      borderRadius: '0.25rem',
      color: '#fff',
      p: '0.25rem',
      textAlign: 'right',
    })}
  >
    <IntlFormatNumber value={value} />
  </Box>
)
