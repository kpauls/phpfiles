<?php
 
//prevent access if they haven't submitted the form.
if (!isset($_POST['submit'])) {
    die(header("Location: form.php"));
}
 
session_start();
 
$_SESSION['formAttempt'] = true;
 
if (isset($_SESSION['error'])) {
    unset($_SESSION['error']);
}
$_SESSION['error'] = array();
 
$required = array("name","email","password1","password2");
 
//Check required fields
foreach ($required as $requiredField) {
    if (!isset($_POST[$requiredField]) || $_POST[$requiredField] == "") {
        $_SESSION['error'][] = $requiredField . " is required.";
    }
}
 
if (!preg_match('/^[w .]+$/',$_POST['name'])) {
    $_SESSION['error'][] = "Name must be letters and numbers only.";
}
 
 
$validStates = array("Alabama","California","Colorado","Florida","Illinois","New Jersey","New
York","Wisconsin");
if (isset($_POST['state']) && $_POST['state'] != "") {
    if (!in_array($_POST['state'],$validStates)) {
        $_SESSION['error'][] = "Please choose a valid state";
    }
}
 
if (isset($_POST['zip']) && $_POST['zip'] != "") {
    if (!preg_match('/^[d]+$/',$_POST['zip'])) {
        $_SESSION['error'][] = "ZIP should be digits only.";
    } else if (strlen($_POST['zip']) < 5 || strlen($_POST['zip']) > 9) {
        $_SESSION['error'][] = "ZIP should be between 5 and 9 digits";
    }
}
 
if (isset($_POST['phone']) && $_POST['phone'] != "") {
    if (!preg_match('/^[d]+$/',$_POST['phone'])) {
        $_SESSION['error'][] = "Phone number should be digits only";
    } else if (strlen($_POST['phone']) < 10) {
        $_SESSION['error'][] = "Phone number must be at least 10 digits";
    }
    if (!isset($_POST['phonetype']) || $_POST['phonetype'] == "") {
        $_SESSION['error'][] = "Please choose a phone number type";
    } else {
        $validPhoneTypes = array("work","home");
        if (!in_array($_POST['phonetype'],$validPhoneTypes)) {
            $_SESSION['error'][] = "Please choose a valid phone number type.";
        }
    }
}
 
if (!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {
    $_SESSION['error'][] = "Invalid e-mail address";
}
 
if ($_POST['password1'] != $_POST['password2']) {
    $_SESSION['error'][] = "Passwords don't match";
}
 
//final disposition
if (count($_SESSION['error']) > 0) {
    die(header("Location: form.php"));
} else {
    unset($_SESSION['formAttempt']);
    die(header("Location: success.php"));
}
?>