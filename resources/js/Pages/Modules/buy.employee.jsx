import Breadcrums from "@/Components/Common/Breadcrums";
import InputText from "@/Components/Common/Inputs/InputText";
import IntlMessage from "@/Components/Common/IntlMessage";
import IconButton from "@/Components/Custom/IconButton";
import IntlFormatCurrency from "@/Components/Custom/IntlFormatCurrency";
import EditMedicamentModal from "@/Components/Layouts/Medicaments/EditMedicamentModal";
import {
    composeValidators,
    greaterOrEqualValue,
    required
} from "@/Config/InputErrors";
import { post } from "@/HTTPProvider";
import { Add, Clear } from "@mui/icons-material";
import {
    Autocomplete,
    Button,
    Grid,
    Stack,
    Table,
    TableBody,
    TableCell,
    TableHead,
    TableRow,
    TextField
} from "@mui/material";
import { Box } from "@mui/system";
import arrayMutators from "final-form-arrays";
import _ from "lodash";
import { Fragment, useState } from "react";
import { Form } from "react-final-form";
import { FieldArray } from "react-final-form-arrays";

const submit = (values) => {
    const dataToSend = {
        description: values.description,
        medicaments: values.medicaments,
    };
    post(route("module.buy.store", values.moduleId), dataToSend);
};
export default (props) => {
    const { data, module, can } = props;
    return (
        <Fragment>
            <Breadcrums
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
            />

            <Form
                onSubmit={submit}
                mutators={{ ...arrayMutators }}
                initialValues={{ moduleId: module.id, description: null }}
                render={({ handleSubmit, values, form }) => (
                    <form onSubmit={handleSubmit}>
                        <FieldArray name="medicaments">
                            {({ fields }) => (
                                <Stack spacing={2} padding={4}>
                                    <Stack
                                        bgcolor="white.main"
                                        borderRadius={2}
                                        padding={1}
                                    >
                                        <AutocompleteMedicaments
                                            medicamentsOptions={
                                                props.medicaments
                                            }
                                            units={props.units}
                                            pushMedicament={fields.push}
                                            onChange={(e, value) => {
                                                if (
                                                    value &&
                                                    !_.find(
                                                        values.medicaments,
                                                        {
                                                            id: value.id,
                                                        }
                                                    )
                                                )
                                                    fields.push(value);
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
                                    <Table
                                        sx={{ backgroundColor: "white.main" }}
                                    >
                                        <TableHead sx={{backgroundColor:"primary.dark"}}>
                                            <TableRow >
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
                                                    <IntlMessage id="price" />
                                                </TableCell>
                                                <TableCell align="center">
                                                    <IntlMessage id="totalPrice" />
                                                </TableCell>
                                                <TableCell />
                                            </TableRow>
                                        </TableHead>
                                        <TableBody>
                                            {fields.map((fieldName, index) => {
                                                const itemMed = _.get(
                                                    values,
                                                    fieldName
                                                );
                                                return (
                                                    <TableRow key={itemMed.id}>
                                                        <TableCell>
                                                            {itemMed.code}
                                                        </TableCell>
                                                        <TableCell>
                                                            {itemMed.name}
                                                        </TableCell>
                                                        <TableCell
                                                            align="center"
                                                            width={200}
                                                        >
                                                            <InputText
                                                                name={`${fieldName}.quantity`}
                                                                label="quantity"
                                                                validate={composeValidators(
                                                                    required
                                                                )}
                                                                inputProps={{
                                                                    autoComplete:
                                                                        "off",
                                                                }}
                                                                onlyNumbers
                                                            />
                                                        </TableCell>
                                                        <TableCell
                                                            align="center"
                                                            width={200}
                                                        >
                                                            <InputText
                                                                name={`${fieldName}.price`}
                                                                label="price"
                                                                validate={composeValidators(
                                                                    required,
                                                                    greaterOrEqualValue(
                                                                        0
                                                                    )
                                                                )}
                                                                errorValues={{
                                                                    greaterOrEqualValue: 0,
                                                                }}
                                                                inputProps={{
                                                                    autoComplete:
                                                                        "off",
                                                                }}
                                                                onlyNumbersWithFloat
                                                            />
                                                        </TableCell>
                                                        <TableCell>
                                                            <IntlFormatCurrency
                                                                value={
                                                                    _.get(
                                                                        values,
                                                                        `${fieldName}.price`,
                                                                        0
                                                                    ) *
                                                                    _.get(
                                                                        values,
                                                                        `${fieldName}.quantity`,
                                                                        0
                                                                    )
                                                                }
                                                            />
                                                        </TableCell>
                                                        <TableCell align="center">
                                                            <IconButton
                                                                onClick={() => {
                                                                    fields.remove(
                                                                        index
                                                                    );
                                                                }}
                                                            >
                                                                <Clear color="error" />
                                                            </IconButton>
                                                        </TableCell>
                                                    </TableRow>
                                                );
                                            })}
                                        </TableBody>
                                    </Table>
                                    <Button
                                        disabled={
                                            !values.medicaments ||
                                            values.medicaments.maxLength <= 0
                                        }
                                        variant="contained"
                                        color="primary"
                                        type="submit"
                                    >
                                        <IntlMessage id="endBuy" />
                                    </Button>
                                </Stack>
                            )}
                        </FieldArray>
                    </form>
                )}
            />
        </Fragment>
    );
};

const AutocompleteMedicaments = ({
    medicamentsOptions,
    units,
    onChange,
    can,
    pushMedicament,
}) => {
    const [openEdit, setOpenEdit] = useState(false);
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
                    autoHighlight
                    clearOnEscape
                    openOnFocus
                    onChange={onChange}
                    getOptionLabel={(option) => option.code + option.name}
                    renderOption={(props, option) => (
                        <Box component="li" {...props}>
                            {option.code} ({option.name})
                        </Box>
                    )}
                    renderInput={(params) => (
                        <TextField
                            {...params}
                            id="medicamentAutocompletText"
                            label="Seleccion de medicamentos"
                            inputProps={{
                                ...params.inputProps,
                                autoComplete: "off", // disable autocomplete and autofill
                            }}
                        />
                    )}
                />
            </Grid>
            <Grid item>
                <IconButton
                    disabled={!can("medicament.store")}
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
                open={openEdit}
                onClose={() => setOpenEdit(false)}
            />
        </Grid>
    );
};
