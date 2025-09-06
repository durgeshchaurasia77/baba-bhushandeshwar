const express = require("express");
const multer = require('multer');
const upload = multer();
const router = express.Router();
const LoginController = require("../controllers/Api/User/LoginController");
const authenticateToken = require("../middlewares/userAuthApi");

router.post('/register',upload.none(), LoginController.register);
router.post('/login', LoginController.login);
router.post('/getProfile',upload.none(),authenticateToken, LoginController.profile);

module.exports = router;
