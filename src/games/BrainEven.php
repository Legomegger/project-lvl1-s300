<?php
namespace BrainGames\BrainEven;

use function \cli\line;
use function \cli\prompt;

const END_GAME_FLAG = 3;
function isNumberEven($number)
{
    return $number % 2 == 0;
}
function run()
{
    line('Welcome to the Brain Game!');
    line("Answer \"yes\" if number even, otherwise answer \"no\"");
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    for ($counter = 0; $counter < END_GAME_FLAG; $counter += 1) {
        $question = rand(1, 15);
        line("Question: {$question}");
        $userAnswer = prompt("Your answer: ");
        $correctAnswer = isNumberEven($question) ? "yes" : "no";
        if ($userAnswer == $correctAnswer) {
            line("Correct!");
        } else {
            line("{$userAnswer} was incorrect. Correct was {$correctAnswer}");
            line("Let's try again, %s", $name);
            return;
        }
    }
    line("Congratulations! {$name}. You Win!");
}
