import { useEffect } from 'react';
import { Link, usePage } from '@inertiajs/react';
import 'bootstrap/dist/css/bootstrap.min.css';
import '../../assets/vendor/css/core.css';
import '../../assets/vendor/css/theme-default.css';
import '../../assets/css/demo.css';
import '../../assets/css/style.css';
import '../../assets/vendor/fonts/boxicons.css';
import '../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css';
import '../../assets/vendor/libs/apex-charts/apex-charts.css';
import Navbar from '@/Components/Admin/Navbar';
import Sidebar from '@/Components/Admin/Sidebar';
import 'react-toastify/dist/ReactToastify.css';
import { ToastContainer, toast } from 'react-toastify';

export default function AdminLayout({ children }) {
    const { auth } = usePage().props;
    const { flash } = usePage().props;

    useEffect(() => {
        if (flash?.success) toast.success(flash.success);
        if (flash?.error) toast.error(flash.error);
    }, [flash]);


    useEffect(() => {
        import('../../assets/js/config.js');
        import('../../assets/vendor/js/helpers.js');
    }, []);

    return (
        <div className="layout-wrapper layout-content-navbar">
            <div className="layout-container">
                {/* Toast container only once */}
                <ToastContainer
                    position="top-right"
                    autoClose={3000}
                    hideProgressBar={false}
                    newestOnTop={true}
                    closeOnClick
                    pauseOnHover
                    theme="colored"
                />

                {/* Sidebar */}
                <Sidebar />

                {/* Main Content */}
                <div className="layout-page">
                    {/* Navbar */}

                    <Navbar auth={auth} />

                    {/* Page Content */}
                    <div className="content-wrapper">
                        <div className="container-xxl flex-grow-1 container-p-y">
                        {children}
                        </div>
                        <footer className="content-footer footer bg-footer-theme">
                            <div className="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                                <div className="mb-2 mb-md-0">
                                Copyright &copy;
                                2025
                                , made with ❤️ by
                                <a href="https://themeselection.com" target="_blank" className="footer-link fw-bolder">Tarek</a>
                                </div>
                                <div>
                                </div>
                            </div>
                        </footer>

                        <div className="content-backdrop fade"></div>
                    </div>
                </div>
            </div>
        </div>
    );
}
