import React, { useEffect } from "react";
import { Head, Link, useForm, usePage } from "@inertiajs/react";
import AdminLayout from "@/Layouts/AdminLayout";
import Breadcrumb from "@/Components/Admin/Breadcrumb";
import InputBox from "@/Components/form/InputBox";
import SelectBox from "@/Components/form/SelectBox";
import { toast, ToastContainer } from "react-toastify";

export default function ProductEdit({ pageTitle, statuses }) {
    const { product, flash, errors } = usePage().props;

    const { data, setData, post, processing } = useForm({
        name: product.name || "",
        sku: product.sku || "",
        price: product.price || "",
        description: product.description || "",
        status: product.status || "active",
    });

    const handleSubmit = (e) => {
        e.preventDefault();
        post(route("app.product.update", product.id));
    };

    // Flash Messages
    useEffect(() => {
        if (flash?.success) toast.success(flash.success);
        if (flash?.error) toast.error(flash.error);
    }, [flash]);

    return (
        <AdminLayout>
            <Head title={pageTitle} />

            <ToastContainer
                position="top-right"
                autoClose={3000}
                hideProgressBar={false}
                newestOnTop={true}
                closeOnClick
                pauseOnHover
                theme="colored"
            />

            <Breadcrumb
                pageTitle={pageTitle}
                breadcrumb={[
                    { name: "Products", url: route("app.product.index") },
                    { name: "Edit" },
                ]}
            />

            <div className="row">
                <div className="col-md-12">
                    <div className="card">
                        <div className="card-header border-bottom p-3 d-flex justify-content-between align-items-center">
                            <h4 className="mb-0">{pageTitle}</h4>
                            <Link
                                href={route("app.product.index")}
                                className="btn btn-primary btn-sm"
                            >
                                Back
                            </Link>
                        </div>

                        <div className="card-body p-3">
                            {flash?.success && (
                                <div className="alert alert-success">{flash.success}</div>
                            )}

                            <form onSubmit={handleSubmit}>
                                <div className="row">
                                    {/* Product Name */}
                                    <div className="col-md-4">
                                        <InputBox
                                            labelName="Product Name"
                                            name="name"
                                            value={data.name}
                                            onChange={(e) => setData("name", e.target.value)}
                                            errors={errors}
                                            showStar="required"
                                            placeholder="Enter Product Name"
                                        />
                                    </div>

                                    {/* SKU */}
                                    <div className="col-md-4">
                                        <InputBox
                                            labelName="SKU"
                                            name="sku"
                                            value={data.sku}
                                            onChange={(e) => setData("sku", e.target.value)}
                                            errors={errors}
                                            showStar="required"
                                            placeholder="Enter SKU"
                                        />
                                    </div>

                                    {/* Price */}
                                    <div className="col-md-4">
                                        <InputBox
                                            type="number"
                                            labelName="Price"
                                            name="price"
                                            value={data.price}
                                            onChange={(e) => setData("price", e.target.value)}
                                            errors={errors}
                                            showStar="required"
                                            placeholder="Enter Price"
                                        />
                                    </div>

                                    {/* Description */}
                                    <div className="col-md-12">
                                        <label className="form-label fw-semibold">Description</label>
                                        <textarea
                                            name="description"
                                            className={`form-control ${
                                                errors.description ? "is-invalid" : ""
                                            }`}
                                            rows="4"
                                            value={data.description}
                                            onChange={(e) =>
                                                setData("description", e.target.value)
                                            }
                                            placeholder="Enter product description..."
                                        ></textarea>
                                        {errors.description && (
                                            <div className="invalid-feedback">
                                                {errors.description}
                                            </div>
                                        )}
                                    </div>
                                </div>

                                {/* Submit Button */}
                                <div className="text-end mt-3">
                                    <button
                                        type="submit"
                                        disabled={processing}
                                        className="btn btn-primary btn-sm rounded-0"
                                    >
                                        {processing ? "Updating..." : "Update"}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <style>
                {`
                    .module-title {
                        font-size: 15px;
                        font-weight: 600;
                    }
                `}
            </style>
        </AdminLayout>
    );
}
