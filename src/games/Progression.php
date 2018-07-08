<?php
namespace BrainGames\Progression;

use function \cli\line;
use function \cli\prompt;
use function \BrainGames\Engine\runGame;

const RULE = "What number is missing in this progression?";
const PROGRESSION_LENGTH = 10;

function createProgression()
{
    $arrayOfNumbers = [];
    $arrayOfNumbers[0] = rand(1, 20);
    $delta = rand(1, 5);
    for ($i = 1; $i < PROGRESSION_LENGTH; $i += 1) {
        $arrayOfNumbers[$i] = $arrayOfNumbers[$i - 1] + $delta;
    }
    return $arrayOfNumbers;
}

function run()
{
    $getGameData = function () {
        $data = [];
        $progression = createProgression();
        $hiddenIndex = rand(0, 9);
        $data["correctAnswer"] = $progression[$hiddenIndex];
        $progression[$hiddenIndex] = "..";
        $question = implode(' ', $progression);
        $data["question"] = $question;
        return $data;
    };

    runGame($getGameData, RULE);
}
