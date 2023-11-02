<?php

namespace BrainGames\Games\Prime;

const GREETING = "Answer \"yes\" if given number is prime. Otherwise answer \"no\".";
const SIMPLE_LIST = [2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31];

function getGreeting(): string
{
    return GREETING;
}

function generateData($count): array
{
    $data = [];

    for ($i = 0; $i < $count; $i++) {
        $num = random_int(2, 31);


    }


 return $data;
}
