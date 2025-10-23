export const can = (permissions = [], key) => {
  if (!permissions) return false;
  return permissions.includes(key);
};
