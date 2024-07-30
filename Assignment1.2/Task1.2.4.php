<?php

// Task 4

$films=["avatar","Prestige","avatar","Prestige"];
$keyword= "avatar";
$filmsLen = count($films);
$count =0;

for ($i =0;$i < $filmsLen;$i++){
    if($films[$i]==$keyword){
        $count++;
    }
}
echo "$count";