const express = require('express');
const dotenv = require('dotenv');
// require('dotenv').config();
const session = require('express-session');
const flash = require('connect-flash');
const webRoutes = require('./routes/webRoutes');
const adminRoutes = require('./routes/adminRoutes');
const userApiRoutes = require('./routes/userApiRoutes');
const checkSession = require('./middlewares/checkSession');
const permissionMiddleware = require('./helper/permissionHelper');
// const { app, BrowserWindow } = require('electron');
let mainWindow;
dotenv.config();
console.log(dotenv);

const app = express();
// const port = process.env.PORT || 3000;  // If you want to set port from environment

// Middleware
app.use(express.static('public'));
app.use(
  session({
    secret: process.env.SESSION_SECRET,
    resave: false,
    saveUninitialized: false,
    rolling: true,
    cookie: { maxAge: 7200000 }, // 1 hour cookie expiry
  })
);
app.use(permissionMiddleware);
app.use(flash());
app.use((req, res, next) => {
  res.locals.success_msg = req.flash('success_msg');
  res.locals.error_msg = req.flash('error_msg');
  next();
});
app.use(express.json());
app.use(express.urlencoded({ extended: false }));
app.set('view engine', 'ejs');

// Routes
app.use('/', webRoutes);
app.use('/admin',adminRoutes);
app.use('/api',userApiRoutes);
const PORT = process.env.PORT || 4000; //  Define the port
app.listen(PORT, () => console.log(`Server running on http://localhost:${PORT}`));

