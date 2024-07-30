<?php

// Task 1 (version 1)
$age = 20;

if($age >= 18){
    echo "Login approved";
}else{
    echo "Login prohibited";
}

echo "<br>";

// Task 1 (version 2)

$res = $age >= 18 ? 'Login approved' : 'Login prohibited';
echo "$res";
