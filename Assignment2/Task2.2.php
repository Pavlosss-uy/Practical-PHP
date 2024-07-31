<?php

function discount($price,$piece){
    $res = total($price,$piece);
    if($res > 10000){
        $res = $res - ($res * 15)/100;
    }else{
        $res = $res - ($res * 10)/100;
    }
    return $res;
}

function total ($num1,$num2){
    return $num1*$num2;
}

if (isset($_POST['order'])){
    $price = $_POST['price'];
    $piece = $_POST['piece'];

    echo "The total price before is ". total($price,$piece) . "<br> and after is ". discount($price,$piece);
}
?>

<form method="POST" action="">
    <input type="number" name="price" placeholder= "price">
    <br>
    <input type="number" name="piece" placeholder= "pieces">
    <br>
    <input type="submit" name="order" value="order">
</form>
