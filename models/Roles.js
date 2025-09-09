'use strict';
const { Model } = require('sequelize');

module.exports = (sequelize, DataTypes) => {
  class Roles extends Model {
    static associate(models) {
      // Use models.Module, NOT require('../Module')
      Roles.belongsToMany(models.Module, {
        through: 'role_modules',
        foreignKey: 'role_id',
        otherKey: 'module_id',
        as: 'Modules',
        timestamps: false
      });

      Roles.hasMany(models.Admin, { foreignKey: 'role_id' });
    }
  }

  Roles.init({
    name: DataTypes.STRING,
  }, {
    sequelize,
    modelName: 'Roles',
    tableName: 'roles',
    timestamps: true,
    createdAt: 'created_at',
    updatedAt: 'updated_at'
  });

  return Roles;
};
