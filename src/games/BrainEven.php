<?php
namespace BrainGames\BrainEven;

use function \cli\line;
use function \cli\prompt;
use function \BrainGames\Engine\runGame;

const RULE = "Balance the given number.";

function isNumberEven($number)
{
    return $number % 2 === 0;
}

function run()
{
    $getGameData = function () {
        $data = [];
        $data["question"] = rand(1, 15);
        $data["correctAnswer"] = isNumberEven($data["question"]) ? "yes" : "no";
        return $data;
    };

    runGame($getGameData, RULE);
}
