module.exports = (req, res, next) => {
    if (req.session && req.session.loggedin) {
        // User is logged in → continue
        next();
    } else {
        // User not logged in → redirect to login
        return res.redirect('/admin/login');
    }
};
