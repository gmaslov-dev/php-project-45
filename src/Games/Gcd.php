<?php

namespace BrainGames\Games\Gcd;

const GREETING = "Find the greatest common divisor of given numbers.";

function getGreeting(): string
{
    return GREETING;
}

function findGcd($firstNum, $secondNum): int
{
    $max = ($firstNum > $secondNum) ? $secondNum : $firstNum;

    for ($i = $max; $i >= 2; $i--) {
        if ($firstNum % $i === 0 && $secondNum % $i === 0) {
            return $i;
        }
    }
    return 1;
}

function generateNumbersStr($firstNum, $secondNum): string
{
    return "{$firstNum} {$secondNum}";
}

function generateData($count): array
{
    $data = [];

    for ($i = 0; $i < $count; $i++) {
        $firstNum = random_int(1, 30);
        $secondNum = random_int(1, 30);

        $gcd = findGcd($firstNum, $secondNum);
        $numbers = "{$firstNum} {$secondNum}";

        $data[$i] = ['question' => $numbers, 'answer' => (string) $gcd];
    }

    return $data;
}
