import { Link } from '@inertiajs/react';
import React from 'react'

export default function Navbar({ auth }) {

  return (
    <nav className="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme">
        <div className="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            <button
                type="button"
                className="layout-menu-toggle nav-item nav-link px-0 me-xl-4 btn btn-sm btn-outline-secondary"
                onClick={() => {
                    window.Helpers.toggleCollapsed();
                }}
                >
                <i className="bx bx-menu bx-sm"></i>
            </button>
        </div>

        <div className="navbar-nav-right d-flex justify-content-end align-items-center ms-auto">
            <Link href={route('profile.edit')} className="navbar-nav-link d-flex align-items-center">
                <span className="fw-semibold me-3">{auth.user.name}</span>
                <img
                    src={auth.user.image}
                    alt="Avatar"
                    className="w-px-40 h-auto rounded-circle"
                />
            </Link>
        </div>
    </nav>
  )
}

