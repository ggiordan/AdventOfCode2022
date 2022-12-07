<?

$matrix = array(
    'A' => array(
        'X' => array('Sissors',3+0,'C'),
        'Y' => array('Rock',1+3),
        'Z' => array('Paper',2+6,'B'),
    ),
    'B' => array(
        'X' => array('Rock',1+0,'A'),
        'Y' => array('Paper',2+3,'B'),
        'Z' => array('Sissors',3+6,'C'),
    ),
    'C' => array(
        'X' => array('Paper',2+0,'B'),
        'Y' => array('Sissors',3+3,'C'),
        'Z' => array('Rock',1+6,'A')
    ),
);

    $opponent = array('A' => 'Rock', 'B' => 'Paper', 'C' => 'Sissors');
    $me = array('X' => 'Rock', 'Y' => 'Paper', 'Z' => 'Sissors');
    $inputData= file($argv[1]);
    $total = 0;
    foreach ($inputData as $i => $s){
        $input = explode( ' ', $s);
        $opp = trim($input[0]);
        $you = trim($input[1]);

        $play = $matrix[$opp][$you];

        //echo "$opp / $you ==> ".$matrix[$opp][$you][1]."\n";
        $score = $matrix[$opp][$you][1];
        $total += $score;
    }
    echo $total;

