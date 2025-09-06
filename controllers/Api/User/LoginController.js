let db = require("../../../models")
// const CMS = require('../models');
const CMS = db.cms;
const User = db.User;
// console.log(CMS);
const path = require('path');
const fs = require('fs');
const multer = require('multer');
const sharp = require("sharp");
const upload = multer();
const bcrypt = require('bcrypt');
const crypto = require("crypto");
const validateRequiredFields = require("../../../helper/validateFields");

exports.register = async (req, res) => {


    let {name, email, password } = req.body;

    const error = validateRequiredFields(req.body, ["name", "email", "password"]);
    
    if (error) return res.status(400).json(error);

    try {

        const user = await User.findOne({ where: { email } });

        if (user) {
            return res.json({
                responseCode: 404,
                responseMessage: 'This user find in our records.'
            });
        }

        const hashedPassword = await bcrypt.hash(password, 10);

        const newUser = await User.create({ name, email, password: hashedPassword });
        if(newUser){

          return res.json({
                    responseCode: 200,
                    responseMessage: 'Registration successfully completed.',
                });

        }
        

    } catch (err) {
        console.error(err);
        return res.json({
            responseCode: 500,
            responseMessage: 'Something went wrong. Please try again later.'
        });
    }
};


exports.login = async (req, res) => {
  try {
    const { email, password } = req.body;

    const error = validateRequiredFields(req.body, ["email", "password"]);
    if (error) return res.status(400).json(error);

    const user = await User.findOne({ where: { email } });
    if (!user) {
      return res.status(400).json({
        responseCode: 400,
        responseMessage: "User not found"
      });
    }

    const isMatch = await bcrypt.compare(password, user.password);
    if (!isMatch) {
      return res.status(400).json({
        responseCode: 400,
        responseMessage: "Invalid password!"
      });
    }

    // const apiToken = jwt.sign(
    //   { id: user.id, email: user.email },
    //   process.env.JWT_SECRET,
    //   { expiresIn: "1h" }
    // );
    const randomString = crypto.randomBytes(32).toString("hex");
    const apiToken = crypto.createHash("sha256").update(randomString).digest("hex");

    await User.update(
      { api_token: apiToken },
      { where: { id: user.id } }
    );

    return res.json({
      responseCode: 200,
      responseMessage: "Login successful",
      data: {
        id: user.id,
        name: user.name,
        email: user.email,
        api_token: apiToken
      }
    });

  } catch (err) {
    console.error(err);
    return res.status(500).json({
      responseCode: 500,
      responseMessage: "Something went wrong. Please try again later."
    });
  }
};

exports.profile = async (req, res) => {
  try {
    const user = await User.findByPk(req.user_id, {
      attributes: ["id", "name", "email", "status", "created_at"]
    });

    if (!user) {
      return res.status(404).json({
        responseCode: 404,
        responseMessage: "User not found"
      });
    }

    return res.json({
      responseCode: 200,
      responseMessage: "Profile fetched successfully...",
      data: user
    });
  } catch (err) {
    console.error(err);
    return res.status(500).json({
      responseCode: 500,
      responseMessage: "Something went wrong"
    });
  }
};