<?php

/**
 * array initializes with values
*/
$SUITS = array("Clubs", "Diamonds", "Hearts", "Spades");
$RANKS =array("2", "3", "4", "5", "6", "7", "8", "9", "10","Jack", "Queen", "King", "Ace");

/*
*initialize deck
*/
$n = sizeOf($SUITS) *sizeOf($RANKS)-1;
        $deck = array($n);

        for($i = 0; $i < sizeOf($RANKS); $i++) {
            for ($j = 0; $j <sizeOf($SUITS); $j++) {
                $deck[sizeOf($SUITS)*$i + $j] = $RANKS[$i] . " of " . $SUITS[$j];
            }
        }

    // shuffle the deck
        for($i = 0; $i < $n; $i++) {
            $r = $i + floor(rand(0,1) * ($n-$i));
            $temp = $deck[$r];
            $deck[$r] = $deck[$i];
            $deck[$i] = $temp;
        }

    
    // print shuffled deck in 2d array
    echo"\t Person 1 \t Person 2 \tPerson 3 \t Person 4";
    echo"\n \n";
        for ($i = 0; $i < 9; $i++) {
            for ($j = 0; $j < 4; $j++) {
                echo "\t" . $deck[$i + $j * 4];
            }
            echo"\n";
        }
    
    
?>