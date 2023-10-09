<?php 
function my_closset_to_zero($tab){
    $closset = $tab[0];
    foreach ($tab as $number) {
        if (abs($number) < abs($closset)){
            $closset = $number;
        }
    }
    return $closset; 
}

my_closset_to_zero([5,6,7,12,3,9,14,1,2,8,4,10,11,13]);
echo"Le nombre le plus proche de zéro est : ".my_closset_to_zero([5,6,7,12,3,9,14,1,2,8,4,10,11,13]);
?>