import { Link, usePage } from '@inertiajs/react';
import { can } from '@/utils/permission';
import React from 'react'

export default function Sidebar() {
    const { auth  } = usePage().props;
    const  isActive  = usePage().url;
    // console.log(auth.user.permissions);
    // console.log(isActive);


  return (
    <aside id="layout-menu" className="layout-menu menu-vertical menu bg-menu-theme">
        <div className="app-brand demo">
            <Link href={route('app.dashboard')} className="app-brand-link">
                <span className="app-brand-text demo menu-text fw-bolder ms-2 text-capitalize">Admin</span>
            </Link>
        </div>

        <ul className="menu-inner py-1">
            {can(auth?.user.permissions, 'app.dashboard') && (
                <li className={`menu-item ${isActive === '/dashboard' ? 'active' : ''}`}>
                    <Link href={route('app.dashboard')} className="menu-link">
                        <i className="menu-icon tf-icons bx bx-home-circle"></i>
                        <div>Dashboard</div>
                    </Link>
                </li>
            )}

            {can(auth?.user.permissions, ['app.role.index', 'app.user.index']) && (
                <li className="menu-header small text-uppercase">
                <span className="menu-header-text">Administrator</span>
                </li>
            )}

            {can(auth?.user.permissions, 'app.role.index') && (
                <li className={`menu-item ${isActive === '/role' ? 'active' : ''}`}>
                    <Link href={route('app.role.index')} className="menu-link">
                        <i className="menu-icon tf-icons bx bx-user"></i>
                        <div>Roles</div>
                    </Link>
                </li>
            )}

            {can(auth?.user.permissions, 'app.user.index') && (
                <li className={`menu-item ${isActive === '/user' ? 'active' : ''}`}>
                    <Link href={route('app.user.index')} className="menu-link">
                        <i className="menu-icon tf-icons bx bx-user"></i>
                        <div>Users</div>
                    </Link>
                </li>
            )}

            <li className="menu-header small text-uppercase">
              <span className="menu-header-text">Generel</span>
            </li>

            {/* {can(auth?.user.permissions, 'app.product.index') && ( */}
                <li className={`menu-item ${isActive === '/product' ? 'active' : ''}`}>
                    <Link href={route('app.product.index')} className="menu-link">
                        <i className="menu-icon tf-icons bx bx-user"></i>
                        <div>Products</div>
                    </Link>
                </li>
            {/* )} */}

            <li className="menu-header small text-uppercase">
              <span className="menu-header-text">Settings</span>
            </li>

            {can(auth?.user.permissions, 'app.setting.index') && (
                <li className={`menu-item ${isActive === '/setting' ? 'active' : ''}`}>
                    <Link href={route('app.setting.index')} className="menu-link">
                        <i className="menu-icon tf-icons bx bx-user"></i>
                        <div>Settings</div>
                    </Link>
                </li>
            )}

            <li className={`menu-item ${isActive === '/profile' ? 'active' : ''}`}>
                <Link href={route('profile.edit')} className="menu-link">
                    <i className="menu-icon tf-icons bx bx-user"></i>
                    <div>Profile</div>
                </Link>
            </li>
            <li className="menu-item">
                <Link href={route('logout')} method="post" as="button" className="menu-link">
                    <i className="menu-icon tf-icons bx bx-power-off"></i>
                    <div>Logout</div>
                </Link>
            </li>
        </ul>
    </aside>
  )
}

