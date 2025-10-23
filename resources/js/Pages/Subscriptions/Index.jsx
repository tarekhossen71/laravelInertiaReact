import React from 'react';
import AdminLayout from '@/Layouts/AdminLayout';
import { Head, Link, usePage } from '@inertiajs/react';

export default function SubscriptionIndex({ subscriptions, pageTitle }) {
    const { flash } = usePage().props;

    return (
        <AdminLayout>
            <Head title={pageTitle} />
            <div className="card">
                <div className="card-header d-flex justify-content-between align-items-center">
                    <h4>{pageTitle}</h4>
                    <Link href={route('app.subscription.create')} className="btn btn-primary btn-sm">Subscribe</Link>
                </div>
                <div className="card-body">
                    {flash.success && <div className="alert alert-success">{flash.success}</div>}
                    <table className="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Plan Name</th>
                                <th>Price</th>
                                <th>Interval</th>
                                <th>Subscribed At</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            {subscriptions.length > 0 ? subscriptions.map((sub, idx) => (
                                <tr key={sub.id}>
                                    <td>{idx+1}</td>
                                    <td>{sub.name}</td>
                                    <td>${sub.price}</td>
                                    <td>{sub.interval}</td>
                                    <td>{sub.created_at}</td>
                                    <td>{sub.active ? 'Active' : 'Inactive'}</td>
                                </tr>
                            )) : (
                                <tr>
                                    <td colSpan="6" className="text-center">No subscriptions found.</td>
                                </tr>
                            )}
                        </tbody>
                    </table>
                </div>
            </div>
        </AdminLayout>
    );
}
