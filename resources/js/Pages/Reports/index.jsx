import IntlMessage from '@/Components/Common/IntlMessage'
import SectionTitle from '@/Components/Common/SectionTitle'
import Autocomplete from '@/Components/Custom/Autocomplete'
import Head from '@/Components/Custom/Head'
import { Box, Container, Grid } from '@mui/material'
import { Form } from 'react-final-form'
import { useIntl } from 'react-intl'

export default ({ reportTypes = [] }) => {
    const {formatMessage} = useIntl();
  return (
    <>
      <Head title="reports" />
      <SectionTitle title="reports" />
      <Container>
        <Form onSubmit={() => {}}>
          {({ handleSubmit, values }) => (
            <form onSubmit={handleSubmit}>
                <Grid container>
                    <Grid item xs={12}>
                         <Autocomplete
                name="reportType"
                label="reportType"
                options={reportTypes}
                getOptionLabel={(option) => formatMessage({id:option}) }
                renderOption={(props, option) => (
                  <Box {...props}   >
                  <IntlMessage id={option} />
                  </Box>
                )}
              />
                    </Grid>
                </Grid>
            </form>
          )}
        </Form>
      </Container>
    </>
  )
}
