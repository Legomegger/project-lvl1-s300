<?php
namespace BrainGames\BrainProgression;

use function \cli\line;
use function \cli\prompt;
use function \BrainGames\Engine\runGame;

const RULE = "What number is missing in this progression?";

function run()
{
    $createProgression = function () {
        $arrayOfNumbers = [];
        $arrayOfNumbers[0] = rand(1, 20);
        $delta = rand(1, 5);
        for ($i = 1; $i < 10; $i += 1) {
            $arrayOfNumbers[$i] = $arrayOfNumbers[$i - 1] + $delta;
        }
        return $arrayOfNumbers;
    };

    $hideRandomValue = function ($array) {
        $hider = rand(1, 10);
        $hiddenIndex = $array[$hider];
        return $hiddenIndex;
    };

    $getGameData = function () use ($createProgression, $hideRandomValue) {
        $data = [];
        $progression = $createProgression();
        $hiddenValue = $hideRandomValue($progression);
        $progression[array_search($hiddenValue, $progression)] = "..";
        $question = implode(" ", $progression);
        $data["question"] = "{$question}";
        $data["correctAnswer"] = $hiddenValue;
        return $data;
    };

    runGame($getGameData, RULE);
}
