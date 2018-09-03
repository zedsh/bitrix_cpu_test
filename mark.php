<?php   
    function getmicrotime()
    {
        list($usec, $sec) = explode(" ", microtime());
        return ((float)$usec + (float)$sec);
    }
    function GetPHPCPUMark() 
    {
        $res = array();        
        for ($j = 0; $j < 4; $j++)      
        {                      
            $s1 = getmicrotime();           
            for ($i = 0; $i < 1000000; $i++)
            {                  
            }                  
            $e1 = getmicrotime();           
            $N1 = $e1 - $s1;

            $s2 = getmicrotime();           
            $k = 0;
            for ($i = 0; $i < 1000000; $i++)
            {
                //This is one op                
                $k++;
                $k--;
                $k++;
                $k--;
            }
            $e2 = getmicrotime();           
            $N2 = $e2 - $s2;

            if ($N2 > $N1)
                $res[] = 1 / ($N2 - $N1);       
        }

        if (count($res))
            return array_sum($res) / doubleval(count($res));
        else
            return 0;          
    }

    print_r(GetPHPCPUMark());
