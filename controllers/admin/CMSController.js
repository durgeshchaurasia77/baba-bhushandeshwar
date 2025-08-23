let db = require("../../models")
// const CMS = require('../models');
const CMS = db.cms;
// console.log(CMS);
const path = require('path');
const fs = require('fs');

exports.index = async (req, res) => {
  try {
    let page = parseInt(req.query.page) || 1;
    let limit = 10;
    let offset = (page - 1) * limit;

    const { count, rows } = await CMS.findAndCountAll({
      limit: limit,
      offset: offset,
      order: [['id', 'DESC']]
    });

    let totalPages = Math.ceil(count / limit);

    // Pagination object banao
    const cmsPagination = {
      currentPage: page,
      totalPages: totalPages,
      total: count,
      firstItem: offset + 1,
      lastItem: Math.min(offset + limit, count)
    };

    res.render('admin/cms/index', { 
      cmsList: rows,
      cmsPagination: cmsPagination
    });

  } catch (err) {
    console.error(err);
    return res.json({
      responseCode: 500,
      responseMessage: "Server Error.",
    });
  }
};


exports.getPageById = async (req, res) => {
  
  const cms = await CMS.findByPk(req.params.id);
  if (!cms) {
    return res.status(404).render('error', { message: 'Page not found.' });
  }

  res.render('admin/cms/edit', { cms });
};
exports.update = async (req, res) => {
  try {
    const { id, name, details } = req.body;

    if (!name ) {
        return res.json({
            responseCode: 400,
            responseMessage: 'Please enter name!'
        });
    }
    if (!details) {
        return res.json({
            responseCode: 400,
            responseMessage: 'Please enter details!'
        });
    }
    // Record fetch karo
    const cms = await CMS.findByPk(id);
    if (!cms) {
      return res.status(404).render('error', { message: 'Page not found.' });
    }

    // Update karo
    cms.name = name;
    cms.details = details;
    await cms.save();

    // res.redirect('cms'); 
    return res.json({
            responseCode: 200,
            responseMessage: 'Data successfully saved.',
            responseUrl: '/admin/cms'
        });
  } catch (err) {
    console.error(err);
    return res.status(500).render('error', { message: 'Server Error.' });
  }
};
