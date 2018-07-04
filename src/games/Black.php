<?php
namespace BrainGames\Black;

use function \cli\line;
use function \cli\prompt;

const END_GAME_FLAG = 3;
function isNumberEven($number)
{
    return $number % 2 == 0;
}
function main()
{
    $gameLogic = [];
    $gameLogic["rules"] = ["Answer \"yes\" if number even, otherwise answer \"no\""];
    $gameLogic["question"] = rand(1, 15);
    $gameLogic["correctAnswer"] = isNumberEven($question) ? "yes" : "no";
    BrainGames\Engine\run($gameLogic);
}

