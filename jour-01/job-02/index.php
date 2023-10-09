<?php
function my_strlen($str){
    $i = 0;
    while (isset($str[$i]) && $str[$i] != NULL){
        $i++;
    }
    return $i;
}


function my_str_reverse($Areverse){
    $reversed = "";
    for ($i = my_strlen($Areverse) - 1; $i >= 0; $i--){
        $reversed .= $Areverse[$i];
    }
    return $reversed;
}

$Areverse = "Hello LaPlateforme!";
echo my_str_reverse($Areverse);
?>