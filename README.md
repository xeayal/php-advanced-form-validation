# php-advanced-form-validation
data type, length, required control

# Include the form_validation.php file in your project
include 'form_validation.php';

# Calling the function as in the example below

$data = $_POST['first_name'];
form_validation($data, 'First Name', 'required', 6, 'string');

# Get the result of the check as below

if(formValid()){
    echo 'Data is valid';
}else{
    echo formValidationMsg();
}


## Please subscribe =>  https://bit.ly/3XCaxmU
