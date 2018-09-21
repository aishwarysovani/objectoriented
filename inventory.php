<?php

// Read JSON file
$json = file_get_contents('./inventory.json');

//Decode JSON
$someArray = json_decode($json,true);
print_r($someArray);                                                                    // Dump all data of the Array
$price_rice=$someArray["rice"][0]["weight"] * $someArray["rice"][0]["price"];
echo "bismati rice price=" . $price_rice;                                                  // Access Array data
$price_pulses=$someArray["pulses"][0]["weight"] * $someArray["pulses"][0]["price"];
echo "\n peas pulses price=" . $price_pulses;
$price_wheats=$someArray["wheats"][0]["weight"] * $someArray["wheats"][0]["price"];
echo "\n ankur wheats price=" . $price_wheats;





?>