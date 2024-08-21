<?php

session_start();

$pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/';
$errors = [];


if (isset($_POST['sumbit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors[] = "Invalid email";
    }
    
    if (strlen($_POST["password"]) <= 8) {
        $errors[] = "Your Password Must Contain At Least 8 Characters!";
    }
    elseif(!preg_match("#[0-9]+#", $password)) {
        $errors[] = "Your Password Must Contain At Least 1 Number!";
    }
    elseif(!preg_match("#[A-Z]+#", $password)) {
        $errors[] = "Your Password Must Contain At Least 1 Capital Letter!";
    }
    elseif(!preg_match("#[a-z]+#", $password)) {
        $errors[] = "Your Password Must Contain At Least 1 Lowercase Letter!";
    }

    if(empty($errors)){
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;

        header("location: all_products.php");
    }else {
        $_SESSION['errors'] = $errors;
        header("location: account.php");
    }

}

if (isset($_POST['done'])){
    $username = $_POST['username'];
    $email;
    $password;
    $phoneNum = $_POST['phone-number'];
    $facebookAcc = $_POST['facebook-acc'];
    $instagramAcc = $_POST['instagram-acc'];
    $xAcc = $_POST['x-acc'];


    if(! ctype_alnum($username)){
        $errors[] = "Invalid username";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors[] = "Invalid email";
    }
    
    if (strlen($_POST["password"]) <= 8) {
        $errors[] = "Your Password Must Contain At Least 8 Characters!";
    }
    elseif(!preg_match("#[0-9]+#", $password)) {
        $errors[] = "Your Password Must Contain At Least 1 Number!";
    }
    elseif(!preg_match("#[A-Z]+#", $password)) {
        $errors[] = "Your Password Must Contain At Least 1 Capital Letter!";
    }
    elseif(!preg_match("#[a-z]+#", $password)) {
        $errors[] = "Your Password Must Contain At Least 1 Lowercase Letter!";
    }

    if(preg_match("#/^[0-9]{10}+$/#", $phoneNum)){
        $errors[] = "Invalid phone number";
    }

    if(filter_var($facebookAcc, FILTER_VALIDATE_URL)){
        $errors[] = "Invalid URL";
    }

    if(filter_var($instagramAcc, FILTER_VALIDATE_URL)){
        $errors[] = "Invalid URL";
    }

    if(filter_var($xAcc, FILTER_VALIDATE_URL)){
        $errors[] = "Invalid URL";
    }

    if(empty($errors)){
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        $_SESSION['phone-number'] = $phoneNum;
        $_SESSION['facebook-acc'] = $facebookAcc;
        $_SESSION['instagram-acc'] = $instagramAcc;
        $_SESSION['x-acc'] = $xAcc;

        header("location: home.php");
    }else {
        $_SESSION['errors'] = $errors;
        header("location: account.php");
    }

}


?>