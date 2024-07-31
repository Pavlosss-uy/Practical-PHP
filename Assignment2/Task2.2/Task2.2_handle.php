<?php

session_start();

include("Task2.2_func.php");
$errors = [];

if (isset($_POST['order'])){
    $price = $_POST['price'];
    $piece = $_POST['piece'];

    if (! is_numeric($price)){
        $errors[] = "The price should be a number";
    }elseif($price < 0){
        $errors[] = "The price should be a positive number";
    }elseif (! is_numeric($piece)) {
        $errors[] = "The piece should be a number";
    }elseif($piece < 0){
        $errors[] = "The piece should be a positive number";
    }

    if(empty($errors)){
        $_SESSION['price'] = $price;
        $_SESSION['piece'] = $piece;
        header("location: Task2.2_output.php");
    }else {
        $_SESSION['errors'] = $errors;
        header("location: Task2.2_home.php");
    }
}
?>