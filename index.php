<?php

include("PlayGame.php");
include("SecretNumber.php");

$secretObj = new SecretNumber();

$secretNum = $secretObj->generate();

$guessObj = new PlayGame();

$guess = $guessObj->guess("54231",implode("",$secretNum));

var_dump($guess);