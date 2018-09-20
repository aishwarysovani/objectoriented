<?php
include "utility.php";
echo "Stock accounts in file:\n";
$json = file_get_contents('./commerinventory.json');                   //to take file contents of json
$someArray = json_decode($json, true);

$add=0;$remove=0;
$stkacc=new stock_account();                               //object creation
$stkacc->valueOf($someArray["airtel"][0]["total_value"],$someArray["airtel"][0]["name"]);         //shows account info
echo"\n Do you wont to buy shares or sell shares?";
echo"\n 1. buy   2. sell";
echo"\n enter your choice:";
$choice=readline();
switch($choice)
{
    case 1:echo"\n enter total amount of share which you want to buy:";
            $add=checknum();
            $stkacc->addShare($someArray["airtel"][0]["total_value"],$add);         //function to buy shares
            break;
    case 2:echo"\n enter amount of share which you wont to sell:";
            $remove=checknum();
            $stkacc->removeShare($someArray["airtel"][0]["total_value"],$remove);     //function to sell shares
            break;
    default: echo"you are not interested? please enter any choice.";
            break;
}

$data1=$stkacc->saveAccount();
$data2=$stkacc->saveAccount();          

//array_push($someArray, $data); 
$data["airtel"][0]["total_value"]=$data2;                          //add balance in existing file
$jsonData = json_encode($data);
file_put_contents('commerinventory.json', $jsonData);

echo"\n\n ****Stock Reaport****";                          //generate report
echo $stkacc->valueOf($someArray["airtel"][0]["total_value"],$someArray["airtel"][0]["name"]);
echo"\n bougth shares=" .$add;
echo"\n sold shares=" .$remove;
echo"\n remainning share Account balance=" .$data1;


/*{
    "airtel": [
 
       {
          "name": "airtel3G",
          "total_value":"1000"
       }
 
    ]
}*/

?>