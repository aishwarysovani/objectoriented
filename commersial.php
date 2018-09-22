<?php
include "utility.php";
echo "Stock accounts in file:\n";
$json = file_get_contents('commerstock.json');                   
$someArray = json_decode($json,true);
displaystock();                           
     
echo"\n Do you wont to buy shares or sell shares?";
echo"\n 1. buy   2. sell";
echo"\n enter your choice:";
$choice=readline();
switch($choice)
{
    case 1:$json1 = file_get_contents('user.json'); 
           $json1=json_decode($json1,true);
            echo"\n amount in user account:";
            echo"amount=" . $json1[0]["amount"];
            echo"\n enter how many shares you want to buy:";
            $buy_share=checknum();
            $amount_buyshare=$buy_share * $someArray[0]["amount"];
            if($buy_share <= $someArray[0]["share"] && $amount_buyshare<=$json1[0]["amount"])
            {
                    add_share($buy_share,$someArray[0]["amount"]);
            }       
            break;
    
    case 2:$json1 = file_get_contents('user.json'); 
           $json1=json_decode($json1,true);
           echo"\n shares in user account:";
           echo"shares=" . $json1[0]["share"];
           echo"\n enter how many shares you want to sell:";
           $sell_share=checknum();
           if($json1[0]["share"]>=$sell_share)
           {
                   remove_share($sell_share);
           }
            break;
    
    default: echo"you are not interested? please enter any choice.";
            break;
}
     
echo"\n after doing transaction stock and user account will updated\n";
displaystock();
displayuser();


function displaystock()
{
        $json = file_get_contents('commerstock.json');
        $json=json_decode($json,true);
        {
        for($i=0;$i<sizeof($json);$i++)
        {
            echo "company:". $json[$i]['company'] . "\n";
            echo "symbol:".$json[$i]['symbol'] ."\n";
            echo "share:".$json[$i]['share'] ."\n";
            echo "amount:".$json[$i]['amount'] ."\n";
            echo"\n";
        }
        }
}

function displayuser()
{
        $json1 = file_get_contents('user.json');
        $json1=json_decode($json1,true);
        {
        for($i=0;$i<sizeof($json1);$i++)
        {
            echo "name=". $json1[$i]['name'] . "\n";
            echo "share=" . $json1[$i]['share'] ."\n";
            echo "amount".$json1[$i]['amount'] ."\n";
            echo "company=".$json1[$i]['company'] ."\n";
            echo"\n";
        }
        }  
}

function add_share($share,$amount)
{
        $json = file_get_contents('commerstock.json');
        $json=json_decode($json,true);
        
        $json1 = file_get_contents('user.json');
        $json1=json_decode($json1,true);
        
        $update=$share*$amount;
        $user_amount=$json1[0]["amount"]-$update;
        $json1[0]["amount"]=$user_amount;
        $jsonData1 = json_encode($json1);
        file_put_contents('user.json', $jsonData1);
        
        $json1[0]["share"]=$share;
        $jsonData1=json_encode($json1);
        file_put_contents('user.json', $jsonData1);
        
        $stock_share=$json[0]["share"]-$share;
        $json[0]["share"]=$stock_share;
        $jsonData = json_encode($json);
        file_put_contents('commerstock.json', $jsonData);

}

function remove_share($share)
{
        $json = file_get_contents('commerstock.json');
        $json=json_decode($json,true);
        
        $json1 = file_get_contents('user.json');
        $json1=json_decode($json1,true);

        $amount=$share*$json[0]["amount"];
        $json1[0]["amount"]=$json1[0]["amount"]+$amount;
        $jsonData1=json_encode($json1);
        file_put_contents('user.json',$jsonData1);

        $new_share=$json1[0]["share"]-$share;
        $json1[0]["share"]=$new_share;
        $jsonData1=json_encode($json1);
        file_put_contents('user.json',$jsonData1);

        $com_share=$share+$json[0]["share"];
        $json[0]["share"]=$com_share;
        $jsonData=json_encode($json);
        file_put_contents('commerstock.json',$jsonData);
}
/**[
    {
        "company": "airtel",
        "symbol":"@",
        "share":"3",
        "amount": "1000"
    }
    
] */

/**[
    {
        "name": "gs",
        "share":"0",
        "amount": "1000",
        "company": "airtel"
    }
    
] */
?>