<?php
namespace BrainGames\BrainEven;

use function \cli\line;
use function \cli\prompt;

function isNumberEven($number)
{
    return $number % 2 === 0;
}
function run()
{
    $gameLogic = function() {
        $data = [];
        $data["rules"] = "Answer \"yes\" if number even, otherwise answer \"no\"";
        $data["question"] = rand(1, 15);
        $data["correctAnswer"] = isNumberEven($data["question"]) ? "yes" : "no";
        return $data;
    };
    \BrainGames\Engine\run($gameLogic);
}
