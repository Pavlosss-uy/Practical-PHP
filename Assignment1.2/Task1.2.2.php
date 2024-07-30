<?php

// Task 2

$films = ["Fast","Predestination","Pursuit","Prestige"];
$keyword = "Avatar";
$filmsLen = count($films);
$res = true;

for ($i =0;$i< $filmsLen;$i++){
    if ($films[$i]== $keyword){
        $res = true;
        break;
    }else{
        $res = false;
    }
}
if ($res){
    echo "yes";
}else{
    echo "no";
}