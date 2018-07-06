<?php
namespace BrainGames\BrainGcd;

use function \cli\line;
use function \cli\prompt;
use function \BrainGames\Engine\runGame;

const RULE = "Find the greatest common divisor of given numbers.";

function findGcd($a, $b)
{
    if ($b === 0) {
        return $a;
    }
    return findGcd($b, $a % $b);
}

function run()
{
    $getGameData = function () {
        $data = [];
        $number1 = rand(1, 200);
        $number2 = rand(1, 200);
        $data["question"] = "{$number1} {$number2}";
        $data["correctAnswer"] = findGcd($number1, $number2);
        return $data;
    };

    runGame($getGameData, RULE);
}
