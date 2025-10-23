import React, { useState } from "react";
import FrontendLayout from "@/Layouts/FrontendLayout";
import { Head, usePage, router } from "@inertiajs/react";
import { loadStripe } from "@stripe/stripe-js";
import { Elements, CardElement, useStripe, useElements } from "@stripe/react-stripe-js";

export default function SubscriptionBuy({ plans, pageTitle }) {
    return (
        <FrontendLayout title={pageTitle}>
            <div className="row justify-content-center">
                <div className="col-lg-8">
                    <div className="card shadow-sm">
                        <div className="card-header bg-primary text-white">
                            <h4 className="mb-0">{pageTitle}</h4>
                        </div>
                        <div className="card-body">
                            <Elements stripe={loadStripe(import.meta.env.VITE_STRIPE_KEY)}>
                                <SubscriptionForm plans={plans} />
                            </Elements>
                        </div>
                    </div>
                </div>
            </div>
        </FrontendLayout>
    );
}

function SubscriptionForm({ plans }) {
    const stripe = useStripe();
    const elements = useElements();
    const [selectedPlan, setSelectedPlan] = useState(plans[0]?.id || null);
    const [loading, setLoading] = useState(false);
    const [error, setError] = useState("");

    const handleSubmit = async (e) => {
        e.preventDefault();
        if (!stripe || !elements) return;

        setLoading(true);
        setError("");

        const card = elements.getElement(CardElement);

        const { error, paymentMethod } = await stripe.createPaymentMethod({
            type: "card",
            card,
        });

        if (error) {
            setError(error.message);
            setLoading(false);
            return;
        }

        router.post(route("app.subscription.store"), {
            plan_id: selectedPlan,
            payment_method: paymentMethod.id,
        });
    };

    return (
        <form onSubmit={handleSubmit}>
            <div className="mb-3">
                <label className="form-label fw-semibold">Select a Plan</label>
                <select
                    className="form-select"
                    value={selectedPlan}
                    onChange={(e) => setSelectedPlan(e.target.value)}
                >
                    {plans.map((plan) => (
                        <option key={plan.id} value={plan.id}>
                            {plan.name} — ${plan.price} / {plan.interval}
                        </option>
                    ))}
                </select>
            </div>

            <div className="mb-3">
                <label className="form-label fw-semibold">Card Details</label>
                <div className="border p-3 rounded">
                    <CardElement options={{ hidePostalCode: true }} />
                </div>
            </div>

            {error && <div className="alert alert-danger">{error}</div>}

            <button
                type="submit"
                className="btn btn-primary w-100 mt-3"
                disabled={loading}
            >
                {loading ? "Processing..." : "Subscribe Now"}
            </button>
        </form>
    );
}
