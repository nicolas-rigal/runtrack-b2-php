<?php 

function my_is_prime($n){
    if ($n == 0 || $n == 1){
        return false;
    }
    for ($i = 2; $i < $n; $i++){
        if ($n % $i == 0){
            return false;
        }
    }
    return true;
}

// Test de la fonction avec différents nombres
$numbers_to_check = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15];
foreach ($numbers_to_check as $number) {
    if (my_is_prime($number)) {
        echo "$number est un nombre premier.<br>";
    } else {
        echo "$number N'est pas un nombre premier.<br>";
    }
}
?>