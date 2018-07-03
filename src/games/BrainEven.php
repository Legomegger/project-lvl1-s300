<?php
namespace BrainGames\BrainEven;

use function \cli\line;
use function \cli\prompt;

function generateNumber()
{
    return rand(1, 15);
}
function isNumberEven($question)
{
    return $question % 2 == 0;
}
    
function isAnswerCorrect($userAnswer, $correctAnswer)
{
    return $userAnswer == $correctAnswer;
}
function run()
{
    line('Welcome to the Brain Game!');
    line("Answer \"yes\" if number even, otherwise answer \"no\"");
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    $counter = 3;
    while ($counter > 0) {
        $question = generateNumber();
        line("Question: {$question}");
        $userAnswer = prompt("Your answer: ");
        $correctAnswer = isNumberEven($question) ? "yes" : "no";
        //answerChecker($userAnswer, $correctAnswer, $name);
        if (isAnswerCorrect($userAnswer, $correctAnswer)) {
            line("Correct!");
            $counter -= 1;
        } else {
            line("{$userAnswer} was incorrect. Correct was {$correctAnswer}");
            line("Let's try again, %s", $name);
            return 0;
        }
    }
    line("Congratulations! {$name}. You Win!");
}
