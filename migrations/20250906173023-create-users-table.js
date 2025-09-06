'use strict';

/** @type {import('sequelize-cli').Migration} */
module.exports = {
  async up (queryInterface, Sequelize) {
     await queryInterface.createTable('users', {
      id: {
        type: Sequelize.INTEGER,
        primaryKey: true,
        autoIncrement: true
      },
      name: {
        type: Sequelize.STRING(100),
        allowNull: true
      },
      email: {
        type: Sequelize.STRING(100),
        allowNull: true,
        unique: true
      },
      password: {
        type: Sequelize.STRING(255),
        allowNull: true
      },
      api_token: {
        type: Sequelize.STRING(255),
        allowNull: true
      },
      forgot_otp: {
        type: Sequelize.STRING(50),
        allowNull: true
      },
      status: {
        type: Sequelize.TINYINT,
        defaultValue: 1
      },
      created_at: {
        type: Sequelize.DATE,
        defaultValue: Sequelize.literal('CURRENT_TIMESTAMP')
      }
    });
  },

  async down (queryInterface, Sequelize) {
    await queryInterface.dropTable('users');
  }
};
