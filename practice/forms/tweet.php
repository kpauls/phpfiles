<?php
require_once 'functions/htmlform.php';
    
function formWasSubmitted()
{
    return !empty($_POST); 
}

if(formwasSubmitted()){
if( strlen($_POST['tweet'])>10){
    echo 'ERROR! Tweet is longer than 10 characters.';
 }
}

function submittedValue($field)
{
    if(formWasSubmitted()){
        return $_POST[$field];
    }
   return '';
}

?>

