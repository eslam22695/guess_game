<?php

class SecretNumber
{
    public function generate()
    {
        $generate = range(0, 9);
        shuffle($generate);

        $guess = array_slice($generate, 0, 5);

        return $guess;
    }
}