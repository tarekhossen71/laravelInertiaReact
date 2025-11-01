import React, { useRef, useState, useEffect } from "react";
import { getAppUrl } from "@/config/appConfig";

export function MultipleImageUpload({ labelName = "Upload Images", name = "files", multiple = true, image = [], onChange, errors = {} }) {
  const baseUrl = getAppUrl();
  const inputRef = useRef(null);
  const [files, setFiles] = useState([]);
  const [oldImages, setOldImages] = useState(image || []);

  const handleFiles = (selectedFiles) => {
    const mapped = Array.from(selectedFiles).map((file) => ({
      file,
      preview: URL.createObjectURL(file),
    }));
    const updatedFiles = [...files, ...mapped];
    setFiles(updatedFiles);

    if (onChange)
      onChange({
        newFiles: updatedFiles.map(f => f.file),
        oldFiles: oldImages,
      });
  };

  const removeNewFile = (index) => {
    const updated = files.filter((_, i) => i !== index);
    setFiles(updated);
    if (onChange)
      onChange({ newFiles: updated.map(f => f.file), oldFiles: oldImages });
  };

  const removeOldFile = (index) => {
    const updated = oldImages.filter((_, i) => i !== index);
    setOldImages(updated);
    if (onChange)
      onChange({ newFiles: files.map(f => f.file), oldFiles: updated });
  };

  useEffect(() => {
    return () => {
      files.forEach(f => URL.revokeObjectURL(f.preview));
    };
  }, [files]);

  return (
    <div className="mb-3">
      {labelName && <label className="form-label fw-semibold">{labelName}</label>}

      <div
        className="border rounded p-3 text-center position-relative"
        style={{ minHeight: "130px", display: "flex", flexWrap: "wrap", gap: "10px", justifyContent: "center", alignItems: "center", cursor: "pointer" }}
        onClick={() => inputRef.current.click()}
        onDragOver={(e) => e.preventDefault()}
        onDrop={(e) => { e.preventDefault(); handleFiles(e.dataTransfer.files); }}
      >
        <input ref={inputRef} type="file" name={name} multiple accept="image/*" hidden onChange={(e) => handleFiles(e.target.files)} />

        {/* Old Images */}
        {oldImages.map((img, idx) => (
          <div key={`old-${idx}`} className="position-relative" style={{ width: "120px", height: "120px", borderRadius: "10px", overflow: "hidden", border: "1px solid #ddd" }}>
            <img src={baseUrl + img} alt="Old" className="w-100 h-100 object-fit-cover" />
            <button type="button" className="btn btn-sm btn-danger position-absolute top-0 end-0 m-1 p-1" onClick={(e) => { e.stopPropagation(); removeOldFile(idx); }}>
              ✕
            </button>
          </div>
        ))}

        {/* New Files */}
        {files.map((item, idx) => (
          <div key={`new-${idx}`} className="position-relative" style={{ width: "120px", height: "120px", borderRadius: "10px", overflow: "hidden", border: "1px solid #ddd" }}>
            <img src={item.preview} alt={item.file.name} className="w-100 h-100 object-fit-cover" />
            <button type="button" className="btn btn-sm btn-danger position-absolute top-0 end-0 m-1 p-1" onClick={(e) => { e.stopPropagation(); removeNewFile(idx); }}>
              ✕
            </button>
          </div>
        ))}

        {/* Empty State */}
        {files.length === 0 && oldImages.length === 0 && <p className="text-muted">Drag & Drop or Click to Upload</p>}
      </div>

      {errors[name] && <div className="invalid-feedback d-block">{errors[name]}</div>}
    </div>
  );
}
