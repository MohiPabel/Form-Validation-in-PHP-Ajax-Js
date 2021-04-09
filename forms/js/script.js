// Getting form information by id
const fname = document.getElementById('fname');
const lname = document.getElementById('lname');
const email = document.getElementById('email');
const password = document.getElementById('password');
const dob = document.getElementById('dob');
const gender = document.getElementById('gender');
const nationality = document.getElementById('nationality');
const occupation = document.getElementById('occupation');
const website = document.getElementById('website');
const phone = document.getElementById('phone');
const address = document.getElementById('address');
const form = document.getElementById('form');
const errorElement = document.getElementById('form-message');


// When submit button is pressed
form.addEventListener('submit', (e) => {

    // Empty array to keep error messages
    let messages = [];

    // If all input field is empty:
    if (fname.value === '' || fname.value == null ||
        lname.value === '' || lname.value == null ||
        email.value === '' || email.value == null ||
        password.value === '' || password.value == null ||
        dob.value === '' || dob.value == null ||
        gender.value === '' || gender.value == null ||
        nationality.value === '' || nationality.value == null ||
        occupation.value === '' || occupation.value == null ||
        website.value === '' || website.value == null ||
        phone.value === '' || phone.value == null ||
        address.value === '' || address.value == null) {
        messages.push('Please fill in all the fields!');
    }
    // First name and last name check
    else if (/^[a-zA-Z\s]+$/.test(fname.value) == false || /^[a-zA-Z\s]+$/.test(lname.value) == false) {
        messages.push('Name must be in letters and spaces only');
    }
    // Email check
    else if (/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i.test(email.value) == false) {
        messages.push('Write a valid email address!');
    }
    // Password check
    else if (password.value.length <= 8) {
        messages.push('Password must be at least 8 characters long!');
    } else if (/[0-9]+/.test(password.value) == false) {
        messages.push('Password Must Contain At Least 1 Number!');
    } else if (/[A-Z]+/.test(password.value) == false) {
        messages.push('Password Must Contain At Least 1 Capital Letter!');
    } else if (/[a-z]+/.test(password.value) == false) {
        messages.push('Password Must Contain At Least 1 Lowercase Letter!');
    } else if (/[\W]+/.test(password.value) == false) {
        messages.push('Password Must Contain At Least 1 Special Character!');
    }
    // Nationality check
    else if (/^[a-zA-Z\s]+$/.test(nationality.value) == false) {
        messages.push('Nationality must be in letters only!');
    }
    // Occupation check
    else if (/^[a-zA-Z\s]+$/.test(occupation.value) == false) {
        messages.push('Occupation name must be in letters and spaces only!');
    }
    // Website check
    else if (/^((ftp|http|https):\/\/)?(www.)?(?!.*(ftp|http|https|www.))[a-zA-Z0-9_-]+(\.[a-zA-Z]+)+((\/)[\w#]+)*(\/\w+\?[a-zA-Z0-9_]+=\w+(&[a-zA-Z0-9_]+=\w+)*)?$/m.test(website.value) == false) {
        messages.push('Website URL must be a valid URL!');
    }
    // Phone number check
    else if (password.value.length <= 10) {
        messages.push('A valid phone number must be 11 or 11+ digits!');
    }
    // Address check
    else if (/^([a-zA-Z0-9\s]+)(,\s*[a-zA-Z0-9\s]*)*$/.test(address.value) == false) {
        messages.push('Address must be comma separated!');
    }




    // If theres errors in the form
    if (messages.length > 0) {
        e.preventDefault();
        errorElement.classList.add("form-error");
        errorElement.innerText = messages.join(', ');
    }
    // If theres no error in the form
    else {
        errorElement.classList.add("form-success");
        errorElement.innerText = "No errors in the form";
        window.alert("No errors in the form. Press ok to refresh the page!");
    }

})