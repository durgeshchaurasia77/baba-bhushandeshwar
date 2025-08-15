let db = require("../../models")
// const CMS = require('../models');
const CMS = db.cms;
const Admin = db.Admin;
// console.log(CMS);
const path = require('path');
const fs = require('fs');
const multer = require('multer');
const upload = multer();
const bcrypt = require('bcrypt');

exports.login = async (req, res) => {
  
  try {

    res.render('admin/auth/login');
} catch (err) {
    console.error(err);
    // res.status(500).send('Server Error');
    return res.json({
        responseCode: 500,
        responseMessage: "Server Error.",

    });
}
};
exports.loginSubmit = async (req, res) => {

    let { email, password } = req.body;

    if (!email ) {
        return res.json({
            responseCode: 400,
            responseMessage: 'Please enter Email!'
        });
    }
    if (!password) {
        return res.json({
            responseCode: 400,
            responseMessage: 'Please enter Password!'
        });
    }

    try {
        const user = await Admin.findOne({ where: { email } });

        if (!user) {
            return res.json({
                responseCode: 404,
                responseMessage: 'Email not found in our records.'
            });
        }

        const match = await bcrypt.compare(password, user.password);
        if (!match) {
            return res.json({
                responseCode: 401,
                responseMessage: 'You entered an incorrect password.'
            });
        }

        if (user.status !== 1) {
            return res.json({
                responseCode: 403,
                responseMessage: 'Your account is inactive.'
            });
        }

        // Save user to session
        req.session.loggedin = true;
        req.session.user = user.dataValues;

        return res.json({
            responseCode: 200,
            responseMessage: 'You have successfully logged in.',
            responseUrl: '/admin/dashboard'
        });

    } catch (err) {
        console.error(err);
        return res.json({
            responseCode: 500,
            responseMessage: 'Something went wrong. Please try again later.'
        });
    }
};


exports.dashboard = async (req, res) => {

    try {

          res.render('admin/index');

      } 
    catch (err) {
      console.error(err);
      return res.json({
          responseCode: 500,
          responseMessage: 'Something went wrong. Please try again later.'
      });
    }
};
exports.logout = (req, res) => {
    req.session.destroy((err) => {
        if (err) {
            console.error('❌ Error destroying session:', err);
            return res.redirect('/admin/dashboard');
        }
        res.clearCookie('connect.sid'); // Session cookie clear
        return res.redirect('/admin/login');
    });
};

