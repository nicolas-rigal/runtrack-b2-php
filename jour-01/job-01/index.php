<?php
function my_strlen($str){
    $i = 0;
    while (isset($str[$i]) && $str[$i] != NULL){
        $i++;
    }
    return $i;
}

function my_str_search($letter, $phrase){
    $letter = strtolower($letter); // Convertir la lettre en minuscules
    $phrase = strtolower($phrase); // Convertir la phrase en minuscules
    $occurrence = 0;
    
    for($i = 0; $i < my_strlen($phrase); $i++){
        if($phrase[$i] == $letter){
            $occurrence++;
        }
    }
    
    return $occurrence;
}

$letter = "o";
$phrase = "Hello LaPlateforme!";
$repetition = my_str_search($letter, $phrase);

echo "Il y a $repetition fois la lettre \"$letter\" dans la phrase \"$phrase\".";
