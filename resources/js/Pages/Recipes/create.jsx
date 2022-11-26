import Breadcrums from '@/Components/Common/Breadcrums'
import InputText from '@/Components/Common/Inputs/InputText'
import IntlMessage from '@/Components/Common/IntlMessage'
import IconButton from '@/Components/Custom/IconButton'
import IntlFormatCurrency from '@/Components/Custom/IntlFormatCurrency'
import AutocompleteMedicaments from '@/Components/Layouts/Medicaments/AutocompleteMedicaments'
import EditMedicamentModal from '@/Components/Layouts/Medicaments/EditMedicamentModal'
import ModuleButton from '@/Components/Layouts/Modules/ModuleButton'
import {
  composeValidators,
  greaterOrEqualThan,
  greaterOrEqualThanValue,
  greaterOrEqualValue,
  lessOrEqualThanValue,
  required,
} from '@/Config/InputErrors'
import { post, visit } from '@/HTTPProvider'
import { Add, Article, Clear, MoveDown } from '@mui/icons-material'
import {
  Autocomplete,
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
import { Fragment, useState } from 'react'
import { Form } from 'react-final-form'
import { FieldArray } from 'react-final-form-arrays'
import { useIntl } from 'react-intl'
import KeyboardDoubleArrowDownIcon from '@mui/icons-material/KeyboardDoubleArrowDown'
import KeyboardDoubleArrowRightIcon from '@mui/icons-material/KeyboardDoubleArrowRight'
import SelectionModuleModal from '@/Components/Layouts/Modules/SelectionModuleModal'
import CellNumberBox from '@/Components/Common/CellNumberBox'

const submit = (values) => {
  const dataToSend = {
    module_send_id: values.moduleSend.id,
    module_receive_id: values.moduleReceive.id,
    medicaments: values.medicaments,
  }
  post(route('transfer.store'), dataToSend)
}
export default ({
  medicaments,
  moduleToTransfers,
  moduleFromTransfers,
  moduleSelected,
  selectedMedicaments,
  modules,
  can,
  ...props
}) => {
  console.log(modules)
  const { formatMessage } = useIntl()
  const [propsSelectedModuleTo, setPropsSelectedModuleTo] = useState({
    open: false,
    moduleSelected: null,
    moduleDisableds: [],
  })
  const [propsSelectedModuleFrom, setPropsSelectedModuleFrom] = useState({
    open: false,
    moduleSelected: null,
    moduleDisableds: [],
  })
  return (
    <Fragment>
      {/*       <Breadcrums
        links={[
          { name: "dashboard", route: "dashboard" },
          { name: "modules", route: "module.index" },
            {
                        noTranslate:true,
                        name: props.module.name,
                        route: "module.show",
                        id: props.module.id,
                    },
                    {
                        noTranslate:true,
                        name: "buyMedicaments",
                        route: "module.buy.create",
                        id: props.module.id,
                    },
        ]}
      /> */}

      <Form
        onSubmit={submit}
        mutators={{ ...arrayMutators }}
        initialValues={{
          moduleReceive: null,
          moduleSend: moduleSelected,
          medicaments: selectedMedicaments,
          description: null,
        }}
        validate={(values) => {
          const error = {}
          if (!values.moduleReceive) error.moduleReceive = 'fieldError.required'
          if (!values.moduleSend) error.moduleSend = 'fieldError.required'
          return error
        }}
        render={({ handleSubmit, values, form, ...meta }) => (
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
                      <Article sx={{ fontSize: 'inherit' }} />
                      <IntlMessage id="Recipe" />
                    </Typography>
                    <Divider />
                    <Grid
                      container
                      alignItems="center"
                      justifyContent="center"
                      rowGap={2}
                      columnSpacing={2}
                    >
                
                    
                      <Grid item xs={12}  sm={6}>
                        <FormControl fullWidth>
                          <ModuleButton
                            module={values.moduleReceive}
                            onClick={(e) => {
                              setPropsSelectedModuleTo({
                                open: true,
                                moduleSelected: values.moduleDeliver,
                                moduleDisableds: [values.moduleSend],
                              })
                            }}
                          />
                          {meta.submitFailed && meta.errors.moduleReceive && (
                            <FormHelperText error>
                              <IntlMessage id={meta.errors.moduleReceive} />
                            </FormHelperText>
                          )}
                        </FormControl>
                      </Grid>
                    </Grid>

                    <AutocompleteMedicaments
                      medicaments={medicaments}
                      renderOption={(props, option) => (
                        <Box {...props} key={option.id} component="li">
                          {`${option.code} (${option.name}) ${option.unit.name}`}
                          <span style={{ color: 'red', marginLeft: '3px' }}>
                            <IntlMessage id="available" />:{' '}
                            {option.pivot.quantity_exist}
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
                  </Stack>
                  <Table sx={{ backgroundColor: 'white.main' }}>
                    <TableHead sx={{ backgroundColor: 'primary.dark' }}>
                      <TableRow>
                        <TableCell>
                          <IntlMessage id="code" />
                        </TableCell>
                        <TableCell>
                          <IntlMessage id="medicament" />
                        </TableCell>
                        <TableCell align="center">
                          <IntlMessage id="quantity" />
                        </TableCell>
                        <TableCell align="center">
                          <IntlMessage id="quantity_exist" />
                        </TableCell>
                        <TableCell align="center">
                          <IntlMessage id="afterTransfer" />
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
                                name={`${fieldName}.quantity`}
                                label="quantity"
                                validate={composeValidators(
                                  required,
                                  lessOrEqualThanValue(
                                    itemMed.pivot.quantity_exist,
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
                                    _.get(values, `${fieldName}.quantity`, 0) <=
                                  0
                                    ? 0
                                    : itemMed.pivot.quantity_exist -
                                      _.get(values, `${fieldName}.quantity`, 0)
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
                
                  <SelectionModuleModal
                    {...propsSelectedModuleTo}
                    modules={modules}
                    onClose={() => {
                      setPropsSelectedModuleTo({ open: false })
                    }}
                    onSelect={(value) => {
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