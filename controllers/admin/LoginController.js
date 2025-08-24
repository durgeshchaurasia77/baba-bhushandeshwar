let db = require("../../models")
// const CMS = require('../models');
const CMS = db.cms;
const Admin = db.Admin;
// console.log(CMS);
const path = require('path');
const fs = require('fs');
const multer = require('multer');
const sharp = require("sharp");
const upload = multer();
const bcrypt = require('bcrypt');

exports.login = async (req, res) => {
  
  try {

    res.render('admin/auth/login');
} catch (err) {
    console.error(err);
    // res.status(500).send('Server Error');
    return res.json({
        responseCode: 500,
        responseMessage: "Server Error.",

    });
}
};
exports.loginSubmit = async (req, res) => {

    let { email, password } = req.body;

    if (!email ) {
        return res.json({
            responseCode: 400,
            responseMessage: 'Please enter Email!'
        });
    }
    if (!password) {
        return res.json({
            responseCode: 400,
            responseMessage: 'Please enter Password!'
        });
    }

    try {
        const user = await Admin.findOne({ where: { email } });

        if (!user) {
            return res.json({
                responseCode: 404,
                responseMessage: 'Email not found in our records.'
            });
        }

        const match = await bcrypt.compare(password, user.password);
        if (!match) {
            return res.json({
                responseCode: 401,
                responseMessage: 'You entered an incorrect password.'
            });
        }

        if (user.status !== 1) {
            return res.json({
                responseCode: 403,
                responseMessage: 'Your account is inactive.'
            });
        }

        // Save user to session
        req.session.loggedin = true;
        req.session.user = user.dataValues;

        return res.json({
            responseCode: 200,
            responseMessage: 'You have successfully logged in.',
            responseUrl: '/admin/dashboard'
        });

    } catch (err) {
        console.error(err);
        return res.json({
            responseCode: 500,
            responseMessage: 'Something went wrong. Please try again later.'
        });
    }
};


exports.dashboard = async (req, res) => {

    try {

          res.render('admin/index');

      } 
    catch (err) {
      console.error(err);
      return res.json({
          responseCode: 500,
          responseMessage: 'Something went wrong. Please try again later.'
      });
    }
};
exports.profile = async (req, res) => {
  
  try {
        const data = await Admin.findOne();
    // res.render('admin/auth/profile');
     res.render('admin/auth/profile', { data: data || {} });
} catch (err) {
    console.error(err);
    // res.status(500).send('Server Error');
    return res.json({
        responseCode: 500,
        responseMessage: "Server Error.",

    });
}
};

exports.profileUpdate = async (req, res) => {
  try {
    const { name, mobile, email } = req.body;

    // -------- Validation --------
    if (!name || name.trim() === "") {
      return res.json({ responseCode: 400, responseMessage: "Please enter name!" });
    }

    if (!mobile || mobile.trim() === "") {
      return res.json({ responseCode: 400, responseMessage: "Please enter mobile number!" });
    }
    if (!/^[0-9]{10,15}$/.test(mobile)) {
      return res.json({ responseCode: 400, responseMessage: "Please enter valid mobile number!" });
    }

    if (!email || email.trim() === "") {
      return res.json({ responseCode: 400, responseMessage: "Please enter email!" });
    }
    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
      return res.json({ responseCode: 400, responseMessage: "Please enter valid email!" });
    }

    // -------- Record Update --------
    let data = await Admin.findOne(); // maan le ek hi admin record h
    // -------- File Upload (if image uploaded) --------
    let imagePath = null;
    if (req.file) {
      const uploadDir = path.join(__dirname, "../../public/uploads/admin/profile");
      if (!fs.existsSync(uploadDir)) {
        fs.mkdirSync(uploadDir, { recursive: true });
      }
      // delete image
        if (data.image) {
        const oldPath = path.join(__dirname, "../../public", data.image); 
        // data.image = "/uploads/admin/profile/oldname.webp"
        if (fs.existsSync(oldPath)) {
            fs.unlinkSync(oldPath); // remove old image
        }
        }

      const fileName = `profile-${Date.now()}.webp`;
      const filePath = path.join(uploadDir, fileName);

      await sharp(req.file.buffer)
        .resize(500) // optional resize
        .toFormat("webp")
        .webp({ quality: 80 })
        .toFile(filePath);

      imagePath = `/uploads/admin/profile/${fileName}`;
    // if (data.image) {
    //     const oldPath = path.join(uploadDir, data.image);
    //     if (fs.existsSync(oldPath)) {
    //       fs.unlinkSync(oldPath); // remove old image
    //     }
    //   }
    }

    if (!data) {
      return res.json({ responseCode: 404, responseMessage: "Admin record not found!" });
    }

    data.name = name.trim();
    data.phone = mobile.trim();
    data.email = email.trim();
    if (imagePath) {
      data.image = imagePath;
    }

    await data.save();

    req.flash("success_msg", "Admin data updated successfully!");

    return res.json({
      responseCode: 200,
      responseMessage: "Admin data successfully updated.",
    });

  } catch (err) {
    console.error(err);
    req.flash("error_msg", "Something went wrong.");
    return res.json({ responseCode: 500, responseMessage: "Server Error." });
  }
};

// exports.profileUpdate = async (req, res) => {
//   try {
//     const { 
//       name,
//       mobile,
//       email,
//       image
//     } = req.body;

//     // -------- Validation --------
//     if (!name || name.trim() === '') {
//       return res.json({ responseCode: 400, responseMessage: 'Please enter name!' });
//     }

//     if (!mobile || mobile.trim() === '') {
//       return res.json({ responseCode: 400, responseMessage: 'Please enter mobile number!' });
//     }
//     // mobile number format (10–15 digits)
//     if (!/^[0-9]{10,15}$/.test(mobile)) {
//       return res.json({ responseCode: 400, responseMessage: 'Please enter valid mobile number!' });
//     }

//     if (!email || email.trim() === '') {
//       return res.json({ responseCode: 400, responseMessage: 'Please enter email!' });
//     }
//     // Email format check
//     if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
//       return res.json({ responseCode: 400, responseMessage: 'Please enter valid email!' });
//     }
//     if(image){
//         // WebP output path
//         const uploadDir = path.join(__dirname, "../../public/uploads/admin/profile");
//         if (!fs.existsSync(uploadDir)) {
//         fs.mkdirSync(uploadDir, { recursive: true });
//         }
//         const fileName = `logo-${Date.now()}.webp`;
//         const filePath = path.join(uploadDir, fileName);

//         // Convert to WebP using sharp
//         await sharp(req.file.buffer)
//             .resize(500) // optional resize
//             .toFormat("webp")
//             .webp({ quality: 80 })
//             .toFile(filePath);

//     }

//     // -------- Record Update / Create --------
//     let data = await Admin.findOne();

//       Object.assign(data, {
//         name: name.trim(),
//         phone: mobile.trim(),
//         email: email.trim(),
//         image:
//       });
//       await data.save();

    
//     req.flash('success_msg', 'Admin data updated successfully!');

//     return res.json({
//       responseCode: 200,
//       responseMessage: 'Admin data successfully updated.',
//       // responseUrl: '/admin/setting/edit'
//     });

//   } catch (err) {
//     // console.error(err);
//     req.flash('error_msg', 'Something went wrong.');
//     return res.json({ responseCode: 500, responseMessage: 'Server Error.' });
//   }
// };
exports.changePassword = async (req, res) => {
  
  try {

    res.render('admin/auth/security');
} catch (err) {
    console.error(err);
    // res.status(500).send('Server Error');
    return res.json({
        responseCode: 500,
        responseMessage: "Server Error.",

    });
}
};
exports.updatePassword = async (req, res) => {
  try {
    // console.log("Full Request Body:", req.body);
    const { old_password, new_password, confirm_password } = req.body;
    // Validation
    if (!old_password || !new_password || !confirm_password) {
      return res.json({ responseCode: 400, responseMessage: "All fields are required!" });
    }

    // DB se admin fetch (maan ke chal ek hi admin record hai)
    let admin = await Admin.findOne();
    if (!admin) {
      return res.json({ responseCode: 404, responseMessage: "Admin not found!" });
    }

    // Old password check
    const isMatch = await bcrypt.compare(old_password, admin.password);
    if (!isMatch) {
      return res.json({ responseCode: 400, responseMessage: "Old password is incorrect!" });
    }

    // New password should not be same as old
    const isSame = await bcrypt.compare(new_password, admin.password);
    if (isSame) {
      return res.json({ responseCode: 400, responseMessage: "New password cannot be same as old password!" });
    }

    // Confirm password check
    if (new_password !== confirm_password) {
      return res.json({ responseCode: 400, responseMessage: "Confirm password does not match!" });
    }

    // Hash new password
    const salt = await bcrypt.genSalt(10);
    const hashedPassword = await bcrypt.hash(new_password, salt);

    // Update in DB
    admin.password = hashedPassword;
    await admin.save();

    req.flash("success_msg", "Password updated successfully!");
    return res.json({
      responseCode: 200,
    //   responseMessage: "Password updated successfully!",
    });

  } catch (err) {
    console.error(err);
    req.flash("error_msg", "Something went wrong!");
    return res.json({ responseCode: 500, responseMessage: "Server Error." });
  }
};
exports.logout = (req, res) => {
    req.session.destroy((err) => {
        if (err) {
            console.error('❌ Error destroying session:', err);
            return res.redirect('/admin/dashboard');
        }
        res.clearCookie('connect.sid'); // Session cookie clear
        return res.redirect('/admin/login');
    });
};

