<?php
namespace BrainGames\Engine;

use function \cli\line;
use function \cli\prompt;

const END_GAME = 3;

function runGame($getGameData, $rule)
{
    line('Welcome to the Brain Game!');
    line($rule());
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    for ($counter = 0; $counter < END_GAME; $counter += 1) {
        $data = $getGameData();
        line("Question: %s", $data["question"]);
        $userAnswer = prompt("Your answer: ");
        $correctAnswer = $data["correctAnswer"];
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
