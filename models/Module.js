'use strict';
const { Model } = require('sequelize');

module.exports = (sequelize, DataTypes) => {
  class Module extends Model {
    static associate(models) {
      Module.belongsToMany(models.Roles, {
        through: 'role_modules',
        foreignKey: 'module_id',
        otherKey: 'role_id',
        as: 'Roles'
      });
    }
  }

  Module.init({
    name: DataTypes.STRING,
    slug: DataTypes.STRING
  }, {
    sequelize,
    modelName: 'Module',
    tableName: 'modules',
    timestamps: true,
    createdAt: 'created_at',
    updatedAt: 'updated_at'
  });

  return Module;
};
