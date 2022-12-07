<?
    $mySize = 14;
    $inputData= file($argv[1]);
    $total = 0;
    foreach ($inputData as $i => $s){
        $s = trim($s);
        $message = str_split($s);
        for($i = 0; $i < sizeof($message); $i++)
        {
            $chunk = array_slice($message, $i, $mySize);
            if (sizeof($chunk) < $mySize) break;
            $x = array_unique($chunk);
            if (sizeof($x) == $mySize)
            {
                $letter = $i+$mySize;
                echo "$i => $letter\n";
                $total += $letter;
                break;
            }
        }
    }

