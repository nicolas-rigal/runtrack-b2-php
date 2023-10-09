<?php 
function my_fizz_buzz($length){
    $result = array();

    for ($i = 1; $i <= $length; $i++) {
        if ($i % 15 === 0) {
            $result[] = 'FizzBuzz';
        } elseif ($i % 3 === 0) {
            $result[] = 'Fizz';
        } elseif ($i % 5 === 0) {
            $result[] = 'Buzz';
        } else {
            $result[] = $i;
        }
    }

    return $result;

$length = 100;
$result = my_fizz_buzz($length);

foreach ($result as $value) {
    echo $value . '<br>';

}
}

?>