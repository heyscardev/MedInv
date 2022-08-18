import React, { Fragment, useMemo } from 'react';
import Authenticated from '@/Layouts/Authenticated';
import { Head } from '@inertiajs/inertia-react';
import NavBar from '@/Components/Common/NavBar';
import Table from '@/Components/Common/Table';

const data = [
    {
        name: {
            firstName: "John",
            lastName: "Doe",
        },
        address: "261 Erdman Ford",
        city: "East Daphne",
        state: "Kentucky",
    },
    {
        name: {
            firstName: "Jane",
            lastName: "Doe",
        },
        address: "769 Dominic Grove",
        city: "Columbus",
        state: "Ohio",
    },
    {
        name: {
            firstName: "Joe",
            lastName: "Doe",
        },
        address: "566 Brakus Inlet",
        city: "South Linda",
        state: "West Virginia",
    },
    {
        name: {
            firstName: "Kevin",
            lastName: "Vandy",
        },
        address: "722 Emie Stream",
        city: "Lincoln",
        state: "Nebraska",
    },
    {
        name: {
            firstName: "Joshua",
            lastName: "Rolluffs",
        },
        address: "32188 Larkin Turnpike",
        city: "Charleston",
        state: "South Carolina",
    },
];
export default function Dashboard(props) {
    const columns = useMemo(
        () => [
            {
                accessorKey: "name.firstName", //access nested data with dot notation
                header: "First Name",
            },
            {
                accessorKey: "name.lastName",
                header: "Last Name",
            },
            {
                accessorKey: "address", //normal accessorKey
                header: "Address",
            },
            {
                accessorKey: "city",
                header: "City",
            },
            {
                accessorKey: "state",
                header: "State",
            },
        ],
        []
    );
    return (
        <Fragment>
        <NavBar auth={props.auth} />


   <Table columns={columns} data={data} />
        </Fragment>
    );
}
