<?php
namespace BrainGames\BrainGcd;

use function \cli\line;
use function \cli\prompt;

function findGcd($a, $b)
{
    if ($b === 0) {
        return $a;
    } else {
        return findGcd($b, $a % $b);
    }
}
function run()
{
    $gameLogic = function () {
        $data = [];
        $data["rules"] = "Find the greatest common divisor of given numbers.";
        $number1 = rand(1, 200);
        $number2 = rand(1, 200);
        $data["question"] = "{$number1} {$number2}";
        $data["correctAnswer"] = findGcd($number1, $number2);
        return $data;
    };
    \BrainGames\Engine\run($gameLogic);
}
