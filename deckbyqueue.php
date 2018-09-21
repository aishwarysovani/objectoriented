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
for ($i = 0; $i < 4; $i++) {
    echo "\n ** Person " . ($i + 1) . " **\n";
  for ($j = 0; $j < 9; $j++) {
      echo"\n" . $que->Dqueue();
  }
}

?>