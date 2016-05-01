/*
 * Complete the function below.
 */
function validateForm(form_params) {
    var errors = {};
    
    // Title
    errors = validateRequired(form_params, 'title', errors);
    errors = validateMaxLength(form_params, 'title', 20, errors);
    errors = validateType(form_params, 'title', 'string', errors);
    
    // Description
    errors = validateRequired(form_params, 'description', errors);
    errors = validateMaxLength(form_params, 'description', 200, errors);
    errors = validateType(form_params, 'description', 'string', errors);
    
    // Lecturer Name
    errors = validateRequired(form_params, 'lecturer_name', errors);
    errors = validateMaxLength(form_params, 'lecturer_name', 20, errors);
    errors = validateType(form_params, 'lecturer_name', 'string', errors);
    
    // Type
    errors = validateRequired(form_params, 'type', errors);
    errors = validateContainsValue(form_params, 'type', ['elective', 'mandatory'], errors);
    errors = validateType(form_params, 'type', 'string', errors);
    
    // Program
    errors = validateRequired(form_params, 'program', errors);
    errors = validateContainsValue(form_params, 'program', ['bachelor', 'master'], errors);
    errors = validateType(form_params, 'program', 'string', errors);
    
    // Course
    var courseValues = [];
    if (form_params.program !== undefined && form_params.program === 'master') {
        courseValues = [0,1,2];
    }
    else {
        courseValues = [0,1,2,3,4];
    }
    errors = validateRequired(form_params, 'course', errors);
    errors = validateContainsValue(form_params, 'course', courseValues, errors);
    var form_course = { course: parseInt(form_params.course) };
    errors = validateType(form_course, 'course', 'number', errors);
    
    // Lecturer Email
    errors = validateMaxLength(form_params, 'lecturer_email', 20, errors);
    errors = validateEmail(form_params, 'lecturer_email', errors);
    errors = validateType(form_params, 'lecturer_email', 'string', errors);

    return errors;
}

function validateRequired(data, key, errors) {
    if (data[key] === undefined || data[key].length === 0) {
        errors[key] = key + " - е задължително";
    }
    return errors;
}

function validateMaxLength(data, key, length, errors) {
    if (data[key] !== undefined && data[key].length > length) {
        errors[key] = key + " - е прекалено дълго. Максимална дължина " + length;
    }
    return errors;
}

function validateContainsValue(data, key, values, errors) {
    if (data[key] !== undefined) {
      var contains = values.filter(function(value) {
         return value == data[key]; 
      });
        
      if (contains.length == 0) {
          errors[key] = key + " - не отговаря на изискванията. Изберете една от възможните стойности. ";
      }
    }
    return errors;
}

function validateEmail(data, key, errors) {
    var regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (data[key] !== undefined && !regex.test(data[key])) {
        errors[key] = key + " - не e валиден адрес";
    }
        
    return errors;
}

function validateType(data, key, type, errors) {
    if (data[key] === undefined || typeof data[key] !== type) {
        errors[key] = key + " - е трябва да бъди от тип " + type;
    }
    return errors;
}
