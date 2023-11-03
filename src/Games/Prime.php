<?php

namespace BrainGames\Games\Prime;

const SIMPLE_LIST = [2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31];

function isPrime(int $num): bool
{
    return in_array($num, SIMPLE_LIST, true);
}

function generateData(int $count): array
{
    $data = [];

    for ($i = 0; $i < $count; $i++) {
        $num = random_int(2, 31);
        $answer = isPrime($num) ? 'yes' : 'no';
        $question = (string) $num;

        $data[] = ['question' => $question, 'answer' => $answer];
    }

    return $data;
}
