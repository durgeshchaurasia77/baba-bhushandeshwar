function validateRequiredFields(body, requiredFields) {
  for (let field of requiredFields) {
    if (!body[field] || body[field].toString().trim() === "") {
      return {
        responseCode: 400,
        responseMessage: `Please enter ${field.charAt(0).toUpperCase() + field.slice(1)}!`
      };
    }
  }
  return null; 
}

module.exports = validateRequiredFields;
