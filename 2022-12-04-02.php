<?
    $inputData= file($argv[1]);
    $retcount = 0;
    foreach($inputData as $line)
    {
        $pairs = explode(',', $line);
        $v1 = createVector($pairs[0]);
        $v2 = createVector($pairs[1]);
        if (sizeof(array_intersect($v1,$v2)) > 0)
        {
            $retcount++;
        }
    }
    echo $retcount."\n";

    function createVector($v)
    {
        $ends = explode('-', $v);
        $retval = array();
        for ($i = (int)$ends[0]; $i <= (int)$ends[1]; $i++)
        {
            $retval[] = $i;
        }
        return $retval;
    }
