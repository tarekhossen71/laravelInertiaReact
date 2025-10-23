import React from "react";

export default function TextAreaBox({
  labelName = "",
  name,
  value = "",
  placeholder = "",
  onChange,
  errors = {},
  required = false,   // ✅ HTML required
  showStar = '',   // ✅ label er pase star
  rows = 4,
  groupClass = "mb-3",
  textareaClass = "form-control",
}) {
  return (
    <div className={groupClass}>
      {labelName && (
        <label htmlFor={name} className={`form-label fw-semibold ${showStar}`}>
          {labelName}
        </label>
      )}

      <textarea
        id={name}
        name={name}
        rows={rows}
        className={`${textareaClass} ${errors[name] ? "is-invalid" : ""}`}
        placeholder={placeholder}
        value={value}
        onChange={onChange}
      ></textarea>

      {errors[name] && <div className="invalid-feedback">{errors[name]}</div>}
    </div>
  );
}
