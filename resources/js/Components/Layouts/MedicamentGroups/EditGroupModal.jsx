import InputText from '@/Components/Common/Inputs/InputText'
import Modal from '@/Components/Common/Modal'
import LogoTypography from '@/Components/LogoTypography'
import { composeValidators, required } from '@/Config/InputErrors'
import { validationParams } from '@/Config/parameters.json'
import { post, put } from '@/HTTPProvider'
import { Add, Cancel, Save } from '@mui/icons-material'
import { Button, DialogActions, Grid, Typography } from '@mui/material'
import { Form } from 'react-final-form'
import { useIntl } from 'react-intl'

export default ({ item, open, onClose, onSuccess }) => {
  const { formatMessage } = useIntl()
  const update = (data, form) => {
    const dataToSend = {
      id: data.id,
      name: data.name,
      description: data.description,
    }

    put(route('medicament.group.update', dataToSend.id), dataToSend, {
      onSuccess: (e) => {
        onClose(null)
        if (onSuccess) onSuccess()
      },
    })
  }
  const store = (data) => {
    const dataToSend = {
      name: data.name,
      description: data.description,
    }

    post(route('medicament.group.store'), dataToSend, {
      onSuccess: (e) => {
        onClose()
        if (onSuccess) onSuccess(dataToSend)
      },
    })
  }
  const submit = (data, { getState }) => {
    if (data.id) return update(data, getState())

    return store(data)
  }

  return (
    <Modal {...{ open, onClose }}>
      <div style={{ textAlign: 'center' }}>
        <LogoTypography />
        <Typography variant="h5" color="secondary.dark">
          {!item
            ? formatMessage({ id: 'newMedicamentGroup' })
            : formatMessage({ id: 'updateMedicamentGroup' })}
        </Typography>
      </div>
      <Form
        initialValues={item ? { ...item } : {}}
        onSubmit={submit}
        render={({ handleSubmit, form }) => (
          <form onSubmit={handleSubmit} id="groupForm" autoComplete="off">
            <Grid container>
              <Grid item xs={12} sm={12}>
                <InputText
                  name="name"
                  label="name"
                  alwaysUpper
                  validate={composeValidators(required)}
                  maxLength={validationParams.maxLengthStringName}
                  fullWidth
                />
              </Grid>
              <Grid item xs={12} sm={12}>
                <InputText
                  name="description"
                  label="description"
                  multiline
                  maxLength={255}
                  fullWidth
                />
              </Grid>
            </Grid>
          </form>
        )}
      />
      <DialogActions
        sx={{
          display: 'flex',
          justifyContent: 'center',
        }}
      >
        <Button
          startIcon={<Cancel />}
          onClick={onClose}
          variant="contained"
          color="error"
          sx={{ color: '#fff' }}
        >
          Cancelar
        </Button>
        <Button
          startIcon={<Save />}
          variant="contained"
          type="submit"
          sx={{ color: '#fff' }}
          form="groupForm"
        >
          Guardar
        </Button>
      </DialogActions>
    </Modal>
  )
}
