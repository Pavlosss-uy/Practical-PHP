<?php

// Task 5

$tests=array(1,"tariq",1.5,true,7,'s',false);
$testsLen = count($tests);

for ($i=0;$i<$testsLen;$i++){
    if ($tests[$i] == 'true'){
        $tests[$i] = "yes";
    }elseif($tests[$i] == 0){
        $tests[$i] = "no";
    }
}
echo '<pre>';
print_r($tests);
echo '</pre>';