import React, { useRef, useState, useEffect } from "react";
import { getAppUrl } from "@/config/appConfig";

export function SingleImageUpload({ labelName = "Upload Image", name = "file", image = null, onChange, errors = {} }) {
  const baseUrl = getAppUrl();
  const inputRef = useRef(null);
  const [file, setFile] = useState(null);
  const [oldImage, setOldImage] = useState(image);

  const handleFile = (selectedFile) => {
    const newFile = {
      file: selectedFile[0],
      preview: URL.createObjectURL(selectedFile[0]),
    };
    setFile(newFile);
    setOldImage(null); // old image replace hoye jabe

    if (onChange) onChange(newFile.file);
  };

  const removeFile = () => {
    setFile(null);
    if (onChange) onChange(null);
  };

  return (
    <div className="mb-3">
      {labelName && <label className="form-label fw-semibold">{labelName}</label>}

      <div
        className="border rounded p-3 text-center position-relative"
        style={{ minHeight: "130px", cursor: "pointer" }}
        onClick={() => inputRef.current.click()}
      >
        <input
          ref={inputRef}
          type="file"
          name={name}
          accept="image/*"
          hidden
          onChange={(e) => handleFile(e.target.files)}
        />

        {/* Preview */}
        {file ? (
          <div className="position-relative" style={{ width: "120px", margin: "0 auto" }}>
            <img src={file.preview} alt="Preview" className="w-100 h-100 object-fit-cover" />
            <button
              type="button"
              className="btn btn-sm btn-danger position-absolute top-0 end-0 m-1 p-1"
              onClick={(e) => { e.stopPropagation(); removeFile(); }}
            >
              ✕
            </button>
          </div>
        ) : oldImage ? (
          <div className="position-relative" style={{ width: "120px", margin: "0 auto" }}>
            <img src={baseUrl + oldImage} alt="Old" className="w-100 h-100 object-fit-cover" />
            <button
              type="button"
              className="btn btn-sm btn-danger position-absolute top-0 end-0 m-1 p-1"
              onClick={(e) => { e.stopPropagation(); setOldImage(null); if(onChange) onChange(null); }}
            >
              ✕
            </button>
          </div>
        ) : (
          <p className="text-muted">Click to Upload</p>
        )}
      </div>

      {errors[name] && <div className="invalid-feedback d-block">{errors[name]}</div>}
    </div>
  );
}
