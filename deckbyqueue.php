<?php
include "utility.php";
$SUITS = array("Clubs", "Diamonds", "Hearts", "Spades");
$RANKS =array("2", "3", "4", "5", "6", "7", "8", "9", "10","Jack", "Queen", "King", "Ace");
$ar=array();
$d=array();
$que=new queue1();
$deck=new deck();
$d=$deck->deckinitialize($SUITS,$RANKS);
$d=$deck->shuffle($d);

//sorting deck by queue
for ($i = 0; $i < 4; $i++) {
                $i=$i + 1; 
            for ($j = 0; $j < 9; $j++) {
                $ar[$i]=$d[$i + $j * 4];
                $que-> Enqueue($ar[$i]);
            }
}

//to print deck
for ($i = 0; $i < 4; $i++) {
    echo "\n ** Person " . ($i + 1) . " **\n";
  for ($j = 0; $j < 9; $j++) {
      echo"\n" . $que->Dqueue();
  }
}

?>