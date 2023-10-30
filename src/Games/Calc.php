<?php

namespace BrainGames\Games\Calc;

function generateExpression($addition, $firstNum, $secondNum)
{
    return "{$firstNum} {$addition} {$secondNum}"; 
}

function getAnswer($addition, $firstNum, $secondNum)
{
    return match ($addition) {
        '+' => $firstNum + $secondNum,
        '-' => $firstNum - $secondNum,
        '*' => $firstNum * $secondNum,
        default => null,
    };
}

function getData() {
    $additions = ['+', '-', '*'];

    $key = array_rand($additions);
    $addition = $additions[$key];

    $firstNum = random_int(1, 30);
    $secondNum = random_int(1, 10);

    $expression = generateExpression($addition ,$firstNum, $secondNum);
    $answer = getAnswer($addition,$firstNum, $secondNum);

    return [$expression => $answer];
}
