<?php 
function my_is_multiple($n, $m){
    if ($n % $m == 0){
        return true;
    }
    else{
        return false;
    }
}

$n = 10;
$m = 3;

if (my_is_multiple($n, $m)){
    echo "$n est un multiple de $m.";
}
else{
    echo "$n n'est pas un multiple de $m.";
}

?>