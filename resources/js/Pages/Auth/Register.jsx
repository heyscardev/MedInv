import React, { useState } from "react";
import {parallel} from 'async'
import _ from 'lodash'
import { Head } from "@inertiajs/inertia-react";
import { Form } from "react-final-form";
import Input from "@/Components/Common/Inputs/InputText";
import PasswordField from "@/Components/Common/Inputs/PasswordField";
import DatePicker from "@/Components/Common/Inputs/DatePicker";
import {
  validDate,
  composeValidators,
  required,
  dateGreaterOrEqual,
  dateLessOrEqual,
  email,
  passwordWeakValidation,
  passwordEqual,
} from "@/Config/InputErrors";
import { addYears, format } from "date-fns";
import CheckBox from "@/Components/Common/Inputs/CheckBox";
import { Inertia } from "@inertiajs/inertia";

export default function Register() {
   const [time,setTime] = useState(Date.now())
  const submit = async (data, form,setErrors) => {
  let error = null
    
    const dataToSend = {
      ...data,
      birth_date: format(data.birth_date, "yyyy-MM-dd"),
    };


    const iner = await Inertia.post(route("register"), dataToSend,{
      preserveState:true,
      onError:(state)=>{
        setErrors(state)
      }
    });
  }; 

  return (
    <>
      <Head title="RegistroUsuario" />
      <Form
      initialValues={{birth_date:time}}
        onSubmit={submit}
        render={({ handleSubmit,form }) => (
          <form onSubmit={handleSubmit} autoComplete="off">
            {(form.getState().submitErrors) && _.map(form.getState().submitErrors,(error)=>(
<h1 color="red">{error}</h1>
            ))}
            <Input
              name="c_i"
              label="cedula"
              autoComplete="nope"
              validate={composeValidators(required)}
              onlyNumbers
              maxLength={8}
            />

            <Input
              name="first_name"
              label="Nombre"
              autoComplete="nope"
              validate={composeValidators(required)}
              maxLength={80}
            />

            <Input
              name="last_name"
              label="Apellido"
              autoComplete="nope"
              validate={composeValidators(required)}
              maxLength={80}
            />

            <Input
              name="email"
              label="email"
              autoComplete="nope"
              spellCheck={false}
              validate={composeValidators(required, email)}
              type="email"
            />

            <PasswordField
              name="password"
              label="password"
              autoComplete="new-password"
              spellCheck={false}
              validate={composeValidators(required, passwordWeakValidation)}
            />

            <PasswordField
              name="password_confirmation"
              label="password_confirmation"
              autoComplete="new-password"
              spellCheck={false}
              validate={composeValidators(required, passwordWeakValidation, passwordEqual("password"))}
            />

            <DatePicker
              name="birth_date"
              label="fecha de nacimiento"
              maxDate={Date.now()}
              minDate={addYears(Date.now(), -150)}
              validate={composeValidators(
                required,
                validDate,
                dateGreaterOrEqual(addYears(Date.now(), -150)),
                dateLessOrEqual(Date.now())
              )}
            />

            <CheckBox name="gender" label="Hombre" value="Male" />
            <CheckBox name="gender" label="Mujer" value="Female" />

            <button type="submit">submit</button>
          </form>
        )}
      />
    </>
  );
}
