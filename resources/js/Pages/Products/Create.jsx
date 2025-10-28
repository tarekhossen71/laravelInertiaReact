import React, { useEffect, useState } from "react";
import { Head, Link, router, useForm, usePage } from "@inertiajs/react";
import AdminLayout from "@/Layouts/AdminLayout";
import Breadcrumb from "@/Components/Admin/Breadcrumb";
import InputBox from "@/Components/form/InputBox";
import FileUploadBox from "@/Components/form/FileUploadBox";
import { toast, ToastContainer } from "react-toastify";

export default function ProductCreate({ pageTitle }) {
  const { flash, errors } = usePage().props;

  const [mainImage, setMainImage] = useState(null);
  const [galleryImages, setGalleryImages] = useState([]);

  const { data, setData, post, processing } = useForm({
    name: "",
    sku: "",
    price: "",
    description: "",
    status: "Active",
    seo_title: "",
    seo_meta_tags: "",
    seo_description: "",
    seo_keywords: "",
  });

  const handleSubmit = (e) => {
    e.preventDefault();

    const formData = new FormData();

    // Add normal text data
    Object.keys(data).forEach((key) => {
        formData.append(key, data[key]);
    });

    // Add main image
    if (mainImage) {
        formData.append("main_image", mainImage);
    }

    // Add gallery images
    if (galleryImages.length > 0) {
        galleryImages.forEach((file, index) => {
        formData.append(`gallery_images[${index}]`, file);
        });
    }
    router.post(route("app.product.store"), formData);
  };

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
          { name: "Create" },
        ]}
      />

      <div className="row">
        <div className="col-md-12">
          <div className="card">
            <div className="card-header border-bottom p-3 d-flex justify-content-between align-items-center">
              <h4 className="mb-0">{pageTitle}</h4>
              <Link href={route("app.product.index")} className="btn btn-primary btn-sm">
                Back
              </Link>
            </div>

            <div className="card-body p-3">
              {flash?.success && <div className="alert alert-success">{flash.success}</div>}

              <form onSubmit={handleSubmit} encType="multipart/form-data">
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
                      className={`form-control ${errors.description ? "is-invalid" : ""}`}
                      rows="4"
                      value={data.description}
                      onChange={(e) => setData("description", e.target.value)}
                      placeholder="Enter product description..."
                    ></textarea>
                    {errors.description && (
                      <div className="invalid-feedback">{errors.description}</div>
                    )}
                  </div>

                  {/* SEO Fields */}
                  <div className="col-md-4">
                    <InputBox
                      labelName="SEO Title"
                      name="seo_title"
                      value={data.seo_title}
                      onChange={(e) => setData("seo_title", e.target.value)}
                      errors={errors}
                      placeholder="Enter SEO Title"
                    />
                  </div>
                  <div className="col-md-4">
                    <InputBox
                      labelName="SEO Meta Tags"
                      name="seo_meta_tags"
                      value={data.seo_meta_tags}
                      onChange={(e) => setData("seo_meta_tags", e.target.value)}
                      errors={errors}
                      placeholder="Enter SEO Meta Tags"
                    />
                  </div>
                  <div className="col-md-4">
                    <InputBox
                      labelName="SEO Description"
                      name="seo_description"
                      value={data.seo_description}
                      onChange={(e) => setData("seo_description", e.target.value)}
                      errors={errors}
                      placeholder="Enter SEO Description"
                    />
                  </div>

                  {/* Main Image */}
                  <div className="col-md-6">
                    <FileUploadBox
                      labelName="Main Image"
                      name="main_image"
                      multiple={false}
                      onChange={(files) => setMainImage(files[0])}
                      errors={errors}
                    />
                  </div>

                  {/* Gallery Images */}
                  <div className="col-md-6">
                    <FileUploadBox
                      labelName="Gallery Images"
                      name="gallery_images"
                      multiple={true}
                      onChange={(files) => setGalleryImages(files)}
                      errors={errors}
                    />
                  </div>
                </div>

                {/* Submit Button */}
                <div className="text-end mt-3">
                  <button
                    type="submit"
                    disabled={processing}
                    className="btn btn-primary btn-sm rounded-0"
                  >
                    {processing ? "Saving..." : "Save"}
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </AdminLayout>
  );
}
