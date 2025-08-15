const express = require('express');
const homeController = require('../controllers/website/homeController')
const aboutController = require('../controllers/website/aboutController')
const sampurnLingaController = require('../controllers/website/sampurnLingaController')
const historyController = require('../controllers/website/historyController')
const architectureController = require('../controllers/website/architectureController')
const festivalsController = require('../controllers/website/festivalsController')
const eventsController = require('../controllers/website/eventsController')
const galleryController = require('../controllers/website/galleryController')
const donationController = require('../controllers/website/donationController')

const router = express.Router();

router.get('/', homeController.getHomePage);
router.get('/about-us', aboutController.getHomePage);
router.get('/sampurn-linga', sampurnLingaController.getHomePage);
router.get('/history', historyController.getHomePage);
router.get('/architecture', architectureController.getHomePage);
router.get('/festivals', festivalsController.getHomePage);
router.get('/events', eventsController.getHomePage);
router.get('/shravan-month', eventsController.getDetailsPage);
router.get('/gallery', galleryController.getHomePage);
router.get('/donation', donationController.getHomePage);
router.get('/page/:id', homeController.getPageById);

module.exports = router;
