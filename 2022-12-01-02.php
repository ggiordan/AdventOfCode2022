<?
    $calorieResults = array();
    $resultIndex = 0;
    $calorieResults[$resultIndex] = 0;
    $inputData= file($argv[1]);
    $maxCalories = 0;
    $currentCalories = 0;
    foreach ($inputData as $i => $c){
        $calories = trim($c);
        if (strlen($calories) > 0) {
            $calorieResults[$resultIndex] += $calories;
            $currentCalories += $calories;
        }
        else{
            $resultIndex++;
            $calorieResults[$resultIndex] = 0;
            $maxCalories = max($currentCalories, $maxCalories);
            $currentCalories = 0;
        }
    }
    rsort($calorieResults);
    //echo $maxCalories."\n";
    echo $calorieResults[0] + $calorieResults[1] + $calorieResults[2];

