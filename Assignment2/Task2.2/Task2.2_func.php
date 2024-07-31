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

