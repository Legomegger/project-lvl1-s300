<?php
namespace BrainGames\Black;

use function \cli\line;
use function \cli\prompt;

function isNumberEven($number)
{
    return $number % 2 == 0;
}
function main()
{
    $gameLogic = [];
    $gameLogic["rules"] = "Answer \"yes\" if number even, otherwise answer \"no\"";
    for ($i = 0; $i < 3; $i += 1) {
        $question = rand(1, 15);
        $gameLogic["question"] = $question;
        $gameLogic["correctAnswer"] = isNumberEven($question) ? "yes" : "no";
    }
    \BrainGames\Engine\run($gameLogic);
}
