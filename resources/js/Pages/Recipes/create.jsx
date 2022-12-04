import InputText from '@/Components/Common/Inputs/InputText'
import IntlMessage from '@/Components/Common/IntlMessage'
import IconButton from '@/Components/Custom/IconButton'
import AutocompleteMedicaments from '@/Components/Layouts/Medicaments/AutocompleteMedicaments'
import EditMedicamentModal from '@/Components/Layouts/Medicaments/EditMedicamentModal'
import ModuleButton from '@/Components/Layouts/Modules/ModuleButton'
import {
  composeValidators,
  greaterOrEqualThan,
  greaterOrEqualThanValue,
  greaterOrEqualValue,
  lessOrEqualThan,
  lessOrEqualThanValue,
  required,
} from '@/Config/InputErrors'
import { post, visit } from '@/HTTPProvider'
import { Add, Article, Clear, Masks, MoveDown, Sick } from '@mui/icons-material'
import {
  Button,
  Divider,
  FormControl,
  FormHelperText,
  Grid,
  Hidden,
  Stack,
  Table,
  TableBody,
  TableCell,
  TableHead,
  TableRow,
  TextField,
  Typography,
} from '@mui/material'
import { Box } from '@mui/system'
import arrayMutators from 'final-form-arrays'
import _ from 'lodash'
import { Fragment, useEffect, useState } from 'react'
import { Field, Form } from 'react-final-form'
import { FieldArray } from 'react-final-form-arrays'
import { useIntl } from 'react-intl'
import SelectionModuleModal from '@/Components/Layouts/Modules/SelectionModuleModal'
import CellNumberBox from '@/Components/Common/CellNumberBox'
import { format } from 'date-fns'
import Autocomplete from '@/Components/Common/Inputs/Autocomplete'
import Select from '@/Components/Common/Inputs/Select'

export default ({
  medicaments,
  moduleSelected,
  selectedMedicaments,
  modules,
  pathologies = [],
  doctors = [],
  patients = [],
  moduleDeliver,
  can,
  ...props
}) => {
  const { formatMessage } = useIntl()
  const [hour, setHour] = useState(new Date())
  //update relog
  const submit = ({ description, ...values }) => {
    const dataToSend = {
      doctor_id: values.doctor.id,
      recipe_type: values.recipe_type,
      module_id: moduleDeliver.id,
      patient_id: values.patient.id,
      description,
      medicaments: values.medicaments.map(
        ({ id, prescribed_amount, quantity_deliver }) => ({
          id,
          prescribed_amount,
          quantity_deliver,
        }),
      ),
    }
    if (values.recipe_type === 'HIGH COST') {
      dataToSend.pathology_id = values.pathology.id
    }

    post(route('recipe.store'), dataToSend)
  }
  useEffect(() => {
    const interval = setInterval(() => {
      setHour(new Date())
    }, 60000)

    return () => clearInterval(interval)
  }, [hour])

  const [propsSelectedModuleTo, setPropsSelectedModuleTo] = useState({
    open: false,
    moduleSelected: null,
    moduleDisableds: [],
  })

  return (
    <Fragment>
      <Form
        onSubmit={submit}
        mutators={{ ...arrayMutators }}
        initialValues={{
          medicaments: selectedMedicaments,
          description: null,
        }}
        validate={(values) => {
          const error = {}
          if (!values.moduleDeliver) error.moduleDeliver = 'fieldError.required'
          if (!values.medicaments || values.medicaments.length <= 0)
            error.medicamentsArray = 'fielderror.medicamentGreatherThanOne'
          else if (
            values.recipe_type === 'DAILY' &&
            values.medicaments.length > 1
          )
            error.medicamentsArray = 'fielderror.medicamentlessOrThanOne'
          if (values.recipe_type === 'HIGH COST' && !values.pathology)
            error.pathology = 'fieldError.required'
          return error
        }}
        render={({ handleSubmit, values, form, errors, ...meta }) => (
          <form onSubmit={handleSubmit}>
            <FieldArray name="medicaments">
              {({ fields }) => (
                <Stack spacing={2} padding={4}>
                  <Stack
                    bgcolor="white.main"
                    borderRadius={2}
                    padding={1}
                    gap={2}
                  >
                    <Typography
                      variant="h3"
                      align="center"
                      fontWeight="bolder"
                      color="primary"
                      display="flex"
                      alignItems="center"
                      alignSelf="center"
                    >
                      <Article sx={{ fontSize: 'inherit', marginRight: 2 }} />
                      <IntlMessage id="Recipe" />
                    </Typography>
                    <Divider />
                    <Grid
                      container
                      alignItems="flex-end"
                      justifyContent="center"
                      rowGap={2}
                      columnSpacing={2}
                    >
                      <Grid item xs={12} sm={6} paddingBottom="10px">
                        <FormControl fullWidth>
                          <ModuleButton
                            module={moduleDeliver}
                            onClick={(e) => {
                              setPropsSelectedModuleTo({
                                open: true,
                                moduleSelected: values.moduleDeliver,
                                moduleDisableds: [values.moduleSend],
                              })
                            }}
                          />
                          {meta.submitFailed && errors.moduleDeliver && (
                            <FormHelperText error>
                              <IntlMessage id={errors.moduleDeliver} />
                            </FormHelperText>
                          )}
                        </FormControl>
                      </Grid>
                      <Grid item xs={12} sm={6}>
                        <Stack>
                          <Typography
                            variant="h4"
                            marginBottom="10px"
                            textAlign="right"
                            color="primary"
                          >
                            {format(hour, 'hh : mm aa')}
                          </Typography>
                          <Select
                            validate={required}
                            options={[
                              {
                                label: 'DAILY',
                                value: 'DAILY',
                              },
                              {
                                label: 'MASSIVE',
                                value: 'MASSIVE',
                              },
                              {
                                label: 'HIGH COST',
                                value: 'HIGH COST',
                              },
                            ]}
                            label="recipeType"
                            fullWidth
                            name="recipe_type"
                          />

                          <Autocomplete
                            validate={required}
                            name="patient"
                            margin="10px 0"
                            label="patient"
                            fullWidth
                            options={patients}
                            getOptionLabel={(option) =>
                              `C.I: ${option.c_i} ${option.first_name}  H:${option.n_history} `
                            }
                            renderOption={(props, option) => (
                              <Box {...props} key={option.id}>
                                {`C.I: ${option.c_i} H:${option.n_history}
                                ${option.first_name} ${option.last_name}`}
                              </Box>
                            )}
                            onInputChange={(e, value) => {
                              visit(
                                route('recipe.create', {
                                  patients: value ? value : '',
                                }),
                                {
                                  noLoader: true,
                                  preserveState: true,
                                  only: ['patients'],
                                },
                              )
                            }}
                          />
                        </Stack>
                      </Grid>
                      <Grid item xs={12}>
                        <Autocomplete
                          validate={required}
                          name="doctor"
                          margin="10px 0"
                          label="doctor"
                          fullWidth
                          options={doctors}
                          getOptionLabel={(option) =>
                            `C.I: ${option.c_i} ${option.first_name} ${option.last_name}  #:${option.code} `
                          }
                          renderOption={(props, option) => (
                            <Box {...props} key={option.id}>
                              {`C.I: ${option.c_i} #: ${option.code}
                                ${option.first_name} ${option.last_name}`}
                            </Box>
                          )}
                          onInputChange={(e, value) => {
                            visit(
                              route('recipe.create', {
                                doctors: value ? value : '',
                              }),
                              {
                                noLoader: true,
                                preserveState: true,
                                only: ['doctors'],
                              },
                            )
                          }}
                        />
                      </Grid>
                    </Grid>
                  </Stack>
                  {values.patient && (
                    <Stack
                      bgcolor="white.main"
                      borderRadius={2}
                      padding={1}
                      gap={2}
                    >
                      <Typography
                        variant="h5"
                        fontWeight="bolder"
                        color="gray"
                        display="flex"
                        alignItems="center"
                        alignSelf="left"
                      >
                        <Sick sx={{ fontSize: 'inherit', marginRight: 2 }} />
                        <IntlMessage id="patientInformation" />
                      </Typography>
                      <Divider />
                      <Grid container rowSpacing={2} columnSpacing={1}>
                        <Grid item xs={4}>
                          <Typography variant="body1">
                            <b>
                              <IntlMessage id={'first_name'} />
                            </b>
                            {': ' + values.patient.first_name}
                          </Typography>
                        </Grid>
                        <Grid item xs={3}>
                          <Typography variant="body1">
                            <b>
                              <IntlMessage id={'last_name'} />
                            </b>
                            {': ' + values.patient.last_name}
                          </Typography>
                        </Grid>
                        <Grid item xs={2}>
                          <Typography variant="body1">
                            <b>
                              <IntlMessage id={'c_i'} />
                            </b>{' '}
                            {': ' + values.patient.c_i}
                          </Typography>
                        </Grid>
                        <Grid item xs={3}>
                          <Typography variant="body1">
                            <b>
                              <IntlMessage id={'n_history'} />
                            </b>
                            {': ' + values.patient.n_history}
                          </Typography>
                        </Grid>
                        <Grid item xs={4}>
                          <Typography variant="body1">
                            <b>
                              <IntlMessage id={'email'} />
                            </b>
                            {': ' + values.patient.email}
                          </Typography>
                        </Grid>
                        <Grid item xs={3}>
                          <Typography variant="body1">
                            <b>
                              <IntlMessage id={'gender'} />
                            </b>
                            {': '}
                            <IntlMessage id={values.patient.gender} />
                          </Typography>
                        </Grid>
                        <Grid item xs={5}>
                          <Typography variant="body1">
                            <b>
                              <IntlMessage id={'birth_date'} />
                            </b>
                            {': '}
                            {format(
                              new Date(
                                values.patient.birth_date.split('-')[0],
                                values.patient.birth_date.split('-')[1] - 1,
                                values.patient.birth_date.split('-')[2],
                              ),
                              'dd MMMM yyyy',
                            )}
                          </Typography>
                        </Grid>
                        <Grid item xs={3}>
                          <Typography variant="body1">
                            <b>
                              <IntlMessage id={'phone'} />
                            </b>
                            {': '}
                            {values.patient.phone}
                          </Typography>
                        </Grid>
                      </Grid>
                    </Stack>
                  )}
                  {values.doctor && (
                    <Stack
                      bgcolor="white.main"
                      borderRadius={2}
                      padding={1}
                      gap={2}
                    >
                      <Typography
                        variant="h5"
                        fontWeight="bolder"
                        color="gray"
                        display="flex"
                        alignItems="center"
                        alignSelf="left"
                      >
                        <Masks sx={{ fontSize: 'inherit', marginRight: 2 }} />
                        <IntlMessage id="doctorInformation" />
                      </Typography>
                      <Divider />
                      <Grid container rowSpacing={2} columnSpacing={1}>
                        <Grid item xs={4}>
                          <Typography variant="body1">
                            <b>
                              <IntlMessage id={'first_name'} />
                            </b>
                            {': ' + values.doctor.first_name}
                          </Typography>
                        </Grid>
                        <Grid item xs={3}>
                          <Typography variant="body1">
                            <b>
                              <IntlMessage id={'last_name'} />
                            </b>
                            {': ' + values.doctor.last_name}
                          </Typography>
                        </Grid>
                        <Grid item xs={2}>
                          <Typography variant="body1">
                            <b>
                              <IntlMessage id={'c_i'} />
                            </b>{' '}
                            {': ' + values.doctor.c_i}
                          </Typography>
                        </Grid>
                        <Grid item xs={3}>
                          <Typography variant="body1">
                            <b>
                              <IntlMessage id={'code'} />
                            </b>
                            {': ' + values.doctor.code}
                          </Typography>
                        </Grid>
                        <Grid item xs={4}>
                          <Typography variant="body1">
                            <b>
                              <IntlMessage id={'email'} />
                            </b>
                            {': ' + values.doctor.email}
                          </Typography>
                        </Grid>
                        <Grid item xs={3}>
                          <Typography variant="body1">
                            <b>
                              <IntlMessage id={'gender'} />
                            </b>
                            {': '}
                            <IntlMessage id={values.doctor.gender} />
                          </Typography>
                        </Grid>
                        <Grid item xs={5}>
                          <Typography variant="body1">
                            <b>
                              <IntlMessage id={'birth_date'} />
                            </b>
                            {': '}
                            {format(
                              new Date(
                                values.doctor.birth_date.split('-')[0],
                                values.doctor.birth_date.split('-')[1] - 1,
                                values.doctor.birth_date.split('-')[2],
                              ),
                              'dd MMMM yyyy',
                            )}
                          </Typography>
                        </Grid>
                        <Grid item xs={3}>
                          <Typography variant="body1">
                            <b>
                              <IntlMessage id={'phone'} />
                            </b>
                            {': '}
                            {values.doctor.phone}
                          </Typography>
                        </Grid>
                      </Grid>
                    </Stack>
                  )}
                  {moduleDeliver && values.recipe_type && (
                    <Stack
                      bgcolor="white.main"
                      borderRadius={2}
                      padding={1}
                      gap={2}
                    >
                      <Typography
                        variant="h5"
                        fontWeight="bolder"
                        color="gray"
                        display="flex"
                        alignItems="center"
                        alignSelf="left"
                      >
                        <Article sx={{ fontSize: 'inherit', marginRight: 1 }} />
                        <IntlMessage id="recipe" />
                      </Typography>
                      <Divider />

                      <AutocompleteMedicaments
                        medicaments={medicaments}
                        renderOption={(props, option) => (
                          <Box {...props} key={option.id} component="li">
                            {`${option.code} (${option.name}) ${option.unit.name}`}
                            <span style={{ color: 'red', marginLeft: '3px' }}>
                              <IntlMessage id="available" />:{' '}
                              {option.pivot && option.pivot.quantity_exist}
                            </span>
                          </Box>
                        )}
                        onChange={(e, value) => {
                          if (
                            value &&
                            !_.find(values.medicaments, {
                              id: value.id,
                            })
                          )
                            fields.push(value)
                        }}
                      />
                      <InputText
                        name="description"
                        label="description"
                        maxLength={250}
                        multiline
                        optional
                        fullWidth
                        margin={0}
                      />
                      {values.recipe_type === 'HIGH COST' && (
                        <Autocomplete
                          label="pathology"
                          fullWidth
                          name="pathology"
                          margin="10px 0"
                          options={pathologies}
                          getOptionLabel={(option) =>
                            `Codigo: ${option.code} Nombre: ${option.name} `
                          }
                          renderOption={(props, option) => (
                            <Box {...props} key={option.id}>
                              <Typography variant="body1" color="primary">
                                {option.code}
                              </Typography>
                              {` -> ${option.name} `}
                            </Box>
                          )}
                        />
                      )}
                    </Stack>
                  )}
                  <Table sx={{ backgroundColor: 'white.main' }}>
                    <TableHead sx={{ backgroundColor: 'primary.dark' }}>
                      <TableRow>
                        <TableCell>
                          <Typography variant="body2" color="#fff">
                            <IntlMessage id="code" />
                          </Typography>
                        </TableCell>
                        <TableCell>
                          <Typography variant="body2" color="#fff">
                            <IntlMessage id="medicament" />
                          </Typography>
                        </TableCell>
                        <TableCell align="center">
                          <Typography variant="body2" color="#fff">
                            <IntlMessage id="quantity_deliver" />
                          </Typography>
                        </TableCell>
                        <TableCell align="center">
                          <Typography variant="body2" color="#fff">
                            <IntlMessage id="prescribed_amount" />
                          </Typography>
                        </TableCell>
                        <TableCell align="center">
                          <Typography variant="body2" color="#fff">
                            <IntlMessage id="quantity_exist" />
                          </Typography>
                        </TableCell>
                        <TableCell align="center">
                          <Typography variant="body2" color="#fff">
                            <IntlMessage id="afterTransfer" />
                          </Typography>
                        </TableCell>
                        <TableCell />
                      </TableRow>
                    </TableHead>
                    <TableBody>
                      {fields.map((fieldName, index) => {
                        const itemMed = _.get(values, fieldName)
                        return (
                          <TableRow key={itemMed.id}>
                            <TableCell>{itemMed.code}</TableCell>
                            <TableCell>{itemMed.name}</TableCell>
                            <TableCell align="center" width={200}>
                              <InputText
                                name={`${fieldName}.quantity_deliver`}
                                label="quantity_deliver"
                                validate={composeValidators(
                                  required,
                                  lessOrEqualThanValue(
                                    itemMed.pivot.quantity_exist,
                                  ),
                                  lessOrEqualThan(
                                    `${fieldName}.prescribed_amount`,
                                  ),
                                  greaterOrEqualThanValue(1),
                                )}
                                inputProps={{
                                  autoComplete: 'off',
                                }}
                                errorValues={{
                                  greaterOrEqualThanValue2: 1,
                                  lessOrEqualThanValue2:
                                    itemMed.pivot.quantity_exist,
                                  lessOrEqualThan: _.get(
                                    values,
                                    `${fieldName}.prescribed_amount`,
                                  ),
                                }}
                                onlyNumbers
                              />
                            </TableCell>
                            <TableCell align="center" width={200}>
                              <InputText
                                name={`${fieldName}.prescribed_amount`}
                                label="prescribed_amount"
                                validate={composeValidators(
                                  required,

                                  greaterOrEqualThanValue(1),
                                )}
                                inputProps={{
                                  autoComplete: 'off',
                                }}
                                errorValues={{
                                  greaterOrEqualThanValue2: 1,
                                  lessOrEqualThanValue2:
                                    itemMed.pivot.quantity_exist,
                                }}
                                onlyNumbers
                              />
                            </TableCell>
                            <TableCell align="center">
                              <CellNumberBox
                                value={itemMed.pivot.quantity_exist}
                              />
                            </TableCell>
                            <TableCell>
                              <CellNumberBox
                                value={
                                  itemMed.pivot.quantity_exist -
                                    _.get(
                                      values,
                                      `${fieldName}.quantity_deliver`,
                                      0,
                                    ) <=
                                  0
                                    ? 0
                                    : itemMed.pivot.quantity_exist -
                                      _.get(
                                        values,
                                        `${fieldName}.quantity_deliver`,
                                        0,
                                      )
                                }
                              />
                            </TableCell>
                            <TableCell align="center">
                              <IconButton
                                onClick={() => {
                                  fields.remove(index)
                                }}
                              >
                                <Clear color="error" />
                              </IconButton>
                            </TableCell>
                          </TableRow>
                        )
                      })}
                    </TableBody>
                  </Table>
                  {meta.submitFailed && errors && errors.medicamentsArray && (
                    <FormHelperText error>
                      <IntlMessage id={errors.medicamentsArray} />
                    </FormHelperText>
                  )}
                  <Button
                    variant="contained"
                    color="primary"
                    sx={{ color: '#fff' }}
                    type="submit"
                  >
                    <IntlMessage id="endRecipe" />
                  </Button>

                  <SelectionModuleModal
                    {...propsSelectedModuleTo}
                    modules={modules}
                    onClose={() => {
                      setPropsSelectedModuleTo({ open: false })
                    }}
                    onSelect={(value) => {
                      form.change('medicaments', [])
                      visit( route('recipe.create',  { module_id: value.id }  ))
                      form.change('moduleDeliver', value)
                    }}
                    label="selectModuleToTransfer"
                  />
                </Stack>
              )}
            </FieldArray>
          </form>
        )}
      />
    </Fragment>
  )
}
