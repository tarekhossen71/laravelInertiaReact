import React from 'react';
import { usePage } from '@inertiajs/react';

export default function Permission({ allow, children }) {
  const { auth } = usePage().props;
  const has = auth?.permissions?.includes(allow);
  return has ? children : null;
}
