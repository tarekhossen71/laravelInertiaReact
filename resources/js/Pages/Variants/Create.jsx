import React, { useState, useEffect } from 'react';
import { Head, Link, router, usePage } from '@inertiajs/react';
import AdminLayout from '@/Layouts/AdminLayout';
import Breadcrumb from '@/Components/Admin/Breadcrumb';
import { toast, ToastContainer } from 'react-toastify';
import InputBox from '@/Components/form/InputBox';
import SelectBox from '@/Components/form/SelectBox';
import Select from 'react-select'; // ✅ react-select

export default function VariantCreate({ pageTitle, products }) {
    const { errors, flash } = usePage().props;


    const [product_id, setProduct_id] = useState('');
    const [size, setSize] = useState([]);
    const [color, setColor] = useState([]);
    const [sleeve_type, setSleeve_type] = useState([]);
    const [collar_type, setCollar_type] = useState([]);
    const [price, setPrice] = useState('');
    const [stock_qty, setStock_qty] = useState('');

    // Options
    const sizeOptions = ['S','M','L','XL','XXL','3XL','4XL'].map(s => ({ value: s, label: s }));
    const colorOptions = ['Black','White','Red','Blue','Green','Yellow','Orange'].map(c => ({ value: c, label: c }));
    const sleeveOptions = ['Full Sleeve','Half Sleeve'].map(s => ({ value: s, label: s }));
    const collarOptions = ['V Neck','Round'].map(c => ({ value: c, label: c }));

    // Submit form
    const handleSubmit = (e) => {
        e.preventDefault();

        router.post(route('app.variant.store'), {
            product_id,
            size: size.map(s => s.value),
            color: color.map(c => c.value),
            sleeve_type: sleeve_type.map(s => s.value),
            collar_type: collar_type.map(c => c.value),
            price,
            stock_qty,
        });
    };

    // Handle flash messages
    useEffect(() => {
        if (flash?.success) toast.success(flash.success);
        if (flash?.error) toast.error(flash.error);
    }, [flash]);

    return (
        <AdminLayout>
            <Head title={pageTitle} />
            <ToastContainer position="top-right" autoClose={3000} hideProgressBar={false} newestOnTop={true} closeOnClick pauseOnHover theme="colored" />

            <Breadcrumb pageTitle={pageTitle} breadcrumb={[{ name: pageTitle, url: route('app.variant.index') }, { name: 'Create' }]} />

            <div className="row">
                <div className="col-md-12">
                    <div className="card">
                        <div className="card-header border-bottom p-3 d-flex justify-content-between align-items-center">
                            <h4 className="mb-0">{pageTitle}</h4>
                            <Link href={route('app.variant.index')} className="btn btn-primary btn-sm">Back</Link>
                        </div>

                        <div className="card-body p-3">
                            {flash?.success && <div className="alert alert-success">{flash.success}</div>}

                            <form onSubmit={handleSubmit} encType="multipart/form-data">
                                <div className="row">
                                    <div className="col-md-4">
                                        <SelectBox labelName="Product" name="product_id" value={product_id} onChange={(e) => setProduct_id(e.target.value)} errors={errors} showStar="required">
                                            <option value="">Select Product</option>
                                            {products.map((data) => (<option value={data.id} key={data.id}>{data.name}</option>))}
                                        </SelectBox>
                                    </div>

                                    <div className="col-md-4">
                                        <label className="form-label">Size</label>
                                        <Select
                                            isMulti
                                            options={sizeOptions}
                                            value={size}
                                            onChange={setSize}
                                        />
                                        {errors.size && <div className="text-danger">{errors.size}</div>}
                                    </div>

                                    <div className="col-md-4">
                                        <label className="form-label">Color</label>
                                        <Select
                                            isMulti
                                            options={colorOptions}
                                            value={color}
                                            onChange={setColor}
                                        />
                                        {errors.color && <div className="text-danger">{errors.color}</div>}
                                    </div>

                                    <div className="col-md-4">
                                        <label className="form-label">Sleeve Type</label>
                                        <Select
                                            isMulti
                                            options={sleeveOptions}
                                            value={sleeve_type}
                                            onChange={setSleeve_type}
                                        />
                                        {errors.sleeve_type && <div className="text-danger">{errors.sleeve_type}</div>}
                                    </div>

                                    <div className="col-md-4">
                                        <label className="form-label">Collar Type</label>
                                        <Select
                                            isMulti
                                            options={collarOptions}
                                            value={collar_type}
                                            onChange={setCollar_type}

                                        />
                                        {errors.collar_type && <div className="text-danger">{errors.collar_type}</div>}
                                    </div>

                                    <div className="col-md-4">
                                        <InputBox labelName="Price" name="price" type="text" value={price} onChange={(e) => setPrice(e.target.value)} errors={errors} min="1" showStar="required" />
                                    </div>

                                    <div className="col-md-4">
                                        <InputBox labelName="Stock Quantity" name="stock_qty" type="number" value={stock_qty} onChange={(e) => setStock_qty(e.target.value)} errors={errors} min="1" showStar="required" />
                                    </div>
                                </div>

                                <div className="text-end mt-3">
                                    <button type="submit" className="btn btn-primary btn-sm rounded-0">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </AdminLayout>
    );
}
