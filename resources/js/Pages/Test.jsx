import FrontendLayout from '@/Layouts/FrontendLayout';
import { Link, Head } from '@inertiajs/react';
import { useEffect, useState } from 'react';

export default function Test({name}) {
    const [users, setUsers] = useState([]);
    useEffect(()=>{
        fetch('https://jsonplaceholder.typicode.com/users')
        .then(response => response.json())
        .then(data => setUsers(data))
        .catch(err => console.log(err))
    },[]);
    return (
        <>
            <Head title="test" />
            <div>
                <ul>
                    {users.map(user => (
                        <li key={user.id}>{user.name}</li>
                    ))}
                </ul>
            </div>
        </>
    );
}
