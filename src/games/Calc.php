<?php
namespace BrainGames\Calc;

use function \cli\line;
use function \cli\prompt;
use function \BrainGames\Engine\runGame;

const RULE = "What's the result of the expression?";
const OPERATORS = ["+", "-", "*"];

function getCorrectAnswer($firstNumber, $operator, $secondNumber)
{
    $result = 0;
    switch ($operator) {
        case "+":
            return $firstNumber + $secondNumber;
        case "-":
            return $firstNumber - $secondNumber;
        case "*":
            return $firstNumber * $secondNumber;
    }
}

function run()
{
    $getGameData = function () {
        $firstNumber = rand(1, 30);
        $secondNumber = rand(1, 30);
        $operatorIndex = array_rand(OPERATORS);
        $operator = OPERATORS[$operatorIndex];
        $data = [];
        $data["question"] = "{$firstNumber} {$operator} {$secondNumber}";
        $data["correctAnswer"] = getCorrectAnswer($firstNumber, $operator, $secondNumber);
        return $data;
    };

    runGame($getGameData, RULE);
}
