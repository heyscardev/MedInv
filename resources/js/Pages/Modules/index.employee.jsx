
import Breadcrums from "@/Components/Common/Breadcrums"
import ModuleButton from "@/Components/Layouts/Modules/ModuleButton"
import { NavigateNext, Store } from "@mui/icons-material"
import { Grid, Container } from "@mui/material"

export default (props) => {


    return (
        <Container sx={{ padding: 1 }}>
           <Breadcrums links={[
            {name:"dashboard",route:"dashboard"},
            {name:"modules",route:"module.index"}
           ]}/>

            <Grid container spacing={4} display="flex" justifyContent={{sm:"center",md:"left"}}   >
                {props.data.map((module) => (
                    <Grid key={module.id} item xs={12} sm={8} md={6} lg={4} >
                        <ModuleButton module={module} />
                    </Grid>
                ))}
            </Grid>
        </Container>

    )
}
