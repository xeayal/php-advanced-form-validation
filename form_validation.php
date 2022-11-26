<?php

/**
 *
 * Khayal Abilhasanov
 * native php form validation
 *
 */


/*
 * Data types
 * string
 * integer
 * double
 * array
 * object
 */


$_SESSION['form_validation'] = true;
$formValidationMessage = '';
function form_validation($data, $tag, $required = null, $length = null, $type = null){
    //default form valid

    global $formValidationMessage;
    //get data type
    $dataType = gettype($data);

    //required control
    if($required != null && $required == 'required'){

        if($dataType == 'array'){
            //array lenght reuqerid control
            if($length != null && count($data) != $length){
                $_SESSION['form_validation'] = false;
                $formValidationMessage .= $tag.' not entered correctly <br/>';
            }
        }
        elseif($dataType != 'object' && $dataType != 'array' && gettype((string)$data) == 'string'){
            if($type != null && $dataType != $type){
                $_SESSION['form_validation'] = false;
                $formValidationMessage .= $tag.' not entered correctly <br/>';
            }
            //string lenght reuqerid control
            if($length != null && strlen((string)$data) != $length){
                if($type != null && $dataType != $type){
                $_SESSION['form_validation'] = false;
                $formValidationMessage .= $tag.' not entered correctly <br/>';
            }
                $_SESSION['form_validation'] = false;
                $formValidationMessage .= $tag.' not entered correctly <br/>';
            }
        }

    }
    elseif($required == null && $length != null){

        if($dataType == 'array'){
            //array lenght reuqerid control
            if($length != null && count($data) != $length){
                $_SESSION['form_validation'] = false;
                $formValidationMessage .= $tag.' not entered correctly <br/>';
            }
        }
        elseif($dataType != 'object' && $dataType != 'array' && gettype((string)$data) == 'string'){
            //string lenght reuqerid control
            if($length != null && strlen((string)$data) != $length){
                $_SESSION['form_validation'] = false;
                $formValidationMessage .= $tag.' not entered correctly <br/>';
            }
        }

    }
    else{
        //type control
        if($type != null && $dataType != $type){
            $_SESSION['form_validation'] = false;
            $formValidationMessage .= $tag.' not entered correctly <br/>';
        }
    }

    $_SESSION['form_validation_message'] = $formValidationMessage;
}



//check form validation
function formValid(){
    return @$_SESSION['form_validation'];
}

//form validation error message
function formValidationMsg(){
    return @$_SESSION['form_validation_message'];
}


//EXAMPLE
// form_validation(data, tag_name, required, lengthm, type);

$data = 'Khayal';

form_validation($data, 'First Name', 'required', 6, 'string');

if(formValid()){
    echo 'Data is valid';
}else{
    echo formValidationMsg();
}