import { Masks } from "@mui/icons-material"
import { Stack } from "@mui/material"

export default ({data})=>{
    return (
        <>
 
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
             
        </>
    )
}