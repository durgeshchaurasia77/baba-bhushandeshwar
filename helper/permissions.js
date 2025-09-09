// helper/getPermissions.js
const { Roles, Module } = require('../models');

async function getPermissionsByRole(roleId) {
  const role = await Roles.findByPk(roleId, {
    include: {
      model: Module,
      as: 'Modules', 
      attributes: ['slug']
    }
  });

  if (!role) return [];

  return role.Modules.map(m => m.slug);
}

module.exports = getPermissionsByRole;
