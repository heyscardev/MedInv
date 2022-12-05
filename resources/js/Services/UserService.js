import { post } from "@/HTTPProvider"
import toast from "react-hot-toast"

const logout = ()=> post( route('logout'),null,{preventSuccess:true,onSuccess:(e)=>{toast.success('Adios!')}} )

//const login = ({email,password,remember})=>

export {
    logout
}
