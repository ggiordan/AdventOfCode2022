<?
    $inputData= file($argv[1]);
    $maxCalories = 0;
    $currentCalories = 0;
    foreach ($inputData as $i => $c){
        $calories = trim($c);
        if (strlen($calories) > 0) {
            echo $calories."\n";
            $currentCalories += trim($calories);
        }
        else{
            $maxCalories = max($currentCalories, $maxCalories);
            $currentCalories = 0;
        }
    }
    echo $maxCalories;

