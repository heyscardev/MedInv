
import Modal from '@/Components/Common/Modal'
import LogoTypography from '@/Components/LogoTypography'
import arrayMutators from 'final-form-arrays'

import { Cancel, Save } from '@mui/icons-material'
import {
  Button,
  Checkbox,
  Container,
  DialogActions,
  FormControl,
  FormControlLabel,
  FormHelperText,
  Grid,
  Switch,
  Typography,
} from '@mui/material'
import { addYears } from 'date-fns'
import { Field, Form } from 'react-final-form'
import { FieldArray } from 'react-final-form-arrays'
import { find, update } from 'lodash'
import { useEffect, useState } from 'react'
import { put } from '@/HTTPProvider'

const routeName = 'doctor'

export default ({ item, open, medicamentGroups = [], onClose }) => {
  const [medicamentGroupsState, setMedicamentGroupsState] = useState([])
  useEffect(() => {
    const formatData = medicamentGroups.map((val) => ({
      ...val,
      active: !!_.find(item.medicament_groups, { id: val.id }),
    }))
    if (formatData.length) setMedicamentGroupsState(formatData)
  }, [item, medicamentGroups])

  const submit = (data, { getState }) => {
    
const formatData= {medicament_groups:_.map(_.filter(data.medicament_groups,{active:true}),(item)=>item.id)}
put(route('doctor.update',item.id),formatData)
  
    
  }

  return (
    <Modal {...{ open }}>
      <div style={{ textAlign: 'center' }}>
        <LogoTypography />
        <Typography variant="h5" color="secondary.dark">
          {item && item.id
            ? 'Acualizar Grupos del doctor: ' +
              item.first_name +
              ' ' +
              item.last_name
            : 'Registrar Grupos'}
        </Typography>
      </div>
      <Form
        mutators={{ ...arrayMutators }}
        initialValues={{ medicament_groups: medicamentGroupsState }}
        validate={(values) => {}}
        onSubmit={submit}
        render={({ handleSubmit, submitFailed, errors, values }) => (
          <form onSubmit={handleSubmit} id="medicament_group_doctor_form" autoComplete="off">
         
            <Grid container spacing={2} justifyContent="space-around"  marginY={3}>
              <FieldArray  name="medicament_groups">
                {({ fields }) =>
                  fields.map((fieldName) => {
                    const item = _.get(values, fieldName);
                    return (
                      <Grid item xs={12} sm={6} md={4} justifyContent="center" display="flex" key={item.id}>
                        <Field type='checkbox' name={`${fieldName}.active`}>
                          {({ meta, input }) => (
                            <FormControl
                              error={meta.submitFailed && !!meta.error}
                              
                            >
                              <FormControlLabel
                                label={item.name}
                                control={<Switch {...input} color="primary" />}
                              />
                              <FormHelperText error={!!item.restricted }>{item.restricted ? "grupo solo autorizados":"uso libre"}</FormHelperText>
                           
                            </FormControl>
                          )}
                        </Field>
                      </Grid>
                    )
                  })
                }
              </FieldArray>
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
          form="medicament_group_doctor_form"
        >
          Guardar
        </Button>
      </DialogActions>
    </Modal>
  )
}
