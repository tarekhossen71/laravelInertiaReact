import AdminLayout from '@/Layouts/AdminLayout';
import { Head } from '@inertiajs/react';

export default function Dashboard({ auth }) {
    return (
        <AdminLayout>
            <Head title="Dashboard" />
            {/* <h1 className="mb-4">Welcome to Dashboard</h1> */}
            <div className="card p-4">
                <p>This is your Laravel + Inertia + React + Html layout!</p>
            </div>
        </AdminLayout>
    );
}
