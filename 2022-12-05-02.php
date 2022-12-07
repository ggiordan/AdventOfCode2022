<?
    $inputData= file($argv[1]);

    $boardStack = array();
    $board = array();

    // find the board configuration
    foreach($inputData as $line)
    { 
        $splitLine = str_split($line, 4);
        if (strpos($line,'[') !== false){
            push($boardStack, $splitLine);
        }
        else if (strlen(trim($line)) == 0)
        {
            // Do nothing
            print_r($board);
        }
        else if (strpos($line,'move') !== false) {
            print_r($line);
            $command = explode(' ', $line);
            switch ($command[0])
            {
            case 'move':
                $count = trim($command[1]);
                $from = trim($command[3]);
                $to =  trim($command[5]);
                $x = pick($board[$from], $count);
                print_r($x);
                for ($i = sizeof($x); $i >= 1; $i--)
                {
                    push($board[$to],$x[$i-1]);
                }
                break;
            }
            print_r($board);
        }
        else
        {
            foreach($splitLine as $index)
            {
                $index = trim($index);
                if (strlen($index) > 0)
                {
                    $board[$index] = array();
                }
            }
            while(($stackItem = pop($boardStack)) != null)
            {
                foreach($stackItem as $i => $item)
                {
                    $item = trim($item);
                    if (strlen($item) > 0)
                    {
                        push($board[$i+1], $item);
                    }
                }
            }
        }
    }
    print_r($board);
    $result = '';
    for ($i = 1; $i <= sizeof($board); $i++)
    {
        $x = pop($board[$i]);
        if ($x != null)
        {
            $result .= trim(trim($x,'['),']');
        }
    }
    echo $result;
    exit;
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

    function push(&$stack, $item){
        if (!is_array($stack)) {
            print_r($stack);
            print_r($item);
            exit;
        }
        $stack[sizeof($stack)] = $item;
    }

    function pop(&$stack){
        if (!is_array($stack)) {
            print_r($stack);
            exit;
        }
        if (sizeof($stack) == 0) return null;
        $currentIndex = sizeof($stack) - 1;
        $retval = $stack[$currentIndex];
        unset($stack[$currentIndex]);
        return $retval;
    }

    function pick(&$stack, $howmany){
        $result = array();
        if (sizeof($stack) == 0) return null;
        for ($i = 0; $i < $howmany; $i++)
        {
            push($result,pop($stack));
        }
        return $result;
    }

