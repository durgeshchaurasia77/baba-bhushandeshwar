'use strict';
const {
  Model
} = require('sequelize');
module.exports = (sequelize, DataTypes) => {
  class Setting extends Model {
    /**
     * Helper method for defining associations.
     * This method is not a part of Sequelize lifecycle.
     * The `models/index` file will call this method automatically.
     */
    static associate(models) {
      // define association here
    }
  }
  Setting.init({
    address: DataTypes.STRING,
    email: DataTypes.STRING,
    phone: DataTypes.STRING,
    website_url: DataTypes.STRING,
    facebook_url: DataTypes.STRING,
    twitter_url: DataTypes.STRING,
    instagram_url: DataTypes.STRING,
    linkedin_url: DataTypes.STRING
  }, {
    sequelize,
    modelName: 'Setting',
    tableName: 'setting',
    timestamps: true,
    createdAt: 'created_at',
    updatedAt: 'created_at'
  });
  return Setting;
};
