<?
    $inputData= file($argv[1]);
    $total = 0;
    foreach ($inputData as $i => $s){
        $sack = str_split($s, strlen($s)/2);
        $sack[0] = str_split($sack[0]);
        $sack[1] = str_split($sack[1]);
        $result =  array_slice(array_intersect($sack[0], $sack[1]),0,1);
        $ord = ord($result[0]);
        if ($ord >= ord('a') && $ord <= ord('z'))
            $total += ord($result[0]) - ord('a') + 1;
        else
            $total += ord($result[0]) - ord('A') + 27;
    }
    echo $total."\n";

