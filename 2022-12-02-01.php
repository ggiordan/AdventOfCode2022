<?

    $tools = array(
        'X' => array('Rock', 1,'Sissors'),
        'Y' => array('Paper', 2,'Rock'), 
        'Z' => array('Sissors',3,'Paper')
    );
    $opponent = array('A' => 'Rock', 'B' => 'Paper', 'C' => 'Sissors');
    //$results = array('Rock' => "Sissors", 'Paper' => 
    $inputData= file($argv[1]);
    $total = 0;
    foreach ($inputData as $i => $s){
        $play = explode( ' ', $s);
        $opp = trim($play[0]);
        $you = trim($play[1]);
        $score = $tools[$you][1];
        echo "They '{$opponent[$opp]}' -> '{$tools[$you][0]}'";
        if ($opponent[$opp] == $tools[$you][0]) {
            // Tie
            echo "tie";
            $score += 3;
        } else if ( $tools[$you][2] == $opponent[$opp]) {
            echo "win";
            $score +=6;
        } else {
            echo "lose";
        }

        echo "\n";
        $total += $score;
    }
    echo $total;

