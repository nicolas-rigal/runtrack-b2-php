<?php 
function my_array_sort($tab, $order){
    if ($order == "ASC"){
        sort($tab);
    } elseif ($order == "DESC"){
        rsort($tab);
    }
    return $tab;
}

$tab = [5,6,7,12,3,9,14,1,2,8,4,10,11,13];

$tab = my_array_sort($tab, "ASC");
echo "Tri croissant: ";
foreach ($tab as $number) {
    echo "$number ";
}
echo "<br>";
$tab = my_array_sort($tab, "DESC");
echo "Tri croissant: ";
foreach ($tab as $number) {
    echo "$number ";
}

?>