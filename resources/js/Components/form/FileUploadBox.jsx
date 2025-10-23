import React, { useRef, useState, useEffect } from "react";

export default function FileUploadBox({
  labelName = "Upload Files",
  name = "files",
  multiple = false,
  accept = "image/*",
  required = false,   // HTML required
  showStar = '',      // label er pase star
  errors = {},
  groupClass = "mb-3",
  boxClass = "",
  onChange,
  value = [],
  image = null,       // Old image URL
}) {
  const [files, setFiles] = useState([]);
  const inputRef = useRef(null);

  // Handle file selection
  const handleFiles = (selectedFiles) => {
    let fileArray = Array.from(selectedFiles);
    if (!multiple) fileArray = [fileArray[0]];

    const mapped = fileArray.map((file) => ({
      file,
      preview: URL.createObjectURL(file),
    }));

    const updatedFiles = multiple ? [...files, ...mapped] : mapped;

    setFiles(updatedFiles);
    if (onChange) onChange(updatedFiles.map((f) => f.file));
  };

  // Drag & drop handlers
  const handleDragOver = (e) => {
    e.preventDefault();
    e.stopPropagation();
  };

  const handleDrop = (e) => {
    e.preventDefault();
    e.stopPropagation();
    if (e.dataTransfer.files?.length > 0) {
      handleFiles(e.dataTransfer.files);
    }
  };

  // Remove file
  const removeFile = (index) => {
    const newFiles = files.filter((_, i) => i !== index);
    setFiles(newFiles);
    if (onChange) onChange(newFiles.map((f) => f.file));
  };

  // Cleanup previews
  useEffect(() => {
    return () => {
      files.forEach((f) => URL.revokeObjectURL(f.preview));
    };
  }, [files]);

  return (
    <div className={groupClass}>
      {labelName && (
        <label className={`form-label fw-semibold ${showStar}`}>
          {labelName}
        </label>
      )}

      <div
        className={`border border-2 border-dashed rounded p-3 position-relative text-center ${boxClass}`}
        onClick={() => inputRef.current.click()}
        onDragOver={handleDragOver}
        onDrop={handleDrop}
        style={{
          minHeight: "130px",
          display: "flex",
          flexWrap: "wrap",
          gap: "10px",
          justifyContent: "center",
          alignItems: "center",
          cursor: "pointer",
        }}
      >
        <input
          ref={inputRef}
          type="file"
          name={name}
          multiple={multiple}
          accept={accept}
          hidden
          onChange={(e) => handleFiles(e.target.files)}
        />

        {/* Show selected files or old image */}
        {files.length > 0 ? (
          files.map((item, index) => (
            <div
              key={index}
              className="position-relative"
              style={{
                width: "150px",
                height: "150px",
                borderRadius: "10px",
                overflow: "hidden",
                border: "1px solid #ddd",
                objectFit: "cover",
              }}
            >
              {item.file.type.startsWith("image/") ? (
                <img
                  src={item.preview}
                  alt={item.file.name}
                  className="w-100 h-100 object-fit-cover"
                />
              ) : (
                <div className="d-flex align-items-center justify-content-center h-100">
                  <i className="bx bx-file fs-1 text-secondary"></i>
                </div>
              )}

              <button
                type="button"
                className="btn btn-sm btn-danger position-absolute top-0 end-0 m-1 p-1"
                onClick={(e) => {
                  e.stopPropagation();
                  removeFile(index);
                }}
              >
                ✕
              </button>
            </div>
          ))
        ) : image ? (
          <div
            className="position-relative"
            style={{
              width: "150px",
              height: "150px",
              borderRadius: "10px",
              overflow: "hidden",
              border: "1px solid #ddd",
            }}
          >
            <img
              src={image}
              alt="Old Avatar"
              className="w-100 h-100 object-fit-cover"
            />
          </div>
        ) : (
          <div>
            <p className="mb-1">
              <i className="bx bx-cloud-upload fs-3 text-primary"></i>
            </p>
            <p className="mb-0 text-muted">Drag & Drop or Click to Upload</p>
          </div>
        )}
      </div>

      {errors[name] && (
        <div className="invalid-feedback d-block">{errors[name]}</div>
      )}
    </div>
  );
}



// Don't remove below code
// Single file upload
{/* <FileUploadBox
  labelName="Profile Image"
  name="profile_image"
  multiple={false}
  onChange={(files) => setProfileImage(files[0])}
  errors={errors}
/> */}

// Multiple file upload
{/* <FileUploadBox
  labelName="Gallery Images"
  name="gallery"
  multiple={true}
  onChange={(files) => setGallery(files)}
  errors={errors}
/> */}
