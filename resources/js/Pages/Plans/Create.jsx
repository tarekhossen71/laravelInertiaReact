import React, { useState, useEffect } from 'react';
import { Head, router } from '@inertiajs/react';
import AdminLayout from '@/Layouts/AdminLayout';
import InputBox from '@/Components/form/InputBox';
import { toast, ToastContainer } from 'react-toastify';
import Breadcrumb from '@/Components/Admin/Breadcrumb';

export default function PlanCreate({ pageTitle }) {
    const [name, setName] = useState('');
    const [stripePriceId, setStripePriceId] = useState('');
    const [price, setPrice] = useState('');
    const [interval, setInterval] = useState('');
    const [description, setDescription] = useState('');

    const handleSubmit = (e) => {
        e.preventDefault();
        router.post(route('app.plan.store'), {
            name,
            stripe_price_id: stripePriceId,
            price,
            interval,
            description
        });
    };

    return (
        <AdminLayout>
            <Head title={pageTitle} />
            <ToastContainer position="top-right" autoClose={3000} />
            <Breadcrumb pageTitle={pageTitle} breadcrumb={[{ name: 'Plans', url: route('app.plan.index') }, { name: 'Create' }]} />
            <div className="card">
                <div className="card-body">
                    <form onSubmit={handleSubmit}>
                        <div className="row">
                            <div className="col-md-6">
                                <InputBox labelName="Plan Name" name="name" value={name} onChange={e => setName(e.target.value)} placeholder="Enter plan name" />
                            </div>
                            <div className="col-md-6">
                                <InputBox labelName="Stripe Price ID" name="stripe_price_id" value={stripePriceId} onChange={e => setStripePriceId(e.target.value)} placeholder="Stripe Price ID" />
                            </div>
                            <div className="col-md-6">
                                <InputBox labelName="Price" name="price" value={price} onChange={e => setPrice(e.target.value)} placeholder="Enter price" />
                            </div>
                            <div className="col-md-6">
                                <InputBox labelName="Interval" name="interval" value={interval} onChange={e => setInterval(e.target.value)} placeholder="monthly/yearly" />
                            </div>
                            <div className="col-md-12">
                                <InputBox labelName="Description" name="description" value={description} onChange={e => setDescription(e.target.value)} placeholder="Optional description" />
                            </div>
                        </div>
                        <div className="text-end mt-3">
                            <button type="submit" className="btn btn-primary btn-sm">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </AdminLayout>
    )
}
