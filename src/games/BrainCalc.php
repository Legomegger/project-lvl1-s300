<?php
namespace BrainGames\BrainCalc;

use function \cli\line;
use function \cli\prompt;

function run()
{
    line('Welcome to the Brain Game!');
    line("What is the result of the expression?");
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
}
