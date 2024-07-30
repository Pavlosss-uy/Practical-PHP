<?php

// Task 7

$arr1=['a','b','c','d'];
$arr2=['c','d','e','f'];
$arr3 = [];
$arr1Len = count($arr1);
$arr2Len = count($arr2);
for($i=0;$i<$arr1Len;$i++){
    for($j=0;$j<$arr2Len;$j++){
        if ($arr1[$i]==$arr2[$j]){
            array_push($arr3,$arr1[$i]);
        }
    }
}
$arr3Len = count($arr3);
for($x = 0; $x < $arr3Len; $x++) {
  echo $arr3[$x];
  echo "<br>";
}
