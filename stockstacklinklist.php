<?php
include "utility.php";
echo "Amount of Stock accounts in file:\n";
$json = file_get_contents('./commerinventory.json');
$someArray = json_decode($json, true);
echo $someArray["rice"][0]["total_value"];
$stklist=new Stack1();
echo"enter your choice: 1. purchesed 2. sold";
$c=checknum();
switch($c)
{
    case 1:purchesed();
        break;
    case 2:sold();
        break;
    default:echo"choose nothing";
        break;
}



function purchesed()
{
    $stklist=new Stack1();
    $json = file_get_contents('./commerinventory.json');
    $someArray = json_decode($json, true);
echo"\n enter total number of share to purchesed:";
$n=checknum();
$add=array();
echo"enter " . $n . " amounts of share to purchesed:";
for($i=0;$i<$n;$i++)
{
$add[$i]=checknum();
$stklist->push($add[$i]);
}
$amount=0;
echo"\n total amount purchesed of share=";
for($i=0;$i<$n;$i++)
{
    $amount=$amount+$stklist->pop($add[$i]);
}
echo $amount;

echo"\n total amount of file become after purchesed:";
$total=$someArray["rice"][0]["total_value"]+$amount;
echo $total;

array_push($someArray, $total);                    
$jsonData = json_encode($someArray);
file_put_contents('commerinventory.json', $jsonData);
}


function sold()
{
    $stklist=new Stack1();
    $json = file_get_contents('./commerinventory.json');
    $someArray = json_decode($json, true);
echo"\n enter total number of share to sold:";
$n=checknum();
$add=array();
echo"enter " . $n . " amounts of share to sold which less than account value:";
for($i=0;$i<$n;$i++)
{
$remove[$i]=checknum();
$stklist->push($remove[$i]);
}
$amount=0;
echo"\n total amount sold of share=";
for($i=0;$i<$n;$i++)
{
    $amount=$amount+$stklist->pop($remove[$i]);
}
echo $amount;

echo"\n total amount of file become after sold:";
$total=$someArray["rice"][0]["total_value"]-$amount;
echo $total;

array_push($someArray, $total);                    
$jsonData = json_encode($someArray);
file_put_contents('commerinventory.json', $jsonData);
}

?>