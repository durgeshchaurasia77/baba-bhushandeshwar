function permissionMiddleware(req, res, next) {
  res.locals.can = function (permission) {
    console.log('Checking permission:', permission, 'Available:', req.session.permissions);
    return req.session.permissions && req.session.permissions.includes(permission);
  };
  next();
}

module.exports = permissionMiddleware;
