import Breadcrumb from '@/Components/Admin/Breadcrumb';
import AdminLayout from '@/Layouts/AdminLayout';
import { Head, Link, router } from '@inertiajs/react';
import React, { useState } from 'react';
import Swal from 'sweetalert2';

export default function VariantIndex({ variants, filters, pageTitle }) {
    const [searchText, setSearchText] = useState(filters.search_text || '');
    const [selectedUsers, setSelectedUsers] = useState([]);

    // Search
    const handleSearch = (e) => {
        e.preventDefault();
        router.get(route('app.variant.index'), { search_text: searchText }, { preserveState: true, replace: true });
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
                router.post(route('app.variant.delete'), {id}, {
                    preserveState: true,
                    onSuccess: () => Swal.fire('Deleted!', 'User has been deleted.', 'success'),
                    onError: () => Swal.fire('Error!', 'Something went wrong!', 'error')
                });
            }
        });
    };
    // Select single user
    const handleSelect = (id) => {
        setSelectedUsers(prev =>
            prev.includes(id)
                ? prev.filter(r => r !== id)
                : [...prev, id]
        );
    };

    // Select all variants
    const handleSelectAll = (e) => {
        if(e.target.checked){
            setSelectedUsers(variants.data.map(r => r.id));
        } else {
            setSelectedUsers([]);
        }
    };

    // Bulk delete
    const handleBulkDelete = () => {
        if(selectedUsers.length === 0){
            Swal.fire('Oops!', 'Please select', 'warning');
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
                router.post(route('app.variant.bulk.delete'), { ids: selectedUsers }, {
                    preserveState: true,
                    onSuccess: () => {
                        Swal.fire('Deleted!', 'Selected variants have been deleted.', 'success');
                        setSelectedUsers([]); // reset selection
                    },
                    onError: () => Swal.fire('Error!', 'Something went wrong', 'error')
                });
            }
        });
    };

    console.log(variants);

    return (
        <AdminLayout>
            <Head title={pageTitle} />
            <Breadcrumb pageTitle={pageTitle} breadcrumb={[{ name: pageTitle }]} />

            {/* Filters */}
            <div className='card mb-3'>
                <div className="card-header border-bottom p-3"><h3 className='mb-0 '>Filters</h3></div>
                <div className="card-body p-3">
                    <form onSubmit={handleSearch}>
                        <div className="row">
                            <div className='col-md-3'>
                                <input
                                    type="text"
                                    placeholder="Search variants..."
                                    value={searchText}
                                    onChange={(e) => setSearchText(e.target.value)}
                                    className="form-control form-control-sm"
                                />
                            </div>
                            <div className='col-md-3'>
                                <div className='d-flex gap-2'>
                                    <button type="submit" className="btn btn-primary btn-sm">Search</button>
                                    <Link href={route('app.variant.index')} className="btn btn-danger btn-sm">Reset</Link>
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
                    <Link href={route('app.variant.create')} className="btn btn-primary btn-sm">Create New</Link>
                </div>

                <div className="card-body p-3">
                    {/* Show Delete Selected button only if any selected */}
                    {selectedUsers.length > 0 && (
                        <button className="btn btn-danger btn-sm mb-2" onClick={handleBulkDelete}>
                            Delete Selected ({selectedUsers.length})
                        </button>
                    )}
                    <div className="table-responsive">
                        <table className="table table-bordered">
                            <thead>
                                <tr>
                                    <th>
                                        <input
                                            type="checkbox"
                                            onChange={handleSelectAll}
                                            checked={selectedUsers.length === variants.data.length && variants.data.length > 0}
                                        />
                                    </th>
                                    <th>SL</th>
                                    <th>Product Name</th>
                                    <th>Size</th>
                                    <th>Color</th>
                                    <th>Sleeve Type</th>
                                    <th>Collar Type</th>
                                    <th>Price</th>
                                    <th>Stock Qty</th>
                                    <th>Created At</th>
                                    <th className='text-end'>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                {variants.data.length > 0 ? variants.data.map((data, idx) => (
                                    <tr key={data.id}>
                                        <td>
                                            <input
                                                type="checkbox"
                                                checked={selectedUsers.includes(data.id)}
                                                onChange={() => handleSelect(data.id)}
                                            />
                                        </td>
                                        <td>{idx + 1}</td>
                                        <td>{data.product_name}</td>
                                        <td>{Array.isArray(data.size) ? data.size.join(' , ') : data.size}</td>
                                        <td>{Array.isArray(data.color) ? data.color.join(' , ') : data.color}</td>
                                        <td>{Array.isArray(data.sleeve_type) ? data.sleeve_type.join(' , ') : data.sleeve_type}</td>
                                        <td>{Array.isArray(data.collar_type) ? data.collar_type.join(' , ') : data.collar_type}</td>

                                        <td>{data.price}</td>
                                        <td>{data.stock_qty}</td>
                                        <td>{data.created_at}</td>
                                        <td>
                                            <div className='d-flex gap-1 justify-content-end'>
                                                <Link href={route('app.variant.edit', data.id)} className="btn btn-sm btn-primary">Edit</Link>
                                                <button className="btn btn-sm btn-danger" onClick={() => handleDelete(data.id)}>Delete</button>
                                            </div>
                                        </td>
                                    </tr>
                                )) : (
                                    <tr>
                                        <td colSpan="11" className="text-center">No variants found</td>
                                    </tr>
                                )}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </AdminLayout>
    );
}
