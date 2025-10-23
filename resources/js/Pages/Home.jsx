import FrontendLayout from '@/Layouts/FrontendLayout';
import { Link, Head } from '@inertiajs/react';

export default function Welcome() {
    return (
        <>
            <FrontendLayout>
                <Head title="Welcome" />
                <div className="py-4">
                    <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div className="p-6 bg-white border-b border-gray-200">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </FrontendLayout>
        </>
    );
}
