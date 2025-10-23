import React from "react";

export default function InputBox({
  labelName = "",
  id,
  name,
  type = "text",
  value = "",
  placeholder = "",
  onChange,
  errors = {},
  required = false,   // ✅ HTML required
  showStar = '',   // ✅ label er pase star
  groupClass = "mb-3",
  inputClass = "form-control",
}) {
  return (
    <div className={groupClass}>
      {labelName && (
        <label htmlFor={id ?? name} className={`form-label fw-semibold ${showStar}`}>
          {labelName}
        </label>
      )}

      <input
        id={id ?? name}
        name={name}
        type={type}
        className={`${inputClass} ${errors[name] ? "is-invalid" : ""}`}
        placeholder={placeholder}
        value={value}
        onChange={onChange}
      />

      {errors[name] && <div className="invalid-feedback">{errors[name]}</div>}
    </div>
  );
}
