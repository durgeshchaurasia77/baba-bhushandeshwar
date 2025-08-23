const express = require('express');
const multer = require('multer');
const upload = multer();
// const authMiddleware = require('../middlewares/auth');
const checkSession = require('../middlewares/checkSession');
const LoginController = require('../controllers/admin/LoginController')
const CMSController = require('../controllers/admin/CMSController')
const SettingController = require('../controllers/admin/SettingController')

const router = express.Router();

router.get('/login', LoginController.login);
router.post('/admin_login_submit',upload.none(), LoginController.loginSubmit);
router.get('/dashboard',checkSession, LoginController.dashboard);
router.get('/cms',checkSession, CMSController.index);
router.get('/cms/edit/:id', CMSController.getPageById);
router.post('/cms/update',checkSession, upload.none(), CMSController.update);
router.get('/setting/edit', SettingController.edit);
router.post('/setting/update',checkSession, upload.none(), SettingController.update);
router.get('/logout', LoginController.logout);

module.exports = router;
