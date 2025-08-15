let db = require("../../models")
// const CMS = require('../models');
const CMS = db.cms;
// console.log(CMS);
const path = require('path');
const fs = require('fs');

exports.getHomePage = async (req, res) => {
  
  try {

    const cms = await CMS.findAll(); 
    // console.log(cms);
    res.render('website/festivals', { cms });
} catch (err) {
    console.error(err);
    // res.status(500).send('Server Error');
    return res.json({
        responseCode: 500,
        responseMessage: "Server Error.",

    });
}
};

exports.getPageById = async (req, res) => {
  const cms = await CMS.getById(req.params.id);
  if (!cms) {
    return res.status(404).render('error', { message: 'Page not found.' });
  }
  res.render('page', { cms });
};
