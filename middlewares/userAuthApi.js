// const jwt = require("jsonwebtoken");
const { User } = require("../models");

async function authenticateToken(req, res, next) {

    const userId = req.headers["id"];
    const apiToken = req.headers["api_token"];

    if (!userId || !apiToken) {
        return res.status(401).json({
        responseCode: 401,
        responseMessage: "User ID and API Token are required in headers"
        });
    }

    try { 
        const user = await User.findOne({ where: { id: userId, api_token: apiToken } });

        if (!user) {
        return res.status(403).json({
            responseCode: 403,
            responseMessage: "Invalid token or user not found"
        });
        }

        req.user_id = user.id;
        next();
    } catch (err) {
        return res.status(500).json({
        responseCode: 500,
        responseMessage: "Something went wrong"
        });
    }

}

module.exports = authenticateToken;
