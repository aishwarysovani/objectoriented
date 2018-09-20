<?php
include "utility.php";
$q1 = new queue1();                               //object of queue implemented by linked list

$filecontent = file_get_contents("datetime.json");
$json = json_decode($filecontent, true);             //decode file cintents

$k = $json[1][0]["Purchase date"];
    $q1->Enqueue($k);                                 //enqueue purchesed date
if ($json[1][0]["Sold date"] != "00-00-00") {
        $k1 = $json[1][0]["Sold date"];
        $q1->Enqueue($k1);                           //enqueue sold date
    }

$n = $q1->size();
for ($i = 0; $i < $n; $i++) {
     echo $q1->Dqueue() . "\n";                        //dequeue all dates in queue
 }