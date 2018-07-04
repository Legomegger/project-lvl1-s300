<?php
namespace BrainGames\Engine;

use function \cli\line;
use function \cli\prompt;

const END_GAME_FLAG = 3;
function getGameRules($gameLogic)
{
    return $gameLogic["rules"];
}
function getQuestion($gameLogic)
{
    return $gameLogic["question"];
}
function getCorrectAnswer($gameLogic)
{
    return $gameLogic["correctAnswer"];
}
function run($gameLogic)
{
    line('Welcome to the Brain Game!');
    line(getGameRules($gameLogic));
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    for ($counter = 0; $counter < END_GAME_FLAG; $counter += 1) {
        $question = getQuestion($gameLogic);
        line("Question: {$question}");
        $userAnswer = prompt("Your answer: ");
        $correctAnswer = getCorrectAnswer($gameLogic);
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
