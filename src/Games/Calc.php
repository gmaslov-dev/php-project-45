<?php

namespace BrainGames\Games\Calc;

use Exception;

function generateExpression($addition, $firstNum, $secondNum)
{
    return "{$firstNum} {$addition} {$secondNum}"; 
}

function getAnswer($addition, $firstNum, $secondNum): int
{
    return match ($addition) {
        '+' => $firstNum + $secondNum,
        '-' => $firstNum - $secondNum,
        '*' => $firstNum * $secondNum,
        default => null,
    };
}

function generateData($count): array {
    $additions = ['+', '-', '*'];
    $data = [];

    for ($i = 0; $i < $count; $i++) {
        $key = array_rand($additions);
        $addition = $additions[$key];

        $firstNum = ($addition === '*') ? random_int(1, 10) : random_int(1, 30);
        $secondNum = random_int(1, 10);

        $expression = generateExpression($addition ,$firstNum, $secondNum);
        $answer = getAnswer($addition,$firstNum, $secondNum);

        $data[$i] = ['question' => $expression, 'answer' => (string) $answer];
    }

    return $data;
}
