<?php

namespace BrainGames\Games\Even;

const GREETING = "Answer \"yes\" if the number is even, otherwise answer \"no\".";

function getGreeting(): string
{
    return GREETING;
}

function generateData($count): array
{
    $data = [];

    for ($i = 0; $i < $count; $i++) {
        $num = random_int(1, 20);

        if ($num % 2 === 0) {
            $data[$i] = ['question' => $num, 'answer' => 'yes'];
        } else {
            $data[$i] = ['question' => $num, 'answer' => 'no'];
        }
    }
    return $data;
}
