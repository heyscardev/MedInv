import { Delete } from '@mui/icons-material'
import { Box } from '@mui/material'
import Tooltip from '../Custom/Tooltip'

const EntityDelete = ({ deleted_at, children }) => {
  return deleted_at ? (
    <Tooltip bgColor="error.light" title="recurseDeleted">
      <Box
        borderRadius={2}
        padding={'5px 10px'}
        gap="8px"
        minWidth="130px"
        color="#700000"
        display="flex"
        justifyContent="space-between"
        alignItems="center"
        bgcolor={'error.light'}
      >
        {children} <Delete />
      </Box>
    </Tooltip>
  ) : (
    children
  )
}
export default EntityDelete
