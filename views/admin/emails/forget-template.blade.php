<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="x-apple-disable-message-reformatting">
  <title>EMI LOCKER</title>
  <style>
    table, td, div, h1, p {font-family: Arial, sans-serif;}
  </style>
</head>
<body style="margin:0;padding:0;">
  <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;background:#ffffff;">
    <tr>
      <td align="center" style="padding:0;">
        <table role="presentation" style="width:602px;border-collapse:collapse;border:1px solid #cccccc;border-spacing:0;text-align:left;">
          <tr >
            <td align="center" style="padding:20px 0 20px 0; background: #ffffff !important; background-repeat: no-repeat !important; background-size: cover !important;">
              {{-- <img src="http://bhusandeshwardev.alobhatech.com/baba-favicon.png" alt="logo" width="100" style="height:100;display:block;" /> --}}
            </td>
          </tr>
          <tr style="background-color: #0f6eb108;">
            <td style="padding:36px 30px 42px 30px;">
              <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
                <tr>
                  <td>
                    <p><b>Hello, {{ $postData['name']??'' }}</b></p>
                    <p style="font-size:16px;margin-bottom:30px;">
                      You recently requested to reset the password for your EMI LOCKER Admin Account. The one-time password (OTP) is <strong>({{ $postData['otp']??'' }})</strong> to reset your password for EMI LOCKER Admin Account.<br>
                      If you did not request a password reset, please ignore this email.
                    </p>
                  </td>
                </tr>

              </table>
            </td>
          </tr>
          <tr style="background-color: #2c2929de;color: #fff;">
            <td style="padding-left: 31px;">
              <p><b>Thanks & Regards,</b></p>
              <p style="font-size:16px;margin-bottom:30px;">EMI LOCKER</p>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</body>
</html>
