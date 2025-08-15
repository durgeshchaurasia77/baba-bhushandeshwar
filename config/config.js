
require('dotenv').config()

module.exports = {
  "development": {
    "username": process.env.DB_USERNAME,
    "password": process.env.DB_PASSWORD,
    "database": process.env.DB_DATABASE,
    "host": process.env.DB_HOST,
    "dialect": "mysql",
    logging: false
  },
  "test": {
    "username": process.env.USERNAME,
    "password": process.env.PASSWORD,
    "database": process.env.DATABASE_NAME,
    "host": process.env.HOSTNAME,
    "dialect": "mysql",
    logging: false
  },
  "production": {
    "username": process.env.USERNAME,
    "password": process.env.PASSWORD,
    "database": process.env.DATABASE_NAME,
    "host": process.env.HOSTNAME,
    "dialect": "mysql",
    logging: false
  }
}

