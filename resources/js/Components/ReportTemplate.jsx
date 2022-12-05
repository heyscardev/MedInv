import { Download } from '@mui/icons-material'
import {
  Paper,
  AppBar,
  useTheme,
  Container,
  Grid,
  Typography,
} from '@mui/material'
import { format } from 'date-fns'
import IntlMessage from './Common/IntlMessage'
import MultiButton from './Common/MultiButton'
import Head from './Custom/Head'
import LogoTypography from './LogoTypography'
import jsPDF from 'jspdf'
import { useRef } from 'react'

const styles = {
    page: {
        marginLeft: '5rem',
        marginRight: '5rem',
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
const ReportTemplate = ({ start_date, end_date, nameReport = 'report' }) => {
  const { palette } = useTheme()
  const reportTemplateRef = useRef(null);
  const handleGeneratePdf = () => {
    const doc = new jsPDF({
        format: 'a4',
        unit: 'px',
    });

    // Adding the fonts.
    doc.setFont('Inter-Regular', 'normal');

    doc.html(reportTemplateRef.current, {
        async callback(doc) {
            await doc.save(nameReport);
        },
    });
};

  return (
    <>
      <Head title="reports" />
      <Container>
        <Paper  ref={reportTemplateRef} sx={{ margin: 0, width: '100%', minHeight: '300px',...styles }}>
          <AppBar
            position="relative"
            sx={{
              background: palette.secondaryGradient.main,
              backgroundColor: 'transparent',
            }}
          >
            <LogoTypography subtitle={nameReport} colorSubtitle="error.main" />
          </AppBar>
          <Grid container padding={2}>
            <Grid item xs={12} display="flex" justifyContent="end">
              <Typography
                variant="span"
                textAlign="right"
                color="secondary.dark"
              >
                <IntlMessage id={'start_date'} />:{' '}
                {start_date
                  ? format(new Date(start_date), 'dd MMMM yyyy')
                  : ' -- ---- ----'}
              </Typography>
            </Grid>
            <Grid item xs={12} display="flex" justifyContent="end">
              <Typography
                variant="span"
                textAlign="right"
                color="secondary.dark"
              >
                <IntlMessage id={'end_date'} />:{' '}
                {end_date
                  ? format(new Date(end_date), 'dd MMMM yyyy')
                  : ' -- ---- ----'}
              </Typography>
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
