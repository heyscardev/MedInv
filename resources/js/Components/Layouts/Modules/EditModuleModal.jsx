import Autocomplete from '@/Components/Common/Inputs/Autocomplete'
import InputText from '@/Components/Common/Inputs/InputText'

import Modal from '@/Components/Common/Modal'
import LogoTypography from '@/Components/LogoTypography'
import { alpha, composeValidators, required } from '@/Config/InputErrors'
import { post, put } from '@/HTTPProvider'
import { Cancel, Save } from '@mui/icons-material'
import { Box, Button, DialogActions, Grid, Typography } from '@mui/material'

import { Form } from 'react-final-form'

const routeName = 'module'
export default ({ item, open, users = [], onClose }) => {
  const update = ({ ...data }, form) => {
    const dataToSend = {
      id: data.id,
    }
    for (const key in data) {
      if (Object.hasOwnProperty.call(data, key)) {
        if (form.dirtyFields[key]) {
          if (key === 'user') {
            dataToSend['user_id'] = data[key].id
          } else {
            dataToSend[key] =
              key === 'birth_date'
                ? formatStringDateToDatabase(data[key])
                : data[key]
          }
        }
      }
    }

    put(route(`${routeName}.update`, dataToSend.id), dataToSend, {
      onSuccess: (e) => {
        onClose(null)
      },
    })
  }
  const store = ({ user, ...data }) => {
    const dataToSend = {
      ...data,
      user_id: user.id,
    }

    post(route(`${routeName}.store`), dataToSend, {
      onSuccess: (e) => {
        onClose(null)
      },
    })
  }
  const submit = (data, { getState }) => {
    if (data.id) {
      return update(data, getState())
    }
    return store(data)
  }

  return (
    <Modal {...{ open }}>
      <div style={{ textAlign: 'center' }}>
        <LogoTypography />
        <Typography variant="h5" color="secondary.dark">
          {item && item.id ? 'Acualizar Módulo' : 'Registrar Módulo'}
        </Typography>
      </div>

      <Form
        initialValues={{
          ...item,
          user: _.find(users, { id: item.user_id }, null),
        }}
        onSubmit={submit}
        render={({ handleSubmit, values }) => (
          <form onSubmit={handleSubmit} id="userForm" autoComplete="off">
            <Grid container>
              <Grid item xs={12} lg={6}>
                <InputText
                  name="code"
                  label="code"
                  autoComplete="nope"
                  validate={composeValidators(required)}
                  maxLength={80}
                  fullWidth
                />
              </Grid>
              <Grid item xs={12} lg={6}>
                <InputText
                  name="name"
                  label="name"
                  autoComplete="nope"
                  validate={composeValidators(required, alpha)}
                  maxLength={80}
                  fullWidth
                />
              </Grid>
              <Grid item xs={12} lg={6}>
                <Autocomplete
                  name="user"
                  label="responsible"
                  validate={composeValidators(required)}
                  options={users}
                  fullWidth
                  defaultValue={values.user}
                  getOptionLabel={(option) =>
                    `C.I: ${option.c_i} ${option.first_name}   `
                  }
                  renderOption={(props, option) => (
                    <Box {...props} key={option.id}>
                      {`C.I: ${option.c_i}  ${option.first_name} ${option.last_name}`}
                    </Box>
                  )}
                />
              </Grid>
            </Grid>
          </form>
        )}
      />
      <DialogActions
        sx={{
          backgroundColor: 'secondary.main',
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
          form="userForm"
        >
          Guardar
        </Button>
      </DialogActions>
    </Modal>
  )
}
