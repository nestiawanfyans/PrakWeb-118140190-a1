<?php

echo "Bilangan Prima 1 - 50 : [ ";

for ($i=1; $i <= 50 ; $i++) { 

    $thisPrima = 0;

    for ($j=1; $j<=$i ; $j++) {  
        if($i % $j == 0){
            $thisPrima++;
        }
    }

    if($thisPrima == 2) {
        echo $i . ", ";
    }
}

echo "]";