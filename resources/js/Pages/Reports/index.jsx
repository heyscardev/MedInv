import Autocomplete from '@/Components/Common/Inputs/Autocomplete'
import DatePicker from '@/Components/Common/Inputs/DatePicker'
import IntlMessage from '@/Components/Common/IntlMessage'
import SectionTitle from '@/Components/Common/SectionTitle'
import Head from '@/Components/Custom/Head'
import { composeValidators, required, validDate } from '@/Config/InputErrors'
import { get } from '@/HTTPProvider'
import { Box, Button, Container, Grid, Paper } from '@mui/material'
import { Form } from 'react-final-form'
import { useIntl } from 'react-intl'

export default ({ reportTypes = [] }) => {
  const { formatMessage } = useIntl()
  return (
    <>
      <Head title="reports" />
      <SectionTitle title="reports" />
      <Container>
        <Form onSubmit={({report_type,start_date,end_date}) => {
          const formatEndDate = new Date(new Date(end_date).setHours(23,59,59));
         
         get(route('report.show',{report_type,start_date,end_date:formatEndDate,}),{})
        }}>
          {({ handleSubmit, values }) => (
            <form onSubmit={handleSubmit}>
              <Paper elevation={2} sx={{ padding: 1,marginTop:2 }} >
                <Grid container justifyContent="space-around">
                  <Grid item xs={12}>
                    <Autocomplete
                      fullWidth
                      name="report_type"
                      label="reportType"
                      validate={required}
                      options={reportTypes}
                      getOptionLabel={(option) => formatMessage({ id: option })}
                      renderOption={(props, option) => (
                        <Box {...props}>
                          <IntlMessage id={option} />
                        </Box>
                      )}
                    />
                  </Grid>
                  <Grid item>
                    <DatePicker
                      name="start_date"
                      label="start_date"
                      validate={composeValidators(required, validDate)}
                    />
                  </Grid>
                  <Grid item>
                    <DatePicker
                      name="end_date"
                      label="end_date"
                      validate={composeValidators(required, validDate)}
                    />
                  </Grid>
                </Grid>
              </Paper>
              <Grid container justifyContent="space-around" marginTop={2}>
                <Grid item xs={12}>
                  <Button
                    fullWidth
                    sx={{ color: '#fff' }}
                    variant="contained"
                    type="submit"
                  >
                    <IntlMessage id="generateReport" />
                  </Button>
                </Grid>
              </Grid>
            </form>
          )}
        </Form>
      </Container>
    </>
  )
}
