import AsyncTable from "@/Components/Common/AsyncTable"
import IntlMessage from "@/Components/Common/IntlMessage"
import { Person } from "@mui/icons-material"
import { Grid, Paper, Typography } from "@mui/material"
import { Fragment } from "react"

export default (props) =>{

    console.log(props);

    return (
        <Fragment>
            {/* Doctor */}
            <Grid container padding={2}>
                <Grid item xs={12} sm={6} lg={4}>
                <Paper elevation={2} sx={{ padding: 1 }}>
                    <Typography
                    display="flex"
                    alignItems="center"
                    columnGap={1}
                    variant="h6"
                    color="primary"
                    >
                    <Person />
                    <IntlMessage id={'doctor'} />: {props.doctor.first_name} {props.doctor.last_name}
                    </Typography>
                </Paper>
                </Grid>
            </Grid>

            {/* asyncronous table for view and filters for recipes of doctor */}
            <AsyncTable
                routeName={route().current()}
                routeParams={{ doctor: props.doctor.id }}
                // renderTopToolbarCustomActions={ActionsTableShow(props.doctor)}
                enableRowSelection={false}
                // onAsync={tableUpdate}
                data={props.recipes}
                initialState={{ columnVisibility: { id: true } }}
                columns={[
                { accessorKey: 'id', header: 'id' },
                {
                    accessorKey: 'patient',
                    header: 'patient',
                    accessorFn: ({ patient: { first_name, last_name } }) => {
                        return first_name ? `${first_name} ${last_name}` : ''
                    },
                },
                {
                    accessorKey: 'pathology.name',
                    header: 'pathology',
                },
                {
                    accessorKey: 'recipe_type',
                    header: 'type'
                },
                {
                    accessorKey: 'module.name',
                    header: 'module',
                },
                ]}
            />
        </Fragment>
    )
}
