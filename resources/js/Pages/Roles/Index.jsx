import Breadcrumb from '@/Components/Admin/Breadcrumb';
import AdminLayout from '@/Layouts/AdminLayout';
import { Head, Link, router } from '@inertiajs/react';
import React, { useState } from 'react';
import Swal from 'sweetalert2';

export default function RoleIndex({ roles, filters, pageTitle }) {
    const [searchText, setSearchText] = useState(filters.search_text || '');
    const [selectedRoles, setSelectedRoles] = useState([]);

    // Search
    const handleSearch = (e) => {
        e.preventDefault();
        router.get(route('app.role.index'), { search_text: searchText }, { preserveState: true, replace: true });
    };

    // Single delete
    const handleDelete = (id) => {
        Swal.fire({
            title: 'Are you sure?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Delete',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if(result.isConfirmed){
                router.post(route('app.role.delete'), {id}, {
                    preserveState: true,
                    onSuccess: () => Swal.fire('Deleted!', 'Role has been deleted.', 'success'),
                    onError: () => Swal.fire('Error!', 'Something went wrong!', 'error')
                });
            }
        });
    };

    // Select single role
    const handleSelectRole = (id) => {
        setSelectedRoles(prev =>
            prev.includes(id)
                ? prev.filter(r => r !== id)
                : [...prev, id]
        );
    };

    // Select all roles
    const handleSelectAll = (e) => {
        if(e.target.checked){
            setSelectedRoles(roles.data.map(r => r.id));
        } else {
            setSelectedRoles([]);
        }
    };

    // Bulk delete
    const handleBulkDelete = () => {
        if(selectedRoles.length === 0){
            Swal.fire('Oops!', 'Please select at least one role', 'warning');
            return;
        }

        Swal.fire({
            title: 'Are you sure?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Delete',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if(result.isConfirmed){
                router.post(route('app.role.bulk.delete'), { ids: selectedRoles }, {
                    preserveState: true,
                    onSuccess: () => {
                        Swal.fire('Deleted!', 'Selected roles have been deleted.', 'success');
                        setSelectedRoles([]); // reset selection
                    },
                    onError: () => Swal.fire('Error!', 'Something went wrong', 'error')
                });
            }
        });
    };

    return (
        <AdminLayout>
            <Head title={pageTitle} />
            <Breadcrumb pageTitle="Roles" breadcrumb={[{ name: 'Roles' }]} />

            {/* Filters */}
            <div className='card mb-3'>
                <div className="card-header border-bottom p-3"><h3 className='mb-0 '>Filters</h3></div>
                <div className="card-body p-3">
                    <form onSubmit={handleSearch}>
                        <div className="row">
                            <div className='col-md-3'>
                                <input
                                    type="text"
                                    placeholder="Search roles..."
                                    value={searchText}
                                    onChange={(e) => setSearchText(e.target.value)}
                                    className="form-control form-control-sm"
                                />
                            </div>
                            <div className='col-md-3'>
                                <div className='d-flex gap-2'>
                                    <button type="submit" className="btn btn-primary btn-sm">Search</button>
                                    <Link href={route('app.role.index')} className="btn btn-danger btn-sm">Reset</Link>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            {/* Roles Table */}
            <div className="card">
                <div className="card-header border-bottom p-3 d-flex justify-content-between align-items-center">
                    <h3 className='mb-0'>{pageTitle}</h3>
                    <Link href={route('app.role.create')} className="btn btn-primary btn-sm">Create New</Link>
                </div>

                <div className="card-body p-3">
                    {/* Show Delete Selected button only if any selected */}
                    {selectedRoles.length > 0 && (
                        <button className="btn btn-danger btn-sm mb-2" onClick={handleBulkDelete}>
                            Delete Selected ({selectedRoles.length})
                        </button>
                    )}

                    <table className="table table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    <input
                                        type="checkbox"
                                        onChange={handleSelectAll}
                                        checked={selectedRoles.length === roles.data.length && roles.data.length > 0}
                                    />
                                </th>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Permissions</th>
                                <th>Created At</th>
                                <th className='text-end'>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {roles.data.length > 0 ? roles.data.map((role, idx) => (
                                <tr key={role.id}>
                                    <td>
                                        <input
                                            type="checkbox"
                                            checked={selectedRoles.includes(role.id)}
                                            onChange={() => handleSelectRole(role.id)}
                                        />
                                    </td>
                                    <td>{idx + 1}</td>
                                    <td>{role.name}</td>
                                    <td>{role.permission_count}</td>
                                    <td>{role.created_at}</td>
                                    <td>
                                        <div className='d-flex gap-1 justify-content-end'>
                                            <Link href={route('app.role.edit', role.id)} className="btn btn-sm btn-primary">Edit</Link>
                                            <button className="btn btn-sm btn-danger" onClick={() => handleDelete(role.id)}>Delete</button>
                                        </div>
                                    </td>
                                </tr>
                            )) : (
                                <tr>
                                    <td colSpan="6" className="text-center">No roles found</td>
                                </tr>
                            )}
                        </tbody>
                    </table>
                </div>
            </div>
        </AdminLayout>
    );
}
