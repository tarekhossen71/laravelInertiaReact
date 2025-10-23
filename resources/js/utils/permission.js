export const can = (permissions = [], keys) => {
  if (!permissions || permissions.length === 0) return false;

  // normalize keys to array
  const checkKeys = Array.isArray(keys) ? keys : [keys];

  // return true if any key exists in permissions
  return checkKeys.some(key => permissions.includes(key));
};
