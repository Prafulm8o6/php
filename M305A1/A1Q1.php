<?php

$numArray = array(21, 24, 34, 546, 32, 32, 12, 35, 2, 1, 44, 23, 4, 3);

$numOfEle = 0;

foreach ($numArray as $value) {
    $numOfEle += 1;
}

// $numOfEle = count($numArray);

echo "--- Array Of Numbers ---<br>";

foreach ($numArray as $value) {
    echo $value . "  ";
}

echo "<br>";
echo "<br>Number Of Elements : " . $numOfEle . "<br>";
echo "<br>";

for ($i = 0; $i < ($numOfEle - 1); $i++) {
    for ($j = $i + 1; $j < ($numOfEle); $j++) {
        if ($numArray[$i] <= $numArray[$j]) {
            $temp = $numArray[$i];
            $numArray[$i] = $numArray[$j];
            $numArray[$j] = $temp;
        }
    }
}

echo "--- Array Of Numbers ( Decending Order ) ---<br>";

foreach ($numArray as $value) {
    echo $value . "  ";
}

?>