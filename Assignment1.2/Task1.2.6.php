<?php

// Task 6

$tests=[6,4,9,3,12,8,7];
sort($tests);

$testsLen = count($tests);
for($x = 0; $x < $testsLen; $x++) {
  echo $tests[$x];
  echo "<br>";
}