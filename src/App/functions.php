<?php 

declare(strict_types=1);

function dumpValue(mixed $value){
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();
}