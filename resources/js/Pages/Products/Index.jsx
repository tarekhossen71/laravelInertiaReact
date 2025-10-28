import React, { useState } from "react";
import AdminLayout from "@/Layouts/AdminLayout";
import { Head, Link, router } from "@inertiajs/react";
import Breadcrumb from "@/Components/Admin/Breadcrumb";
import Swal from "sweetalert2";

export default function ProductIndex({ products, filters, pageTitle }) {
    const [searchText, setSearchText] = useState(filters.search_text || "");
    const [selectedProducts, setSelectedProducts] = useState([]);

    // Search
    const handleSearch = (e) => {
        e.preventDefault();
        router.get(route("app.product.index"), { search_text: searchText }, { preserveState: true, replace: true });
    };

    // Single delete
    const handleDelete = (id) => {
        Swal.fire({
            title: "Are you sure?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Delete",
            cancelButtonText: "Cancel",
        }).then((result) => {
            if (result.isConfirmed) {
                router.post(route("app.product.delete"), { id }, {
                    preserveState: true,
                    onSuccess: () => Swal.fire("Deleted!", "Product has been deleted.", "success"),
                    onError: () => Swal.fire("Error!", "Something went wrong!", "error"),
                });
            }
        });
    };

    // Select single product
    const handleSelectProduct = (id) => {
        setSelectedProducts((prev) =>
            prev.includes(id) ? prev.filter((r) => r !== id) : [...prev, id]
        );
    };

    // Select all products
    const handleSelectAll = (e) => {
        if (e.target.checked) {
            setSelectedProducts(products.data.map((r) => r.id));
        } else {
            setSelectedProducts([]);
        }
    };

    // Bulk delete
    const handleBulkDelete = () => {
        if (selectedProducts.length === 0) {
            Swal.fire("Oops!", "Please select at least one product", "warning");
            return;
        }

        Swal.fire({
            title: "Are you sure?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Delete",
            cancelButtonText: "Cancel",
        }).then((result) => {
            if (result.isConfirmed) {
                router.post(route("app.product.bulk.delete"), { ids: selectedProducts }, {
                    preserveState: true,
                    onSuccess: () => {
                        Swal.fire("Deleted!", "Selected products have been deleted.", "success");
                        setSelectedProducts([]);
                    },
                    onError: () => Swal.fire("Error!", "Something went wrong", "error"),
                });
            }
        });
    };

    return (
        <AdminLayout>
            <Head title={pageTitle} />
            <Breadcrumb pageTitle="Products" breadcrumb={[{ name: "Products" }]} />

            {/* Filters */}
            <div className="card mb-3">
                <div className="card-header border-bottom p-3">
                    <h3 className="mb-0">Filters</h3>
                </div>
                <div className="card-body p-3">
                    <form onSubmit={handleSearch}>
                        <div className="row">
                            <div className="col-md-3">
                                <input
                                    type="text"
                                    placeholder="Search products..."
                                    value={searchText}
                                    onChange={(e) => setSearchText(e.target.value)}
                                    className="form-control form-control-sm"
                                />
                            </div>
                            <div className="col-md-3">
                                <div className="d-flex gap-2">
                                    <button type="submit" className="btn btn-primary btn-sm">
                                        Search
                                    </button>
                                    <Link href={route("app.product.index")} className="btn btn-danger btn-sm">
                                        Reset
                                    </Link>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            {/* Products Table */}
            <div className="card">
                <div className="card-header border-bottom p-3 d-flex justify-content-between align-items-center">
                    <h3 className="mb-0">{pageTitle}</h3>
                    <Link href={route("app.product.create")} className="btn btn-primary btn-sm">
                        Create New
                    </Link>
                </div>

                <div className="card-body p-3">
                    {/* Show Delete Selected button only if any selected */}
                    {selectedProducts.length > 0 && (
                        <button className="btn btn-danger btn-sm mb-2" onClick={handleBulkDelete}>
                            Delete Selected ({selectedProducts.length})
                        </button>
                    )}

                    <table className="table table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    <input
                                        type="checkbox"
                                        onChange={handleSelectAll}
                                        checked={selectedProducts.length === products.data.length && products.data.length > 0}
                                    />
                                </th>
                                <th>SL</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>SKU</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th className="text-end">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {products.data.length > 0 ? (
                                products.data.map((p, idx) => (
                                    <tr key={p.id}>
                                        <td>
                                            <input
                                                type="checkbox"
                                                checked={selectedProducts.includes(p.id)}
                                                onChange={() => handleSelectProduct(p.id)}
                                            />
                                        </td>
                                        <td>{idx + 1}</td>
                                        <td>
                                            <img
                                                src={p.main_image}
                                                alt={p.name}
                                                style={{ width: "50px" }}
                                            />
                                        </td>
                                        <td>{p.name}</td>
                                        <td>{p.sku}</td>
                                        <td>{p.price}</td>
                                        <td>{p.status}</td>
                                        <td>{p.created_at}</td>
                                        <td>
                                            <div className="d-flex gap-1 justify-content-end">
                                                <Link
                                                    href={route("app.product.edit", p.id)}
                                                    className="btn btn-sm btn-primary"
                                                >
                                                    Edit
                                                </Link>
                                                <button
                                                    className="btn btn-sm btn-danger"
                                                    onClick={() => handleDelete(p.id)}
                                                >
                                                    Delete
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                ))
                            ) : (
                                <tr>
                                    <td colSpan="9" className="text-center">
                                        No products found
                                    </td>
                                </tr>
                            )}
                        </tbody>
                    </table>
                </div>
            </div>
        </AdminLayout>
    );
}
