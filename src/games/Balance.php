<?php
namespace BrainGames\Balance;

use function \cli\line;
use function \cli\prompt;
use function \BrainGames\Engine\runGame;

const RULE = "Balance the given number.";

function balanceNumber($number)
{
    $arrayOfNumbers = array_map('intval', str_split($number));
    while (max($arrayOfNumbers) - min($arrayOfNumbers) > 1) {
        $arrayOfNumbers[array_search(min($arrayOfNumbers), $arrayOfNumbers)] += 1;
        $arrayOfNumbers[array_search(max($arrayOfNumbers), $arrayOfNumbers)] -= 1;
    }
    sort($arrayOfNumbers);
    return implode("", $arrayOfNumbers);
}

function run()
{
    $getGameData = function () {
        $data = [];
        $number = rand(10, 9999);
        $data["question"] = "{$number}";
        $data["correctAnswer"] = balanceNumber($number);
        return $data;
    };

    runGame($getGameData, RULE);
}
