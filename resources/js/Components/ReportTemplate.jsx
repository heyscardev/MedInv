import { Download } from '@mui/icons-material'
import {
  Paper,
  AppBar,
  useTheme,
  Container,
  Grid,
  Typography,
  Divider,
} from '@mui/material'
import { format } from 'date-fns'
import IntlMessage from './Common/IntlMessage'
import MultiButton from './Common/MultiButton'
import Head from './Custom/Head'
import LogoTypography from './LogoTypography'
import jsPDF from 'jspdf'
import { useRef } from 'react'
import { useIntl } from 'react-intl'

const styles = {
    page: {
        marginLeft: '3rem',
        marginRight: '3rem',
        'page-break-after': 'always',
    },

    columnLayout: {
        display: 'flex',
        justifyContent: 'space-between',
        margin: '3rem 0 5rem 0',
        gap: '2rem',
    },

    column: {
        display: 'flex',
        flexDirection: 'column',
    },

    spacer2: {
        height: '2rem',
    },

    fullWidth: {
        width: '100%',
    },

    marginb0: {
        marginBottom: 0,
    },
};
const ReportTemplate = ({ start_date, end_date, children,nameReport = 'report', orientation = 'p'  }) => {
  const { palette } = useTheme()
  const {formatMessage} = useIntl();
  const reportTemplateRef = useRef(null);

  const handleGeneratePdf = () => {

    //Remove TopToobar before the print
    const topToolbar = Array.from( document.getElementsByClassName("MuiToolbar-root css-xcubvc-MuiToolbar-root") );
    topToolbar.forEach((element) => {
      element.remove();
    });

    const doc = new jsPDF(orientation);  //p, pt, a4, landscape

    doc.html(reportTemplateRef.current, {
        margin:8,
        html2canvas: {
            scale: orientation == 'landscape' ? 0.256 : 0.177
        },
        async callback(doc) {
            await doc.save(formatMessage({id:nameReport}));
        },
    });
};

  return (
    <>
      <Head title={nameReport} />
      <Container sx={{marginTop:4,justifyContent:"center",display:"flex"}}>
        <Paper ref={reportTemplateRef} sx={{ width: '1100px', minHeight: '220px' }}>
          <AppBar
            position="relative"
            sx={{
              color: palette.white.main,
              backgroundColor: palette.primary.dark,
              padding:2,
              textAlign:'center'
            }}
          >
            <Grid container>
                <Grid item xs={8} padding={2}>
                    <LogoTypography colorSubtitle="success.main" justifyContent="left" />
                </Grid>
                <Grid item xs={4} display="block" padding={2} paddingTop={4}>
                    <Typography variant="h4" color={palette.primary.light} sx={{ fontWeight:"bold", textTransform:"uppercase", lineHeight:1.3 }} >
                        <IntlMessage id={'report'} />
                    </Typography>
                    <Typography variant="h5" color={palette.success.main} children={formatMessage({id:nameReport})} ></Typography>
                </Grid>

                <Grid item xs={12} paddingBottom={2}>
                    <Divider sx={{ height:0, width: '100%', opacity: 0.7, background: palette.primary.light, color: palette.primary.light, borderColor: palette.primary.light }} />
                </Grid>

                <Grid item xs={9} display="flex" justifyContent="star">
                    <Typography variant="h6" sx={{ textAlign:'left', fontSize:'.8rem', paddingLeft:1 }}>
                        <IntlMessage id={'report_date'} />:
                        <div>
                            {start_date
                                ? format(new Date(start_date), 'dd MMMM yyyy')
                                : ' -- ---- ----'}
                            {' al '}
                            {end_date
                                ? format(new Date(end_date), 'dd MMMM yyyy')
                                : ' -- ---- ----'}
                        </div>
                    </Typography>
                </Grid>
                <Grid item xs={3} display="flex" justifyContent="end">
                    <Typography variant="h6" sx={{ textAlign:'left', fontSize:'.8rem', paddingRight:1 }}>
                        <IntlMessage id={'emission_date'} />:
                        <div> {format(new Date(),"hh:mm:aa dd MMMM yyyy")} </div>
                    </Typography>
                </Grid>
            </Grid>
          </AppBar>
          <Grid container padding={2}>
            <Grid item xs={12}>
              {children}
            </Grid>
          </Grid>
        </Paper>
        <MultiButton
          actions={[
            {
              icon: <Download />,
              name: 'download',
              onClick: handleGeneratePdf
            }
          ]}
        />
      </Container>
    </>
  )
}
export default ReportTemplate
