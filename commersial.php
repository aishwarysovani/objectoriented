<?php
include "utility.php";
echo "Stock accounts in file:\n";
$json = file_get_contents('./commerinventory.json');                   //to take file contents of json
$someArray = json_decode($json, true);

$add=0;$remove=0;
$stkacc=new stock_account();                               //object creation
$stkacc->valueOf($someArray["rice"][0]["total_value"],$someArray["rice"][0]["name"]);         //shows account info
echo"\n Do you wont to buy shares or sell shares?";
echo"\n 1. buy   2. sell";
echo"\n enter your choice:";
$choice=readline();
switch($choice)
{
    case 1:echo"\n enter total amount of share which you want to buy:";
            $add=checknum();
            $stkacc->addShare($someArray["rice"][0]["total_value"],$add);         //function to buy shares
            break;
    case 2:echo"\n enter amount of share which you wont to sell:";
            $remove=checknum();
            $stkacc->removeShare($someArray["rice"][0]["total_value"],$remove);     //function to sell shares
            break;
    default: echo"you are not interested? please enter any choice.";
            break;
}

$data1=$stkacc->saveAccount();
$data['new_stock_balance']=$stkacc->saveAccount();          

array_push($someArray, $data);                            //add balance in existing file
$jsonData = json_encode($someArray);
file_put_contents('commerinventory.json', $jsonData);

echo"\n\n ****Stock Reaport****";                          //generate report
echo $stkacc->valueOf($someArray["rice"][0]["total_value"],$someArray["rice"][0]["name"]);
echo"\n bougth shares=" .$add;
echo"\n sold shares=" .$remove;
echo"\n Account balance=" .$data1;


/*{
    "rice": [
 
       {
          "name": "basmati",
          "total_value":"1000"
       }
 
    ]
}*/

?>