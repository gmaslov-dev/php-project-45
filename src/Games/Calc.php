<?php

namespace BrainGames\Games\Calc;

function getAnswer(string $addition, int $firstNum, int $secondNum): int
{
    return match ($addition) {
        '+' => $firstNum + $secondNum,
        '-' => $firstNum - $secondNum,
        '*' => $firstNum * $secondNum,
        default => null,
    };
}

function generateData(int $count): array
{
    $additions = ['+', '-', '*'];
    $data = [];

    for ($i = 0; $i < $count; $i++) {
        $key = array_rand($additions);
        $addition = $additions[$key];

        $firstNum = ($addition === '*') ? random_int(1, 10) : random_int(1, 30);
        $secondNum = random_int(1, 10);

        $expression = "{$firstNum} {$addition} {$secondNum}";
        $answer = getAnswer($addition, $firstNum, $secondNum);

        $data[$i] = ['question' => $expression, 'answer' => (string) $answer];
    }

    return $data;
}
