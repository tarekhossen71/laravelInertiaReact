import { usePage } from '@inertiajs/react';

export const getAppUrl = () => {
  const { app_url } = usePage().props;
  return app_url || import.meta.env.VITE_APP_URL || window.location.origin;
};
