import Breadcrumb from '@/Components/Admin/Breadcrumb';
import AdminLayout from '@/Layouts/AdminLayout';
import { Head, Link, router } from '@inertiajs/react';
import React, { useState } from 'react';
import Swal from 'sweetalert2';

export default function UserIndex({ users, filters, pageTitle }) {
    const [searchText, setSearchText] = useState(filters.search_text || '');
    const [selectedUsers, setSelectedUsers] = useState([]);

    // Search
    const handleSearch = (e) => {
        e.preventDefault();
        router.get(route('app.user.index'), { search_text: searchText }, { preserveState: true, replace: true });
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
                router.post(route('app.user.delete'), {id}, {
                    preserveState: true,
                    onSuccess: () => Swal.fire('Deleted!', 'User has been deleted.', 'success'),
                    onError: () => Swal.fire('Error!', 'Something went wrong!', 'error')
                });
            }
        });
    };
    // Select single user
    const handleSelectUser = (id) => {
        setSelectedUsers(prev =>
            prev.includes(id)
                ? prev.filter(r => r !== id)
                : [...prev, id]
        );
    };

    // Select all users
    const handleSelectAll = (e) => {
        if(e.target.checked){
            setSelectedUsers(users.data.map(r => r.id));
        } else {
            setSelectedUsers([]);
        }
    };

    // Bulk delete
    const handleBulkDelete = () => {
        if(selectedUsers.length === 0){
            Swal.fire('Oops!', 'Please select at least one user', 'warning');
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
                router.post(route('app.user.bulk.delete'), { ids: selectedUsers }, {
                    preserveState: true,
                    onSuccess: () => {
                        Swal.fire('Deleted!', 'Selected users have been deleted.', 'success');
                        setSelectedUsers([]); // reset selection
                    },
                    onError: () => Swal.fire('Error!', 'Something went wrong', 'error')
                });
            }
        });
    };

    return (
        <AdminLayout>
            <Head title={pageTitle} />
            <Breadcrumb pageTitle="Users" breadcrumb={[{ name: 'Users' }]} />

            {/* Filters */}
            <div className='card mb-3'>
                <div className="card-header border-bottom p-3"><h3 className='mb-0 '>Filters</h3></div>
                <div className="card-body p-3">
                    <form onSubmit={handleSearch}>
                        <div className="row">
                            <div className='col-md-3'>
                                <input
                                    type="text"
                                    placeholder="Search users..."
                                    value={searchText}
                                    onChange={(e) => setSearchText(e.target.value)}
                                    className="form-control form-control-sm"
                                />
                            </div>
                            <div className='col-md-3'>
                                <div className='d-flex gap-2'>
                                    <button type="submit" className="btn btn-primary btn-sm">Search</button>
                                    <Link href={route('app.user.index')} className="btn btn-danger btn-sm">Reset</Link>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            {/* Users Table */}
            <div className="card">
                <div className="card-header border-bottom p-3 d-flex justify-content-between align-items-center">
                    <h3 className='mb-0'>{pageTitle}</h3>
                    <Link href={route('app.user.create')} className="btn btn-primary btn-sm">Create New</Link>
                </div>

                <div className="card-body p-3">
                    {/* Show Delete Selected button only if any selected */}
                    {selectedUsers.length > 0 && (
                        <button className="btn btn-danger btn-sm mb-2" onClick={handleBulkDelete}>
                            Delete Selected ({selectedUsers.length})
                        </button>
                    )}

                    <table className="table table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    <input
                                        type="checkbox"
                                        onChange={handleSelectAll}
                                        checked={selectedUsers.length === users.data.length && users.data.length > 0}
                                    />
                                </th>
                                <th>SL</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Mobile No</th>
                                <th>Created At</th>
                                <th className='text-end'>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {users.data.length > 0 ? users.data.map((user, idx) => (
                                <tr key={user.id}>
                                    <td>
                                        <input
                                            type="checkbox"
                                            checked={selectedUsers.includes(user.id)}
                                            onChange={() => handleSelectUser(user.id)}
                                        />
                                    </td>
                                    <td>{idx + 1}</td>
                                    <td>
                                        <img src={user.avatar} alt={user.name} style={{ width: '50px' }} />
                                    </td>
                                    <td>{user.name}</td>
                                    <td>{user.email}</td>
                                    <td>{user.role}</td>
                                    <td>{user.mobile_no}</td>
                                    <td>{user.created_at}</td>
                                    <td>
                                        <div className='d-flex gap-1 justify-content-end'>
                                            <Link href={route('app.user.edit', user.id)} className="btn btn-sm btn-primary">Edit</Link>
                                            <button className="btn btn-sm btn-danger" onClick={() => handleDelete(user.id)}>Delete</button>
                                        </div>
                                    </td>
                                </tr>
                            )) : (
                                <tr>
                                    <td colSpan="6" className="text-center">No users found</td>
                                </tr>
                            )}
                        </tbody>
                    </table>
                </div>
            </div>
        </AdminLayout>
    );
}
