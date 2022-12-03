import Modal from '@/Components/Common/Modal'
import {
  composeValidators,
  email, required
} from '@/Config/InputErrors'
import { showLoader } from '@/Config/Loader'
import { post } from '@/HTTPProvider'
import {
  Box,
  Button, Grid,
  Typography,
  useTheme
} from '@mui/material'
import { Form } from 'react-final-form'
import toast from 'react-hot-toast'
import CheckBox from '../Common/Inputs/CheckBox'
import InputText from '../Common/Inputs/InputText'
import PasswordField from '../Common/Inputs/PasswordField'
import LogoTypography from '../LogoTypography'
const onSubmit = (values) => {
  showLoader()
  post(route('login'), values, {
    preventSuccess: true,
    onSuccess: () => {
      toast.success('bienvenido')
    },
  })
}

export default ({ open, onClose }) => {
  const { primary } = useTheme().palette
  return (
    <Modal open={open} onClose={onClose}>
      <Grid container justifyContent="center" padding="20px 0">
        <Grid item xs={12}>
          <LogoTypography
            gutterBottom={false}
            variant="h1"
            fontWeight="bolder"
          />
        </Grid>
        <Grid item xs={12}>
          <Typography
            textAlign="center"
            variant="h6"
            gutterBottom
            color="black"
            fontWeight="bolder"
            children="Iniciar Session"
          />
        </Grid>
        <Grid item xs={12} sm={10} lg={8}>
          <FormSigin />
        </Grid>
      </Grid>
    </Modal>
  )
}
const FormSigin = () => (
  <Form onSubmit={onSubmit}>
    {({ handleSubmit }) => (
      <form onSubmit={handleSubmit}>
        <InputText
          name="email"
          label="email"
          fullWidth
          validate={composeValidators(required, email)}
        />

        <PasswordField
          name="password"
          label="password"
          fullWidth
          validate={composeValidators(required)}
        />

        <Box display="flex" justifyContent="end">
          <CheckBox name="remember" label="remenber me" />
        </Box>

        <Grid item display="flex" justifyContent="center" marginTop={1}>
          <Button type="submit" size="large" variant="outlined">
            Iniciar Sesion
          </Button>
        </Grid>
      </form>
    )}
  </Form>
)
