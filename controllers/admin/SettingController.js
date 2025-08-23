let db = require("../../models")
const Setting = db.Setting;
const path = require('path');
const fs = require('fs');


exports.edit = async (req, res) => {
  
  const data = await Setting.findOne();
  // if (!data) {
  //   return res.status(404).render('error', { message: 'Page not found.' });
  // }

  res.render('admin/setting/edit', { data: data || {} });
};
exports.update = async (req, res) => {
  try {
    const { 
      address,
      phone,
      email,
      website_url,
      facebook_url,
      twitter_url,
      instagram_url,
      linkedin_url
    } = req.body;

    // -------- Validation --------
    if (!address || address.trim() === '') {
      return res.json({ responseCode: 400, responseMessage: 'Please enter address!' });
    }

    if (!phone || phone.trim() === '') {
      return res.json({ responseCode: 400, responseMessage: 'Please enter phone number!' });
    }
    // Phone number format (10–15 digits)
    if (!/^[0-9]{10,15}$/.test(phone)) {
      return res.json({ responseCode: 400, responseMessage: 'Please enter valid phone number!' });
    }

    if (!email || email.trim() === '') {
      return res.json({ responseCode: 400, responseMessage: 'Please enter email!' });
    }
    // Email format check
    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
      return res.json({ responseCode: 400, responseMessage: 'Please enter valid email!' });
    }

    // URL validation (optional fields)
    const urlRegex = /^(https?:\/\/)?([\w.-]+)\.([a-z\.]{2,6})([\/\w .-]*)*\/?$/;

    if (website_url && !urlRegex.test(website_url)) {
      return res.json({ responseCode: 400, responseMessage: 'Please enter valid Website URL!' });
    }
    if (facebook_url && !urlRegex.test(facebook_url)) {
      return res.json({ responseCode: 400, responseMessage: 'Please enter valid Facebook URL!' });
    }
    if (twitter_url && !urlRegex.test(twitter_url)) {
      return res.json({ responseCode: 400, responseMessage: 'Please enter valid Twitter URL!' });
    }
    if (instagram_url && !urlRegex.test(instagram_url)) {
      return res.json({ responseCode: 400, responseMessage: 'Please enter valid Instagram URL!' });
    }
    if (linkedin_url && !urlRegex.test(linkedin_url)) {
      return res.json({ responseCode: 400, responseMessage: 'Please enter valid LinkedIn URL!' });
    }

    // -------- Record Update / Create --------
    let setting = await Setting.findOne();

    if (!setting) {
      setting = await Setting.create({
        address,
        phone,
        email,
        website_url,
        facebook_url,
        twitter_url,
        instagram_url,
        linkedin_url
      });
    } else {
      Object.assign(setting, {
        address: address.trim(),
        phone: phone.trim(),
        email: email.trim(),
        website_url: website_url || null,
        facebook_url: facebook_url || null,
        twitter_url: twitter_url || null,
        instagram_url: instagram_url || null,
        linkedin_url: linkedin_url || null
      });
      await setting.save();
    }
    
    req.flash('success_msg', 'Settings updated successfully!');

    return res.json({
      responseCode: 200,
      responseMessage: 'Settings successfully updated.',
      // responseUrl: '/admin/setting/edit'
    });

  } catch (err) {
    // console.error(err);
    req.flash('error_msg', 'Something went wrong.');
    return res.json({ responseCode: 500, responseMessage: 'Server Error.' });
  }
};

