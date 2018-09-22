<?php
include "utility.php";
$SUITS = array("Clubs", "Diamonds", "Hearts", "Spades");
$RANKS =array("2", "3", "4", "5", "6", "7", "8", "9", "10","Jack", "Queen", "King", "Ace");
$ar=array();
$d=array();
$n = sizeOf($SUITS) *sizeOf($RANKS)-1;
$que=new queue1();
$deck=new deck();
$d=$deck->deckinitialize($SUITS,$RANKS);
$d=$deck->shuffle($d);


//sorting deck by queue with rank size and suits size
for($i = 0; $i < sizeOf($RANKS); $i++) {
    for ($j = 0; $j <sizeOf($SUITS); $j++) {
                $ar[$i]=$d[$i + $j * 4];
                $que-> Enqueue($ar[$i]);
    }
}
//to print deck by using queue implemented by linkedlist
echo"\t Person 1 \t Person 2 \tPerson 3 \t Person 4";
    echo"\n \n";
        for ($i = 0; $i < 9; $i++) {
            for ($j = 0; $j < 4; $j++) {
                echo"\t"  . $que->Dqueue();
            }
            echo"\n";
        }

?>