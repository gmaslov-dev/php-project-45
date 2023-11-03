<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

function sayHello(): string
{
    line("Welcome to the Brain Games!");
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    return $name;
}

function getQuestion($expression): void
{
    line("Question: %s", $expression);
}

function setAnswer(): string
{
    return prompt("Your answer");
}

function printMessage($message): void
{
    line($message);
}
