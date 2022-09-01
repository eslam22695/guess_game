<?php

class PlayGame
{
    public function generate()
    {
        $generate = range(0, 9);
        shuffle($generate);

        $guess = array_slice($generate, 0, 5);

        return $guess;
    }

    //Method 1
    public function guess($guess)
    {
        $asterik = 0;
        $dots = 0;

        $guess = str_split($guess);
        $number = str_split(implode("",$this->generate()));

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
    /** Method 1 */

    function permutate($elements, $perm = array(), &$permArray = array()){
        $final = [];
        if(empty($elements)){
           array_push($permArray,$perm); return;
        }
    
        for($i=0;$i<=count($elements)-1;$i++){
           array_push($perm,$elements[$i]);
           $tmp = $elements; array_splice($tmp,$i,1);
           $this->permutate($tmp,$perm,$permArray);
           array_pop($perm);
           $final[] = implode("",$permArray[$i]);
        }

        return $final;
    }

    public function generate_guess($start = 0)
    {
        if($start == 0)
        {
            $guess = $this->generate();
        }

        $start++;
        $permutations = [];

        $result = $this->guess(implode("",$guess));

        $generate_sum = (int)$result['asterik'] + (int)$result['dots'];

        if($result['asterik'] == 5)
        {
            return "Correct Guess Is " . implode("",$guess);
        } else {
            if($generate_sum == 5)
            {
                do 
                {
                    $permutations = $this->permutate($guess);
                } while ($start > 0);
    
            } else {
                $this->generate_guess(0);
            }
        }

        for($i = 0; $i < count($permutations); $i++)
        {
            $result = $this->guess(implode("",$permutations[$i]));

            if($result['asterik'] == 5)
            {
                return "Correct Guess Is " . $permutations[$i];
            }
        }
        
    }
}
