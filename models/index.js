'use strict';

const fs = require('fs');
const path = require('path');
const Sequelize = require('sequelize');
const process = require('process');
const basename = path.basename(__filename);
const env = process.env.NODE_ENV || 'development';
const config = require(__dirname + '/../config/config.js')[env];
const db = {};

let sequelize;
if (config.use_env_variable) {
  sequelize = new Sequelize(process.env[config.use_env_variable], config);
} else {
  sequelize = new Sequelize(config.database, config.username, config.password, config, {
    dialect: 'mysql',
    logging: true
  });
}

db.cms      = require('../models/cms.js')(sequelize, Sequelize);
db.Admin    = require('../models/Admin.js')(sequelize, Sequelize);
db.Setting  = require('../models/Setting.js')(sequelize, Sequelize);
db.User     = require('../models/User.js')(sequelize, Sequelize);
db.Module   = require('../models/Module.js')(sequelize, Sequelize);
db.Roles    = require('../models/Roles.js')(sequelize, Sequelize);

db.sequelize = sequelize;
db.Sequelize = Sequelize;

Object.keys(db).forEach(modelName => {
  if (db[modelName].associate) {
    db[modelName].associate(db);
  }
});

module.exports = db;
