<?php
include "utility.php";
echo"enter number of stocks:";                 //take stock input from user
$stock=checknum();
echo "enter " . $stock . "stock information:";
$name=array();$share_no=array();$share_value=array();
$total_amount=array();

//take information of each stock
for($i=1;$i<=$stock;$i++)
{
    echo"enter " . $i . "name:";
    $name[$i]=checkstring();
    echo"enter " . $i . "no of shares:";
    $share_no[$i]=checknum();
    echo"enter " . $i . "share price:";
    $share_value[$i]=checknum();
}

//calculate total amount for share
for($i=1;$i<=$stock;$i++)
{
    $total_amount[$i]=$share_no[$i] * $share_value[$i];
}


//convert to json data
$data=array();
for($i=1;$i<=$stock;$i++)
{
    $data[$i]['name']=$name[$i];
    $data[$i]['share_no']=$share_no[$i];
    $data[$i]['share_value']=$share_value[$i];
    $data[$i]['total_amount']=$total_amount[$i];
}

//write data in json file
$jsonFile = "stock.json";
$fh = fopen($jsonFile, 'w');
$jsonData = json_encode($data);
file_put_contents('stock.json', $jsonData);

echo"data stored in json file";

?>