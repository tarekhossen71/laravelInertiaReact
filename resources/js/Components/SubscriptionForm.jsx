import React, { useState } from 'react';
import { usePage, router } from '@inertiajs/react';
import { loadStripe } from '@stripe/stripe-js';

export default function SubscriptionForm() {
    const { plans } = usePage().props;
    const [selectedPlan, setSelectedPlan] = useState(plans[0] || null);

    const handleSubscribe = async (e) => {
        e.preventDefault();
        if(!selectedPlan) return alert('Select a plan');

        router.post(route('app.subscription.subscribe'), { plan_id: selectedPlan.id });
    }

    return (
        <form onSubmit={handleSubscribe}>
            <select value={selectedPlan?.id || ''} onChange={(e)=>setSelectedPlan(plans.find(p=>p.id == e.target.value))}>
                {plans.map(plan => <option key={plan.id} value={plan.id}>{plan.name} - ${plan.price}/{plan.interval}</option>)}
            </select>
            <button type="submit" className='btn btn-primary mt-2'>Subscribe</button>
        </form>
    )
}
