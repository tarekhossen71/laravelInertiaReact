import Breadcrumb from '@/Components/Admin/Breadcrumb';
import InputBox from '@/Components/form/InputBox';
import AdminLayout from '@/Layouts/AdminLayout';
import { Head, Link, router, usePage } from '@inertiajs/react';
import React, { useState } from 'react';
import { ToastContainer } from 'react-toastify';
import Swal from 'sweetalert2';

export default function SettingIndex({ pageTitle, settings }) {
    const { errors, flash } = usePage().props;
    const [siteTitle, setSiteTitle] = useState(settings.site_title || '');
    const [siteDescription, setSiteDescription] = useState(settings.site_description || '');
    // console.log(settings);

    const handleSubmit = (e) => {
        e.preventDefault();
        const formData = new FormData(e.target);
        router.post(route('app.setting.store-or-update'), formData);
    };
    return (
        <AdminLayout>
            <Head title={pageTitle} />
            <Breadcrumb pageTitle={pageTitle} breadcrumb={[{ name: pageTitle }]} />

            <ToastContainer
                position="top-right"
                autoClose={3000}
                hideProgressBar={false}
                newestOnTop={true}
                closeOnClick
                pauseOnHover
                theme="colored"
            />

            {/* Users Table */}
            <div className="card">
                <div className="card-header border-bottom p-3 d-flex justify-content-between align-items-center">
                    <h3 className='mb-0'>{pageTitle}</h3>
                </div>

                <div className="card-body p-3">
                    <form onSubmit={handleSubmit}>
                        <div className="row">
                            <div className="col-md-4">
                                <h5 className='mb-0 fw-semibold'>Site Title</h5>
                                <p>Change your site title</p>
                            </div>
                            <div className="col-md-8">
                                <InputBox labelName="Site Title" name="site_title" value={siteTitle} onChange={(e) => { setSiteTitle(e.target.value)}} groupClass="mb-3" placeholder='Enter Site Title' showStar='required' errors={errors} />
                            </div>
                        </div>
                        <div className="row">
                            <div className="col-md-4">
                                <h5 className='mb-0 fw-semibold'>Site Description</h5>
                                <p>Change your site description</p>
                            </div>
                            <div className="col-md-8">
                                <InputBox labelName="Site Description" name="site_description" value={siteDescription} onChange={(e) => { setSiteDescription(e.target.value)}} groupClass="mb-3" placeholder='Enter Site Description' showStar='required' errors={errors} />
                            </div>
                        </div>
                        <div className="row">
                            <div className="col-md-12">
                                <div className="text-end">
                                    <button type="submit" className="btn btn-primary btn-sm">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </AdminLayout>
    );
}
