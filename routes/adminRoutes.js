const express = require('express');
const multer = require('multer');
const upload = multer();
// const authMiddleware = require('../middlewares/auth');
const checkSession = require('../middlewares/checkSession');
const LoginController = require('../controllers/admin/LoginController')
const aboutController = require('../controllers/admin/aboutController')
const sampurnLingaController = require('../controllers/admin/sampurnLingaController')
const historyController = require('../controllers/admin/historyController')
const architectureController = require('../controllers/admin/architectureController')
const festivalsController = require('../controllers/admin/festivalsController')
const eventsController = require('../controllers/admin/eventsController')
const galleryController = require('../controllers/admin/galleryController')
const donationController = require('../controllers/admin/donationController')

const router = express.Router();

router.get('/login', LoginController.login);
router.post('/admin_login_submit',upload.none(), LoginController.loginSubmit);
router.get('/dashboard',checkSession, LoginController.dashboard);
// router.get('/sampurn-linga', sampurnLingaController.getHomePage);
// router.get('/history', historyController.getHomePage);
// router.get('/architecture', architectureController.getHomePage);
// router.get('/festivals', festivalsController.getHomePage);
// router.get('/events', eventsController.getHomePage);
// router.get('/shravan-month', eventsController.getDetailsPage);
// router.get('/gallery', galleryController.getHomePage);
// router.get('/donation', donationController.getHomePage);
// router.get('/page/:id', homeController.getPageById);
router.get('/logout', LoginController.logout);

module.exports = router;
