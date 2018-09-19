<?php

$SUITS = array("Clubs", "Diamonds", "Hearts", "Spades");
$RANKS =array("2", "3", "4", "5", "6", "7", "8", "9", "10","Jack", "Queen", "King", "Ace");

$n = sizeOf($SUITS) *sizeOf($RANKS)-1;
        $deck = array($n);

        for($i = 0; $i < sizeOf($RANKS); $i++) {
            for ($j = 0; $j <sizeOf($SUITS); $j++) {
                $deck[sizeOf($SUITS)*$i + $j] = $RANKS[$i] . " of " . $SUITS[$j];
            }
        }

        for($i = 0; $i < $n; $i++) {
            $r = $i + floor(rand(0,1) * ($n-$i));
            $temp = $deck[$r];
            $deck[$r] = $deck[$i];
            $deck[$i] = $temp;
        }

        for ($i = 0; $i < $n; $i++) {
            echo "\n" . $deck[$i];
        }
    
?>