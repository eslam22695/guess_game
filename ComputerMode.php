<?php

class ComputerMode
{
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
            $generate = range(0, 9);
            shuffle($generate);
    
            $guess = array_slice($generate, 0, 5);
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