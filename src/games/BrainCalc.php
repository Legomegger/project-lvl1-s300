<?php
namespace BrainGames\BrainCalc;

use function \cli\line;
use function \cli\prompt;

const END_GAME_FLAG = 3;
function run()
{
    $getOperator = function($array) {
        return $array[array_rand($array)];
    };
    $getCorrectAnswer = function($firstNumber, $operator, $secondNumber) {
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
    $gameLogic = function() use ($getOperator, $getCorrectAnswer) {
        $arrayOfOperators = ["+", "-", "*", "+", "-", "*", "+", "-", "*", "+"];
        $firstNumber = rand(1, 30);
        $secondNumber = rand(1, 30);
        $operator = $getOperator($arrayOfOperators);
        $data = [];
        $data["rules"] = "Whats the result of the expression?";
        $data["question"] = "{$firstNumber} {$operator} {$secondNumber}";
        $data["correctAnswer"] = $getCorrectAnswer($firstNumber, $operator, $secondNumber);
        return $data;
    };
    \BrainGames\Engine\run($gameLogic);
}
