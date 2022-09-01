<?php

class PlayGame
{
    //Method 1
    public function guess($guess,$number)
    {
        $asterik = 0;
        $dots = 0;

        $guess = str_split($guess);
        $number = str_split($number);

        for($i=0; $i<count($guess); $i++)
        {
            if($guess[$i] != $number[$i] && in_array($guess[$i], $number))
            {
                $dots++;
            }

            if($guess[$i] == $number[$i])
            {
                $asterik++;
            }
        }

        $result['asterik'] = $asterik;
        $result['dots'] = $dots;

        return $result;
    }

    public function generate_guess($start = 0)
    {
        if($start == 0)
        {
            $generate = range(0, 9);
            shuffle($generate);
    
            $guess = array_slice($generate, 0, 5);
        }

        $start++;
        $permutations = [];
        $newperms = [];

        $result = $this->guess(implode("",$guess));

        $generate_sum = (int)$result['asterik'] + (int)$result['dots'];

        if($generate_sum == 5)
        {
            do 
            {
                foreach (array_slice($guess, 1) as $permutation) {
                    foreach (range(0, count($guess) - 1) as $i) {
                        yield array_merge(
                            array_slice($permutation, 0, $i),
                            [$guess[0]],
                            array_slice($permutation, $i)
                        );
                        dd($permutation);

                    }
                }

                for ($i = count($guess) - 1; $i >= 0; --$i) {
                    $newitems = $guess;
                    list($foo) = array_splice($newitems, $i, 1);
                    array_unshift($newperms, $foo);

                    dd($guess,$newitems,$newperms);

                    $result = $this->guess(implode("",$permutations[$i]));

                    if($result['asterik'] == 5)
                    {
                        return "Correct Guess Is " . $permutations[$i];
                    }

                }

                //$permutations = $this->permutation($guess);;
                
            } while ($start > 0);

        } else {
            $this->generate_guess(0);
        }

        /*for($i = 0; $i < count($permutations); $i++)
        {
            $result = $this->guess(implode("",$permutations[$i]));

            if($result['asterik'] == 5)
            {
                return "Correct Guess Is " . $permutations[$i];
            }
        }*/

        /*if($result['asterik'] < 5 && $result['asterik'] > 0)
        {
            if($result['dots'] > 0)
            {
                $new_guess = array_slice($guess, 4, $result['asterik']);
                shuffle($new_guess);
                array_push($guess, $new_guess);
                $result = $this->guess(implode("",$guess));
            }
        }*/

        dd($generate,implode("",$guess),$permutations,$result,$new_result);
    }
}