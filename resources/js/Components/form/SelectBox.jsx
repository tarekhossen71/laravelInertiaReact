import React from "react";

export default function SelectBox({
  labelName = "",
  name,
  value = "",
  onChange,
  errors = {},
required = false,   // ✅ HTML required
  showStar = '',   // ✅ label er pase star
  groupClass = "mb-3",
  selectClass = "form-select",
  children,
}) {
  return (
    <div className={groupClass}>
      {labelName && (
        <label htmlFor={name} className={`form-label fw-semibold ${showStar}`}>
          {labelName}
        </label>
      )}

      <select
        id={name}
        name={name}
        className={`${selectClass} ${errors[name] ? "is-invalid" : ""}`}
        value={value}
        onChange={onChange}
      >
        {children}
      </select>

      {errors[name] && <div className="invalid-feedback">{errors[name]}</div>}
    </div>
  );
}
