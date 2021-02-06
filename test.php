<?php
function filterBrackets($counter, $array, $string){
    $NewArray = array();
    $brackets = '';
    $number = 0;
    $newCounter = $counter + 1;
    while ($brackets !== ')'){
        if($array[$newCounter] === ')'){
            $number = intval($array[$newCounter + 1]);
            $brackets = ')';
            continue;
        }
        $newCounter += 1;
    }

    $index = $newCounter - 1;
    $nextCounter = $counter;
    for($nextCounter; $nextCounter <= $index; $nextCounter++){
        if (is_numeric($array[$nextCounter])){
            array_push($NewArray, strval(intval($array[$nextCounter]) * $number));
            continue;  
        }
        array_push($NewArray, $array[$nextCounter]);
    }
    $replacer = implode('', $NewArray);
    $original = substr($string, $counter - 1, $newCounter);
    $count = 1;
    $string = str_replace($original, $replacer, $string, $count); 
    
}



function Main($string){
    $array = str_split($string);
    $counter = 0;
    foreach($array as $ar){
        if($ar === '('){
            $counter += 1;
            filterBrackets($counter, $array, $string);
        }
        $counter += 1;
    }
}

Main('Na1(Cl1)2'); 