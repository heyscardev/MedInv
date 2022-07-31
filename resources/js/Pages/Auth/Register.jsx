import React, { useEffect } from "react";
import ValidationErrors from "@/Components/ValidationErrors";
import { Head, Link, useForm } from "@inertiajs/inertia-react";
import { Field, Form } from "react-final-form";
import Input from "@/Components/Inputs/InputText";
import DatePicker from "@/Components/Inputs/DatePicker";
import { validDate, composeValidators, required, dateGreaterOrEqual, dateLessOrEqual, email } from "@/Config/InputErrors";
import { addYears } from "date-fns";
import CheckBox from "@/Components/Inputs/CheckBox";

export default function Register() {
  const { data, setData, post, processing, errors, reset } = useForm({
    c_i: "",
    first_name: "hola",
    last_name: "",
    birth_date: "",
    gender: "",
    email: "",
    password: "",
    password_confirmation: "",
    phone: "",
    direction: "",
  });

  useEffect(() => {
    return () => {
      reset("password", "password_confirmation");
    };
  }, []);

  const onHandleChange = (event) => {
    setData(event.target.name, event.target.type === "checkbox" ? event.target.checked : event.target.value);
  };

  const submit = (e) => {
    e.preventDefault();

    post(route("register"));
  };

  return (
    <>
      <Head title="RegistroUsuario" />

      <ValidationErrors errors={errors} />
      <Form
        initialValues={{ birth_date: Date.now() }}
        onSubmit={() => {
          console.log("submit");
        }}
        render={({ handleSubmit, values }) => (
          <form onSubmit={handleSubmit}>
            {console.log(values)}
            <Input name="c_i" label="cedula" validate={composeValidators(required)} onlyNumbers maxLength={8} />
            <Input name="first_name" label="Nombre" validate={composeValidators(required)} maxLength={80}/>
            <Input name="last_name" label="Apellido" validate={composeValidators(required)} maxLength={80}/>
            <Input name="email" label="Correo" validate={composeValidators(required,email)} />
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

      {/* <form onSubmit={submit}>
            <Field 
            name='input.hola'
            render={({input})=>(
                <div>
                <Label forInput="first_name" value="Nombre" />

                <Input
                    type="text"
                    name="first_name"
                    value={data.first_name}
                    className="mt-1 block w-full"
                    autoComplete="name"
                    isFocused={true}
                    handleChange={onHandleChange}
                    required
                />
            </div>
            )}
            />   
                <div>
                    <Label forInput="last_name" value="Apellido" />

                    <Input
                        type="text"
                        name="last_name"
                        value={data.last_name}
                        className="mt-1 block w-full"
                        autoComplete="name"
                        isFocused={true}
                        handleChange={onHandleChange}
                        required
                    />
                </div>

                <div className="mt-4">
                    <Label forInput="email" value="Email" />

                    <Input
                        type="email"
                        name="email"
                        value={data.email}
                        className="mt-1 block w-full"
                        autoComplete="username"
                        handleChange={onHandleChange}
                        required
                    />
                </div>

                <div className="mt-4">
                    <Label forInput="password" value="Password" />

                    <Input
                        type="password"
                        name="password"
                        value={data.password}
                        className="mt-1 block w-full"
                        autoComplete="new-password"
                        handleChange={onHandleChange}
                        required
                    />
                </div>

                <div className="mt-4">
                    <Label forInput="password_confirmation" value="Confirm Password" />

                    <Input
                        type="password"
                        name="password_confirmation"
                        value={data.password_confirmation}
                        className="mt-1 block w-full"
                        handleChange={onHandleChange}
                        required
                    />
                </div>

                <div className="flex items-center justify-end mt-4">
                    <Link href={route('login')} className="underline text-sm text-gray-600 hover:text-gray-900">
                        Already registered?
                    </Link>

                    <Button className="ml-4" processing={processing}>
                        Register
                    </Button>
                </div>
            </form> */}
    </>
  );
}
