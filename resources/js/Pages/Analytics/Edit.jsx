import React, { useState, useEffect } from 'react';
import { Head, Link, router, usePage } from '@inertiajs/react';
import AdminLayout from '@/Layouts/AdminLayout';
import Breadcrumb from '@/Components/Admin/Breadcrumb';
import { toast, ToastContainer } from 'react-toastify';
import InputBox from '@/Components/form/InputBox';
import SelectBox from '@/Components/form/SelectBox';
import FileUploadBox from '@/Components/form/FileUploadBox';

export default function UserEdit({ pageTitle, roles, genders, user }) {
    const { errors, flash } = usePage().props; // ✅ Laravel theke automatic asbe

    const [id, setId]                                  = useState(user.id || '');
    const [name, setName]                                  = useState(user.name || '');
    const [email, setEmail]                                = useState(user.email || '');
    const [password, setPassword]                          = useState('');
    const [password_confirmation, setPasswordConfirmation] = useState('');
    const [role, setRole]                                  = useState(user.role_id || '');
    const [mobileNo, setMobileNo]                          = useState(user.mobile_no || '');
    const [avatar, setAvatar]                              = useState('');
    const [gender, setGender]                              = useState(user.gender || '');
    const [preview, setPreview]                            = useState(user.preview || '');
    const [oldImage, setOldImage]                          = useState(user.avatar || '');

    // Submit form
    const handleSubmit = (e) => {
        e.preventDefault();

        const formData = new FormData();
        formData.append('update_id', id);
        formData.append('name', name);
        formData.append('email', email);
        formData.append('password', password);
        formData.append('password_confirmation', password_confirmation);
        formData.append('role_id', role);
        formData.append('mobile_no', mobileNo);
        formData.append('gender', gender);
        formData.append('old_image', oldImage);

        if (avatar) {
            formData.append('avatar', avatar);
        }

        router.post(route('app.user.update', user.id), formData, {
            forceFormData: true,
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
            {/* Toast container (only once globally) */}
            <ToastContainer position="top-right" autoClose={3000} hideProgressBar={false} newestOnTop={true} closeOnClick pauseOnHover theme="colored"
            />

            <Breadcrumb
                pageTitle={pageTitle}
                breadcrumb={[
                    { name: 'Users', url: route('app.user.index') },
                    { name: 'Edit' },
                ]}
            />

            <div className="row">
                <div className="col-md-12">
                    <div className="card">
                        <div className="card-header border-bottom p-3 d-flex justify-content-between align-items-center">
                            <h4 className="mb-0">{pageTitle}</h4>
                            <Link href={route('app.user.index')} className="btn btn-primary btn-sm">
                                Back
                            </Link>
                        </div>

                        <div className="card-body p-3">

                            {/* ✅ Success Flash Message */}
                            {flash?.success && (
                                <div className="alert alert-success">{flash.success}</div>
                            )}

                            <form onSubmit={handleSubmit} encType="multipart/form-data">
                                {/* Role Name */}
                                <div className="row">
                                    <div className="col-md-4">
                                        <InputBox labelName="Name" name="name" value={name} onChange={(e) => setName(e.target.value)} errors={errors} showStar="required" placeholder='Enter Name'
                                        />
                                    </div>
                                    <div className="col-md-4">
                                        <InputBox labelName="Email" name="email" value={email} onChange={(e) => setEmail(e.target.value)} errors={errors} showStar="required" placeholder='Enter Email'
                                        />
                                    </div>
                                    <div className="col-md-4">
                                        <InputBox type='password' labelName="Password" name="password" value={password} onChange={(e) => setPassword(e.target.value)} errors={errors} showStar="required" placeholder='Enter Password'
                                        />
                                    </div>
                                    <div className="col-md-4">
                                        <InputBox type='password' labelName="Password Confirmation" name="password_confirmation" value={password_confirmation} onChange={(e) => setPasswordConfirmation(e.target.value)} errors={errors} showStar="required" placeholder='Enter Password Confirmation'
                                        />
                                    </div>
                                    <div className="col-md-4">
                                        <SelectBox labelName="Role" name="role_id" value={role} onChange={(e) => setRole(e.target.value)} errors={errors} showStar="required"
                                        >
                                            <option value="">Select Role</option>
                                            {roles.map((role, i) => (
                                                <option key={i} value={role.id}>
                                                    {role.name}
                                                </option>
                                            ))}
                                        </SelectBox>
                                    </div>
                                    <div className="col-md-4">
                                        <SelectBox labelName="Gender" name="gender" value={gender} onChange={(e) => setGender(e.target.value)} errors={errors}
                                        >
                                            <option value="">Select Gender</option>
                                            {Object.entries(genders).map(([key, value]) => (
                                                <option key={key} value={key}>{value}</option>
                                                ))}

                                        </SelectBox>
                                    </div>
                                    <div className="col-md-4">
                                        <InputBox labelName="Mobile No" name="mobile_no" value={mobileNo} onChange={(e) => setMobileNo(e.target.value)} errors={errors} placeholder='Enter Mobile No'
                                        />
                                    </div>
                                    <div className="col-md-4">
                                        <FileUploadBox labelName="Avatar" name="avatar" multiple={false} onChange={(files) => setAvatar(files[0])} errors={errors} image={preview}/>
                                    </div>
                                </div>


                                {/* Submit Button */}
                                <div className="text-end">
                                    <button type="submit" className="btn btn-primary btn-sm rounded-0">
                                        Submit
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
