import React, { useRef, useState, useEffect } from "react";
import { getAppUrl } from "@/config/appConfig";

export default function FileUploadBox({
  labelName = "Upload Files",
  name = "files",
  multiple = false,
  accept = "image/*",
  required = false,
  showStar = "",
  errors = {},
  groupClass = "mb-3",
  boxClass = "",
  onChange,
  value = [],
  image = null, // old image or array of images
}) {
  const baseUrl = getAppUrl();
  const [files, setFiles] = useState([]); // new uploads
  const [oldImagesState, setOldImagesState] = useState(
    image && (Array.isArray(image) || typeof image === "object")
      ? Object.values(image)
      : image
      ? [image]
      : []
  );

  const inputRef = useRef(null);

  // Handle new file selection
  const handleFiles = (selectedFiles) => {
    let fileArray = Array.from(selectedFiles);
    if (!multiple) fileArray = [fileArray[0]];

    const mapped = fileArray.map((file) => ({
      file,
      preview: URL.createObjectURL(file),
    }));

    const updatedFiles = multiple ? [...files, ...mapped] : mapped;
    setFiles(updatedFiles);

    // Send both old + new files to parent
    if (onChange)
      onChange({
        newFiles: updatedFiles.map((f) => f.file),
        oldFiles: oldImagesState,
      });
  };

  // Remove new uploaded file
  const removeFile = (index) => {
    const newFiles = files.filter((_, i) => i !== index);
    setFiles(newFiles);
    if (onChange)
      onChange({
        newFiles: newFiles.map((f) => f.file),
        oldFiles: oldImagesState,
      });
  };

  // Remove old image
  const removeOldImage = (index) => {
    const newOldImages = oldImagesState.filter((_, i) => i !== index);
    setOldImagesState(newOldImages);
    if (onChange)
      onChange({
        newFiles: files.map((f) => f.file),
        oldFiles: newOldImages,
      });
  };

  // Cleanup object URLs
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
        className={`border rounded p-3 position-relative text-center ${boxClass}`}
        onClick={() => inputRef.current.click()}
        onDragOver={(e) => e.preventDefault()}
        onDrop={(e) => {
          e.preventDefault();
          if (e.dataTransfer.files?.length > 0) handleFiles(e.dataTransfer.files);
        }}
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

        {/* 1️⃣ Show old images first */}
        {oldImagesState.length > 0 &&
          oldImagesState.map((url, idx) => (
            <div
              key={`old-${idx}`}
              className="position-relative"
              style={{
                width: "120px",
                height: "120px",
                borderRadius: "10px",
                overflow: "hidden",
                border: "1px solid #ddd",
              }}
            >
              <img
                src={baseUrl + url}
                alt={`Old ${idx}`}
                className="w-100 h-100 object-fit-cover"
              />
              <button
                type="button"
                className="btn btn-sm btn-danger position-absolute top-0 end-0 m-1 p-1"
                onClick={(e) => {
                  e.stopPropagation();
                  removeOldImage(idx);
                }}
              >
                ✕
              </button>
            </div>
          ))}

        {/* 2️⃣ Show new uploaded files */}
        {files.length > 0 &&
          files.map((item, index) => (
            <div
              key={`new-${index}`}
              className="position-relative"
              style={{
                width: "120px",
                height: "120px",
                borderRadius: "10px",
                overflow: "hidden",
                border: "1px solid #ddd",
              }}
            >
              <img
                src={item.preview}
                alt={item.file.name}
                className="w-100 h-100 object-fit-cover"
              />
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
          ))}

        {/* 3️⃣ Empty state */}
        {files.length === 0 && oldImagesState.length === 0 && (
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
