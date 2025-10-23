import React, { useState } from 'react';
import { Head, router } from '@inertiajs/react';
import AdminLayout from '@/Layouts/AdminLayout';
import InputBox from '@/Components/form/InputBox';
import Breadcrumb from '@/Components/Admin/Breadcrumb';

export default function PlanEdit({ plan, pageTitle }) {
    const [name, setName] = useState(plan.name || '');
    const [stripePriceId, setStripePriceId] = useState(plan.stripe_price_id || '');
    const [price, setPrice] = useState(plan.price || '');
    const [interval, setInterval] = useState(plan.interval || '');
    const [description, setDescription] = useState(plan.description || '');

    const handleSubmit = (e) => {
        e.preventDefault();
        router.put(route('app.plan.update', plan.id), {
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
            <Breadcrumb pageTitle={pageTitle} breadcrumb={[{ name: 'Plans', url: route('app.plan.index') }, { name: 'Edit' }]} />
            <div className="card">
                <div className="card-body">
                    <form onSubmit={handleSubmit}>
                        <div className="row">
                            <div className="col-md-6">
                                <InputBox labelName="Plan Name" name="name" value={name} onChange={e => setName(e.target.value)} />
                            </div>
                            <div className="col-md-6">
                                <InputBox labelName="Stripe Price ID" name="stripe_price_id" value={stripePriceId} onChange={e => setStripePriceId(e.target.value)} />
                            </div>
                            <div className="col-md-6">
                                <InputBox labelName="Price" name="price" value={price} onChange={e => setPrice(e.target.value)} />
                            </div>
                            <div className="col-md-6">
                                <InputBox labelName="Interval" name="interval" value={interval} onChange={e => setInterval(e.target.value)} />
                            </div>
                            <div className="col-md-12">
                                <InputBox labelName="Description" name="description" value={description} onChange={e => setDescription(e.target.value)} />
                            </div>
                        </div>
                        <div className="text-end mt-3">
                            <button type="submit" className="btn btn-primary btn-sm">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </AdminLayout>
    )
}
