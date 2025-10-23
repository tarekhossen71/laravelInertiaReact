import React, { useState } from 'react';
import AdminLayout from '@/Layouts/AdminLayout';
import { Head, usePage, router } from '@inertiajs/react';
import { loadStripe } from '@stripe/stripe-js';
import { Elements, CardElement, useStripe, useElements } from '@stripe/react-stripe-js';

export default function SubscriptionCreate({ plans, pageTitle }) {
    const { flash } = usePage().props;

    return (
        <AdminLayout>
            <Head title={pageTitle} />
            <div className="card">
                <div className="card-header">
                    <h4>{pageTitle}</h4>
                </div>
                <div className="card-body">
                    {flash.success && <div className="alert alert-success">{flash.success}</div>}
                    <Elements stripe={loadStripe(import.meta.env.VITE_STRIPE_KEY)}>
                        <StripeForm plans={plans} />
                    </Elements>
                </div>
            </div>
        </AdminLayout>
    );
}

function StripeForm({ plans }) {
    const stripe = useStripe();
    const elements = useElements();
    const [selectedPlan, setSelectedPlan] = useState(plans[0]?.id || null);
    const [loading, setLoading] = useState(false);

    const handleSubmit = async (e) => {
        e.preventDefault();
        if(!stripe || !elements) return;

        setLoading(true);

        const card = elements.getElement(CardElement);

        const { error, paymentMethod } = await stripe.createPaymentMethod({
            type: 'card',
            card: card
        });

        if(error){
            alert(error.message);
            setLoading(false);
            return;
        }

        router.post(route('app.subscription.store'), {
            plan_id: selectedPlan,
            payment_method: paymentMethod.id
        });
    };

    return (
        <form onSubmit={handleSubmit}>
            <div className="mb-3">
                <label>Choose Plan</label>
                <select className="form-control" value={selectedPlan} onChange={(e)=>setSelectedPlan(e.target.value)}>
                    {plans.map(p => (
                        <option key={p.id} value={p.id}>{p.name} - ${p.price}/{p.interval}</option>
                    ))}
                </select>
            </div>
            <div className="mb-3">
                <label>Card Details</label>
                <CardElement className="form-control p-2 border"/>
            </div>
            <button className="btn btn-primary" type="submit" disabled={loading}>
                {loading ? 'Processing...' : 'Subscribe'}
            </button>
        </form>
    );
}
