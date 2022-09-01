<?php

include("PlayGame.php");

$guessObj = new PlayGame();

$guess = $guessObj->guess("54231");

var_dump($guess);
