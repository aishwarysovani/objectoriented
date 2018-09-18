<?php

//extract data of stock.json file for inventory manager
$json = file_get_contents('./stock.json');
$someArray = json_decode($json, true);
print_r($someArray);      

?>