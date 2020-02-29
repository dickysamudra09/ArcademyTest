<?php

    function bilanganPrima($a){
        for($i=1; $i<=$a; $i++){
            $number = 0;
            for($j=1; $j<=$i; $j++){
                if($i % $j == 0){
                    $number++;
                }
            }
            if($number == 2){
                $arrays = array($i);
                array_push($i);
                print_r($arrays);
            }
        }        
    }

    bilanganPrima(30);

?>