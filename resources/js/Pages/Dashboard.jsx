import React, { Fragment } from 'react';
import Authenticated from '@/Layouts/Authenticated';
import { Head } from '@inertiajs/inertia-react';
import NavBar from '@/Components/Common/NavBar';

export default function Dashboard(props) {
    return (
        <Fragment>
        <NavBar auth={props.auth} />
        </Fragment>
    );
}
