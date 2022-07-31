import React from "react";
import { Form } from "react-final-form";
import { Head, Link, useForm } from '@inertiajs/inertia-react';



const CustomForm = ({initialValues = [],onSubmit})=>{


    return (
    <Form
    onSubmit={onSubmit}
    initialValues={initialValues}
    >

    </Form>
    );
}