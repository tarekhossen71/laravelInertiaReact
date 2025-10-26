import React from "react";
import { Link, Head } from "@inertiajs/react";
import 'bootstrap/dist/css/bootstrap.min.css';

export default function FrontendLayout({ children, title }) {
    return (
        <>
            <Head title={title} />
            <nav className="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
                <div className="container">
                    <Link href="/" className="navbar-brand fw-bold text-primary">
                        {/* Utilitfy */}
                    </Link>
                    <div>
                        <Link href={route("login")} className="btn btn-primary">
                            Login
                        </Link>
                    </div>
                </div>
            </nav>

            <main className="container py-5">{children}</main>

            <footer className="text-center py-4 border-top mt-5">
                <small>© {new Date().getFullYear()} Utilitfy. All rights reserved.</small>
            </footer>
        </>
    );
}
