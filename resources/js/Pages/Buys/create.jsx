import InputText from '@/Components/Common/Inputs/InputText'
import IntlMessage from '@/Components/Common/IntlMessage'
import Head from '@/Components/Custom/Head'
import IconButton from '@/Components/Custom/IconButton'
import IntlFormatCurrency from '@/Components/Custom/IntlFormatCurrency'
import EditMedicamentModal from '@/Components/Layouts/Medicaments/EditMedicamentModal'
import ModuleButton from '@/Components/Layouts/Modules/ModuleButton'
import SelectionModuleModal from '@/Components/Layouts/Modules/SelectionModuleModal'
import {
  composeValidators,
  greaterOrEqualThanValue,
  lessOrEqualThanValue,
  required,
} from '@/Config/InputErrors'
import { post, put, visit } from '@/HTTPProvider'
import { Add, Clear, ShoppingCart } from '@mui/icons-material'
import {
  Autocomplete,
  Button,
  Divider,
  FormControl,
  FormHelperText,
  Grid,
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
import { Form } from 'react-final-form'
import { FieldArray } from 'react-final-form-arrays'

const submit = (values, { getState }) => {
  if (values.id) return updateData(values, getState())
  return storeData(values);
}
const updateData = (values, { dirtyFields }) => {
  const dataToSend = {
    id: values.id,
  }
  if (dirtyFields.description) dataToSend.description = values.description
  if (dirtyFields.module_id) dataToSend.module_id = values.module_id
  if (dirtyFields.medicaments) {
    dataToSend.medicaments = values.medicaments.map(
      ({ id, price, quantity }) => ({
        id,
        price,
        quantity,
      }),
    )
  }

put(route('buy.update',dataToSend.id),dataToSend);
}

const storeData = (values) => {
  const dataToSend = {
    module_id: values.module_id,
    description: values.description,
    medicaments: values.medicaments.map(({ id, price, quantity }) => ({
      id,
      price,
      quantity,
    })),
  }
  /* console.log(dataToSend) */
  post(route('buy.store'), dataToSend)
}
export default ({ buyToEdit, ...props }) => {
  const [initialMedicaments , setInitialMedicaments] = useState([])
  const { data, module, modules = [], can } = props
  const [propsSelectedModuleTo, setPropsSelectedModuleTo] = useState([])
  useEffect(() => {
    if (buyToEdit)
      setInitialMedicaments(
        _.map(buyToEdit.medicaments, ({ id, code, name, pivot }) => ({
          id,
          code,
          name,
          ...pivot,
        })),
      )
  }, buyToEdit)
  return (
    <Fragment>
      <Head title={buyToEdit ? 'editBuy' : 'createBuy'} />
      <Form
        onSubmit={submit}
        mutators={{ ...arrayMutators }}
        initialValues={{
          id: buyToEdit ? buyToEdit.id : null,
          module_id: module ? module.id : null,
          medicaments: initialMedicaments ,
          description: buyToEdit ? buyToEdit.description : null,
        }}
        validate={(values) => {
          const errors = {}
          if (!values.module_id) errors.module_id = 'fieldError.required'
          return errors
        }}
        render={({ handleSubmit, values, form, errors, submitFailed }) => (
          <form onSubmit={handleSubmit}>
            <Stack spacing={2} padding={4}>
              <Stack bgcolor="white.main" borderRadius={2} padding={1} gap={2}>
                <Typography
                  variant="h3"
                  align="center"
                  fontWeight="bolder"
                  color="primary"
                  display="flex"
                  alignItems="center"
                  alignSelf="center"
                >
                  {/*   {console.log(values)} */}
                  <ShoppingCart sx={{ fontSize: 'inherit', marginRight: 2 }} />
                  <IntlMessage id="buy" />
                  {buyToEdit && (
                    <>
                      {' N° '}
                      {buyToEdit.id}
                    </>
                  )}
                </Typography>
                <Divider />

                <FormControl fullWidth>
                  <ModuleButton
                    module={module}
                    onClick={(e) => {
                      setPropsSelectedModuleTo({
                        open: true,
                        moduleSelected: values.module,
                        moduleDisableds: [values.module],
                      })
                    }}
                  />
                  {submitFailed && errors.module_id && (
                    <FormHelperText error sx={{ textAlign: 'center' }}>
                      <IntlMessage id={errors.module_id} />
                    </FormHelperText>
                  )}
                </FormControl>
              </Stack>
            </Stack>
            <FieldArray name="medicaments">
              {({ fields }) => (
                <Stack spacing={2} padding={4}>
                  <Stack bgcolor="white.main" borderRadius={2} padding={1}>
                    <AutocompleteMedicaments
                      medicamentsOptions={props.medicaments}
                      /* onChangeTextField={(e, value) => {
                        visit(
                          route(route().current(), {
                            module: props.module ? props.module.id : null,
                            buy: buyToEdit ? buyToEdit.id : null,
                            search: value ? value : '',
                          }),
                          {
                            noLoader: true,
                            preserveState: true,
                            only: ['medicaments'],
                          },
                        )
                      }} */
                      units={props.units}
                      pushMedicament={fields.push}
                      onChange={(e, value) => {
                        if (
                          value &&
                          !_.find(values.medicaments, {
                            id: value.id,
                          })
                        )
                          fields.push(value)
                      }}
                      can={can}
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
                  </Stack>
                  <Table sx={{ backgroundColor: 'white.main' }}>
                    <TableHead sx={{ backgroundColor: 'primary.dark' }}>
                      <TableRow>
                        <TableCell sx={{color:"#fff"}}>
                          <IntlMessage id="code" />
                        </TableCell>
                        <TableCell sx={{color:"#fff"}}>
                          <IntlMessage id="medicament" />
                        </TableCell>
                        <TableCell align="center" sx={{color:"#fff"}}>
                          <IntlMessage id="quantity" />
                        </TableCell>
                        <TableCell align="center" sx={{color:"#fff"}}>
                          <IntlMessage id="price" />
                        </TableCell>
                        <TableCell align="center" sx={{color:"#fff"}}>
                          <IntlMessage id="totalPrice" />
                        </TableCell>
                        <TableCell align="center" sx={{color:"#fff"}}>
                          <IntlMessage id="price_sale" />
                        </TableCell>
                        <TableCell />
                      </TableRow>
                    </TableHead>
                    <TableBody>
                      {fields.map((fieldName, index) => {
                        const itemMed = _.get(values, fieldName)
                        return (
                          <TableRow key={itemMed.id}>
                            {console.log(itemMed)}
                            <TableCell>{itemMed.code}</TableCell>
                            <TableCell>{itemMed.name}</TableCell>
                            <TableCell align="center" width={200}>
                              <InputText
                                name={`${fieldName}.quantity`}
                                label="quantity"
                                validate={composeValidators(
                                  required,
                                  lessOrEqualThanValue(1000000000),
                                  greaterOrEqualThanValue(1),
                                )}
                                errorValues={{
                                  greaterOrEqualThanValue2: 1,
                                  lessOrEqualThanValue2: 1000000000,
                                }}
                                inputProps={{
                                  autoComplete: 'off',
                                }}
                                onlyNumbers
                              />
                            </TableCell>
                            <TableCell align="center" width={200}>
                              <InputText
                                name={`${fieldName}.price`}
                                label="price"
                                validate={composeValidators(
                                  required,
                                  greaterOrEqualThanValue(1),
                                  lessOrEqualThanValue(99999999999.99),
                                )}
                                errorValues={{
                                  greaterOrEqualThanValue2: 1,
                                  lessOrEqualThanValue2: 99999999999.99,
                                }}
                                inputProps={{
                                  autoComplete: 'off',
                                }}
                                onlyNumbersWithFloat
                              />
                            </TableCell>
                            <TableCell>
                              <IntlFormatCurrency
                                value={
                                  _.get(values, `${fieldName}.price`, 0) *
                                  _.get(values, `${fieldName}.quantity`, 0)
                                }
                              />
                            </TableCell>
                            <TableCell>
                              <IntlFormatCurrency
                                value={
                                  _.get(values, `${fieldName}.price_sale`, 0) 
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
                  <Button
                    disabled={
                      !values.medicaments || values.medicaments.maxLength <= 0
                    }
                    variant="contained"
                    color="primary"
                    type="submit"
                  >
                    <IntlMessage id="endBuy" />
                  </Button>
                </Stack>
              )}
            </FieldArray>{' '}
            <SelectionModuleModal
              {...propsSelectedModuleTo}
              modules={modules}
              onClose={() => {
                setPropsSelectedModuleTo({ open: false })
              }}
              onSelect={(value) => {
                form.change('medicaments', [])
                visit(
                  route(route().current(), {
                    module: value.id,
                    buy: buyToEdit ? buyToEdit.id : null,
                  }),
                )
                form.change('module_id', value.id)
              }}
              label="selectModuleToBuy"
            />
          </form>
        )}
      />
    </Fragment>
  )
}

const AutocompleteMedicaments = ({
  medicamentsOptions,
  units,
  onChange,
  can,
  pushMedicament,
  onChangeTextField,
}) => {
  const [openEdit, setOpenEdit] = useState(false)
  return (
    <Grid
      container
      justifyContent="center"
      alignItems="center"
      marginBottom={2}
      columnGap={2}
    >
      <Grid item xs={6}>
        <Autocomplete
          id="medicamentAutocomplete"
          options={medicamentsOptions}
          openOnFocus
          onInputChange={onChangeTextField}
          onChange={onChange}
          getOptionLabel={(option) =>
            option.code + option.name + option.unit.name
          }
          renderOption={(props, option) => (
            <Box component="li" {...props}>
              {option.code} ({option.name}) {option.unit.name}
            </Box>
          )}
          renderInput={(params) => (
            <TextField
              {...params}
              id="medicamentAutocompletText"
              label="Seleccion de medicamentos"
              inputProps={{
                ...params.inputProps,
                autoComplete: 'off', // disable autocomplete and autofill
              }}
            />
          )}
        />
      </Grid>
      <Grid item>
        <IconButton
          disabled={!can('medicament.store')}
          color="primary"
          onClick={() => setOpenEdit(true)}
          title="newMedicament"
        >
          <Add />
        </IconButton>
      </Grid>
      <EditMedicamentModal
        units={units}
        medicaments={medicamentsOptions}
        open={!!openEdit}
        onClose={() => setOpenEdit(false)}
      />
    </Grid>
  )
}
