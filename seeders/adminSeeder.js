'use strict';
const bcrypt = require('bcrypt');
const { Admin, sequelize } = require('../models'); // yaha se sahi instance milega

module.exports = {
  async up (queryInterface, Sequelize) {
    // Table migration already CLI se hoti hai, isliye yaha sync ka use mat karo

    const existing = await Admin.findOne({ where: { email: 'admin@gmail.com' } });
    if (!existing) {
      const hashedPassword = await bcrypt.hash('admin123', 10);
      await Admin.create({
        name: 'Super Admin',
        email: 'admin@gmail.com',
        password: hashedPassword,
        status: 1
      });
      console.log('✅ Default admin created: admin@gmail.com / admin123');
    } else {
      console.log('ℹ️ Default admin already exists.');
    }
  },

  async down (queryInterface, Sequelize) {
    await Admin.destroy({ where: { email: 'admin@gmail.com' } });
  }
};
