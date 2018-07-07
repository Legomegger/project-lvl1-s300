<?php
namespace BrainGames\BrainEven;

use function \cli\line;
use function \cli\prompt;
use function \BrainGames\Engine\runGame;

const RULE = "Balance the given number.";

function run()
{
    $isNumberEven = function ($number) {
        return $number % 2 == 0;
    };

    $getGameData = function () use ($isNumberEven) {
        $data = [];
        $data["question"] = rand(1, 15);
        $data["correctAnswer"] = $isNumberEven($data["question"]) ? "yes" : "no";
        return $data;
    };

    runGame($getGameData, RULE);
}
