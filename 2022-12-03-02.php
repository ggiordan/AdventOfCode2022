<?
    $inputData= file($argv[1]);
    $total = 0;
    for ($i = 0; $i < sizeof($inputData); $i += 3)
    {
        $s1 = str_split(trim($inputData[$i]));
        $s2 = str_split(trim($inputData[$i+1]));
        $s3 = str_split(trim($inputData[$i+2]));
        $total += getValue(array_slice(array_intersect($s1, $s2, $s3),0,1));
    }
    echo $total."\n";
    exit;

    function getValue($result){
        $ord = ord($result[0]);
        if ($ord >= ord('a') && $ord <= ord('z'))
            return ord($result[0]) - ord('a') + 1;
        else
            return ord($result[0]) - ord('A') + 27;
    }

