<?php

// Task 4

for ($i = 1500;$i <= 2700;$i++){
    if ($i % 5 == 0 and $i % 7 == 0){
        echo "$i ";
    }else{
        continue;
    }
}