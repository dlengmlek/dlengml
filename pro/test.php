<?php

$array = array(0 => "a", 1 => "b", 2 => "c", 3 => "d");

for($i = 0; $i < count($array); $i++){

echo $array[$i];

unset($array[$i]);

}

?>