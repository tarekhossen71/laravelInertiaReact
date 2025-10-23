import React, { useState, useEffect } from 'react';
import { Head, Link, router, usePage } from '@inertiajs/react';
import AdminLayout from '@/Layouts/AdminLayout';
import Breadcrumb from '@/Components/Admin/Breadcrumb';
import { toast, ToastContainer } from 'react-toastify';

export default function RoleEdit({ pageTitle, modules, role }) {
    const { errors, flash } = usePage().props;

    const [roleName, setRoleName] = useState(role.name || '');
    const [selectedPermissions, setSelectedPermissions] = useState([]);
    const [selectAll, setSelectAll] = useState(false);

    // Initialize selected permissions from role
    useEffect(() => {
        if (role?.permissions) {
            setSelectedPermissions(role.permissions.map(p => p.id));
        }
    }, [role]);

    // Handle single permission toggle
    const handlePermissionChange = (permissionId) => {
        setSelectedPermissions((prev) =>
            prev.includes(permissionId)
                ? prev.filter((id) => id !== permissionId)
                : [...prev, permissionId]
        );
    };

    // Handle Select All
    const handleSelectAll = (e) => {
        const checked = e.target.checked;
        setSelectAll(checked);

        if (checked) {
            const allIds = modules.flatMap((m) => m.permissions.map((p) => p.id));
            setSelectedPermissions(allIds);
        } else {
            setSelectedPermissions([]);
        }
    };

    // Keep select all synced if user unchecks one manually
    useEffect(() => {
        const totalPermissions = modules.reduce((acc, m) => acc + m.permissions.length, 0);
        setSelectAll(selectedPermissions.length === totalPermissions);
    }, [selectedPermissions, modules]);

    // Handle flash messages
    useEffect(() => {
        if (flash?.success) toast.success(flash.success);
        if (flash?.error) toast.error(flash.error);
    }, [flash]);

    // Submit form
    const handleSubmit = (e) => {
        e.preventDefault();

        router.put(route('app.role.update', role.id), {
            name: roleName,
            permission: selectedPermissions,
        });
    };

    return (
        <AdminLayout>
            <Head title={pageTitle} />
            <Breadcrumb
                pageTitle={pageTitle}
                breadcrumb={[
                    { name: 'Roles', url: route('app.role.index') },
                    { name: 'Edit' },
                ]}
            />

            <div className="row">
                <div className="col-md-12">
                    <div className="card">
                        <div className="card-header border-bottom py-2 d-flex justify-content-between align-items-center">
                            <h4 className="mb-0">{pageTitle}</h4>
                            <Link href={route('app.role.index')} className="btn btn-primary btn-sm">Back</Link>
                        </div>

                        <div className="card-body">
                            <form onSubmit={handleSubmit}>
                                {/* Role Name */}
                                <div className="mb-4">
                                    <label className="form-label">
                                        Role Name <span className="text-danger">*</span>
                                    </label>
                                    <input
                                        type="text"
                                        className={`form-control ${errors.name ? 'is-invalid' : ''}`}
                                        placeholder="Enter role name"
                                        value={roleName}
                                        onChange={(e) => setRoleName(e.target.value)}
                                    />
                                    {errors.name && <div className="invalid-feedback">{errors.name}</div>}
                                </div>

                                {/* Select All */}
                                <div className="mb-3">
                                    <div className="form-check">
                                        <input
                                            type="checkbox"
                                            className="form-check-input"
                                            id="select-all"
                                            checked={selectAll}
                                            onChange={handleSelectAll}
                                        />
                                        <label className="form-check-label fw-semibold" htmlFor="select-all">
                                            Select All
                                        </label>
                                    </div>
                                </div>

                                {/* Modules and Permissions */}
                                <div className="row">
                                    {modules.map((module, moduleIndex) => (
                                        <div className="col-md-4 mb-4" key={moduleIndex}>
                                            <h6 className="module-title mb-2 fw-bold">{module.name}</h6>
                                            {module.permissions.map((permission) => (
                                                <div className="form-check mb-1" key={permission.id}>
                                                    <input
                                                        type="checkbox"
                                                        className="form-check-input"
                                                        id={`permission-${permission.id}`}
                                                        checked={selectedPermissions.includes(permission.id)}
                                                        onChange={() => handlePermissionChange(permission.id)}
                                                    />
                                                    <label className="form-check-label" htmlFor={`permission-${permission.id}`}>
                                                        {permission.name}
                                                    </label>
                                                </div>
                                            ))}
                                        </div>
                                    ))}
                                </div>

                                {/* Permission validation */}
                                {errors.permission && <div className="text-danger small mb-3">{errors.permission}</div>}

                                {/* Submit Button */}
                                <div className="text-end">
                                    <button type="submit" className="btn btn-primary btn-sm rounded-0">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <style>{`
                .module-title {
                    font-size: 15px;
                    font-weight: 600;
                }
            `}</style>
        </AdminLayout>
    );
}
