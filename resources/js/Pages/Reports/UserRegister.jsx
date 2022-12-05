import ReportTemplate from "@/Components/ReportTemplate";

export default ({users,totalUsers,start_date,end_date})=>{
    return <ReportTemplate {...{start_date,end_date}} >

    </ReportTemplate>;
}