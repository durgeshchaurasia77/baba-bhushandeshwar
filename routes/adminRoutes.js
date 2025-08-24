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
router.get('/profile',upload.none(), LoginController.profile);
router.post('/profile/update', upload.single("image"), LoginController.profileUpdate);
router.get('/security',upload.none(), LoginController.changePassword);
router.post('/update-password',upload.none(), LoginController.updatePassword);
router.get('/dashboard', LoginController.dashboard);
router.get('/cms', CMSController.index);
router.get('/cms/edit/:id', CMSController.getPageById);
router.post('/cms/update', upload.none(), CMSController.update);
router.get('/setting/edit', SettingController.edit);
router.post('/setting/update', upload.none(), SettingController.update);
router.get('/logout', LoginController.logout);

module.exports = router;
