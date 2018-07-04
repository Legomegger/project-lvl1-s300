<?php
namespace BrainGames\BrainCalc;

use function \cli\line;
use function \cli\prompt;

const END_GAME_FLAG = 3;
function getOperator($array)
{
    return $array[array_rand($array)];
}
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
    line('Welcome to the Brain Game!');
    line("What is the result of the expression?");
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    for ($counter = 0; $counter < END_GAME_FLAG; $counter += 1) {
        $arrayOfOperators = ["+", "-", "*", "+", "-", "*", "+", "-", "*", "+"];
        $firstNumber = rand(1, 30);
        $secondNumber = rand(1, 30);
        $operator = getOperator($arrayOfOperators);
        line("{$firstNumber} {$operator} {$secondNumber}");
        $answer = prompt('Your answer');
        $correctAnswer = getCorrectAnswer($firstNumber, $operator, $secondNumber);
        if ($correctAnswer === (int)$answer) {
            line("Correct!");
        } else {
            line("Incorrect! Correct was {$correctAnswer}");
            line("Let's try again {$name}");
            return;
        }
    }
    line("Congratulations {$name}!");
}
