<?php
namespace BrainGames\BrainBalance;

use function \cli\line;
use function \cli\prompt;
use function \BrainGames\Engine\runGame;

const RULE = "Balance the given number.";

function run()
{

    $isBalanced = function ($num) {
        $arrayNumber = array_map('intval', str_split($num));
        if (max($arrayNumber) - min($arrayNumber) <= 1) {
            return true;
        }
        return false;
    };

    $balanceNumber = function ($number) {
        $arrayOfNumbers = array_map('intval', str_split($number));
        while (max($arrayOfNumbers) - min($arrayOfNumbers) > 1) {
            $arrayOfNumbers[array_search(min($arrayOfNumbers), $arrayOfNumbers)] += 1;
            $arrayOfNumbers[array_search(max($arrayOfNumbers), $arrayOfNumbers)] -= 1;
        }
        sort($arrayOfNumbers);
        return implode("", $arrayOfNumbers);
    };

    $getGameData = function () use ($isBalanced, $balanceNumber) {
        $data = [];
        $number = rand(10, 9999);
        $data["question"] = "{$number}";
        $data["correctAnswer"] = $isBalanced($number) ? $number : $balanceNumber($number);
        return $data;
    };

    runGame($getGameData, RULE);
}
