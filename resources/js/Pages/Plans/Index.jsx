import React from 'react';
import { Head, Link } from '@inertiajs/react';
import AdminLayout from '@/Layouts/AdminLayout';
import Breadcrumb from '@/Components/Admin/Breadcrumb';

export default function PlanIndex({ plans, pageTitle }) {
    return (
        <AdminLayout>
            <Head title={pageTitle} />
            <Breadcrumb pageTitle={pageTitle} breadcrumb={[{ name: 'Plans' }]} />

            <div className="card">
                <div className="card-header d-flex justify-content-between align-items-center">
                    <h3>{pageTitle}</h3>
                    <Link href={route('app.plan.create')} className="btn btn-primary btn-sm">Add Plan</Link>
                </div>

                <div className="card-body">
                    <table className="table table-bordered">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Interval</th>
                                <th>Stripe Plan ID</th>
                                <th className='text-end'>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {plans.map((plan, idx) => (
                                <tr key={plan.id}>
                                    <td>{idx+1}</td>
                                    <td>{plan.name}</td>
                                    <td>${plan.price}</td>
                                    <td>{plan.interval}</td>
                                    <td>{plan.stripe_plan_id}</td>
                                    <td className='text-end'>
                                        <Link href={route('app.plan.edit', plan.id)} className="btn btn-sm btn-primary me-1">Edit</Link>
                                        <Link href={route('app.plan.destroy', plan.id)} method="delete" as="button" className="btn btn-sm btn-danger">Delete</Link>
                                    </td>
                                </tr>
                            ))}
                        </tbody>
                    </table>
                </div>
            </div>
        </AdminLayout>
    )
}
