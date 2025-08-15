module.exports = (req, res, next) => {
    if (req.session && req.session.loggedin) {
        return next(); // Continue to controller
    } else {
        return res.redirect('/admin/login'); // Not logged in → redirect
    }
};
