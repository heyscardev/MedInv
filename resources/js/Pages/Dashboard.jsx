import { get } from "@/HTTPProvider";
import { Fragment } from "react";
import {  } from "@inertiajs/inertia-react";
export default function Dashboard(props) {
  
  return (
    <Fragment>
      <button onClick={()=>{
        get(route('role.permises'));
      }}>hola</button>
    </Fragment>
  );
}
