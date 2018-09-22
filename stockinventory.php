<?php

//extract data of stock.json file for inventory manager
$json = file_get_contents('stock.json');
$jsonarray = json_decode($json, true);
{
    for($i=1;$i<=sizeof($jsonarray);$i++)
    {
        echo"\n";
        echo " name= " . $jsonarray[$i]["name"];
        echo "\n share no= " . $jsonarray[$i]["share_no"];
        echo"\n share value= " . $jsonarray[$i]["share_value"];
        echo"\n total value= " . $jsonarray[$i]["total_amount"];
        echo"\n";
    }     
}
?>