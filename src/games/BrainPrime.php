<?php
namespace BrainGames\BrainPrime;

use function \cli\line;
use function \cli\prompt;
use function \BrainGames\Engine\runGame;

const RULE = "Is number prime? Answer \"yes\" or \"no\"";

function run()
{

    $isPrime = function ($num) {
        for ($i = 2; $i < $num; $i += 1) {
            if ($num % $i == 0) {
                return false;
            }
        }
        return true;
    };

    $getGameData = function () use ($isPrime) {
        $data = [];
        $question = rand(1, 100);
        $data["question"] = "{$question}";
        $data["correctAnswer"] = $isPrime($question) ? "yes" : "no";
        return $data;
    };

    runGame($getGameData, RULE);
}
