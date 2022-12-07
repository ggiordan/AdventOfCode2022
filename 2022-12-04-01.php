<?
    $inputData= file($argv[1]);
    $retcount = 0;
    foreach($inputData as $line)
    {
        $pairs = explode(',', $line);
        $v1 = createVector($pairs[0]);
        $v2 = createVector($pairs[1]);
        if (strpos($v1,$v2) !== false || strpos($v2,$v1) !== false)
        {
            $retcount++;
        }
    }
    echo $retcount."\n";

    function createVector($v)
    {
        $ends = explode('-', $v);
        $retval = '';
        for ($i = (int)$ends[0]; $i <= (int)$ends[1]; $i++)
        {
            $retval .= "[$i]";
        }
        if (strlen($retval) == 0){
            print_r($v);
            print_r($ends);
            exit;
        }
        return $retval;
    }
