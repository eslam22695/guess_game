**Method 1**

- Create PlayGame Class that have Guess Methoad that accept guess number
- Generate secret number from generate method
- Call object of PlayGame class in index.php

**Method 2**

- Create PlayGame Class that have 2 methods (permutate method - generate_guess method)
- The idea that has been reached is to create a number to compare with the secret number, and when we get the number of asteriks equal to 5, 
we will have reached the required number, and if the number of asteriks is less than 5, 
get the sum of asteriks and dots, if it is 5, do a permutation to get all the possibilities and send them for comparison
