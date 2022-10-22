import { Stack } from "@mui/material"
import { isValid } from "date-fns"
import DatePicker from "../Inputs/DatePicker"


export default({ column }) => {
    const filterValue = column.getFilterValue() || []
    return (
      <Stack direction="row">
        <DatePicker
        placeholder="Min"
        variant='standard'
          marginRight={1}
          noFinalForm
          value={
            column.getFilterValue()
              ? column.getFilterValue()[0]  || null
              : null
          }
          onChange={(e) => {
            if (isValid(e)) {
              filterValue[0] = e
            } else filterValue[0] = null
            column.setFilterValue(!filterValue[0] && !filterValue[1]?null:filterValue)
          }}
        />
        <DatePicker
          noFinalForm
          variant='standard'
          placeholder="Max"
          value={
            column.getFilterValue()
              ? column.getFilterValue()[1] || null
              : null
          }
          onChange={(e) => {
            if (isValid(e)) {
              filterValue[1] = e
            } else filterValue[1] = null
            column.setFilterValue(!filterValue[0] && !filterValue[1]?null:filterValue)
          }}
        />
      </Stack>
    )}