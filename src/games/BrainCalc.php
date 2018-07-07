<?php
namespace BrainGames\BrainCalc;

use function \cli\line;
use function \cli\prompt;
use function \BrainGames\Engine\runGame;

const RULE = "What's the result of the expression?";
const OPERATORS = ["+", "-", "*"];

function run()
{
    $arrayOfOperators = OPERATORS;

    $getOperator = function ($array) {
        return $array[array_rand($array)];
    };

    $getCorrectAnswer = function ($firstNumber, $operator, $secondNumber) {
        $result = 0;
        switch ($operator) {
            case "+":
                return $firstNumber + $secondNumber;
            case "-":
                return $firstNumber - $secondNumber;
            case "*":
                return $firstNumber * $secondNumber;
        }
    };

    $getGameData = function () use ($getOperator, $getCorrectAnswer, $arrayOfOperators) {
        $firstNumber = rand(1, 30);
        $secondNumber = rand(1, 30);
        $operator = $getOperator($arrayOfOperators);
        $data = [];
        $data["question"] = "{$firstNumber} {$operator} {$secondNumber}";
        $data["correctAnswer"] = $getCorrectAnswer($firstNumber, $operator, $secondNumber);
        return $data;
    };

    runGame($getGameData, RULE);
}
