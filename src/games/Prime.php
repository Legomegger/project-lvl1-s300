<?php
namespace BrainGames\Prime;

use function \cli\line;
use function \cli\prompt;
use function \BrainGames\Engine\runGame;

const RULE = "Is number prime? Answer \"yes\" or \"no\"";

function isPrime($num)
{
    if ($num < 2) {
        return false;
    }
    for ($i = 2; $i < $num; $i += 1) {
        if ($num % $i == 0) {
            return false;
        }
    }
    return true;
}

function run()
{
    $getGameData = function () {
        $data = [];
        $question = rand(1, 100);
        $data["question"] = "{$question}";
        $data["correctAnswer"] = isPrime($question) ? "yes" : "no";
        return $data;
    };

    runGame($getGameData, RULE);
}
