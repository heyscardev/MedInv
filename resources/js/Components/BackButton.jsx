import { showLoader } from '@/Config/Loader'
import { visit } from '@/HTTPProvider'
import { ArrowBack } from '@mui/icons-material'
import { Button, Container } from '@mui/material'
import IntlMessage from './Common/IntlMessage'
import IconButton from './Custom/IconButton'

const BackButton = ({ margin = '10px 0px 0 0px' }) => {
  return (
    <IconButton
      sx={{ margin: margin, backgroundColor: '#fff' }}
      onClick={() => {
        history.back()
      }}
      variant="outlined"
      color="primary"
    >
      <ArrowBack />
    </IconButton>
  )
}
export default BackButton
