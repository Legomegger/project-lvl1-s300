<?php
namespace BrainGames\BrainProgression;

use function \cli\line;
use function \cli\prompt;
use function \BrainGames\Engine\runGame;

const RULE = "What number is missing in this progression?";
const PROGRESSION_LENGTH = 10;

function run()
{
    $createProgression = function () {
        $arrayOfNumbers = [];
        $arrayOfNumbers[0] = rand(1, 20);
        $delta = rand(1, 5);
        for ($i = 1; $i < PROGRESSION_LENGTH; $i += 1) {
            $arrayOfNumbers[$i] = $arrayOfNumbers[$i - 1] + $delta;
        }
        return $arrayOfNumbers;
    };

    $getGameData = function () use ($createProgression, $getRandomValue) {
        $data = [];
        $progression = $createProgression();
        $hiddenValue = $progression[rand(1, 10)];
        $progression[array_search($hiddenValue, $progression)] = "..";
        $question = implode(" ", $progression);
        $data["question"] = "{$question}";
        $data["correctAnswer"] = $hiddenValue;
        return $data;
    };

    runGame($getGameData, RULE);
}
