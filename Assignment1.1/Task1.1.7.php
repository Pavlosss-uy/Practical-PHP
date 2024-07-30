<?php

// Task 7

$text = "This is a test string";
$textLen = strlen($text);
$count =0;

for ($i=0;$i < $textLen;$i++){
    if ($text[$i] == "i"){
        $count++;
    }
}
echo "$count";