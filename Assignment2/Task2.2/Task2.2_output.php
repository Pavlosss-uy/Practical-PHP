<?php
session_start();
include("Task2.2_func.php");
echo "The total price before is ". total($_SESSION['price'],$_SESSION['piece']) . "<br> and after is ". discount($_SESSION['price'],$_SESSION['piece']);
echo "<br>";
echo "<a href='Task2.2_back.php'>Back</a>";
?>