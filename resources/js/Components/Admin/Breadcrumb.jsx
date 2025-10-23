import { Link } from '@inertiajs/react';
import React from 'react';

export default function Breadcrumb({ pageTitle, breadcrumb = [] }) {
    return (
        <h4 className="fw-bold py-3 mb-2">
            <span className="text-muted fw-light">
                <Link href={route('app.dashboard')}>Dashboard</Link>
                {breadcrumb.length > 0 && ' / '}
            </span>

            {breadcrumb.map((item, index) => (
                <span key={index}>
                    {index < breadcrumb.length - 1 ? (
                        <>
                            <Link href={item.url}>{item.name}</Link> /
                        </>
                    ) : (
                        <> {item.name}</>
                    )}
                </span>
            ))}

            {breadcrumb.length === 0 && <span> {pageTitle}</span>}
        </h4>
    );
}
