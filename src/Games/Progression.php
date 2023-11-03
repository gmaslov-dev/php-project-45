<?php

namespace BrainGames\Games\Progression;

function generateProgression(int $progressionLength, int $progressionStep): array
{
    $progression = [];
    $progressionStart = random_int(1, 10);
    for ($i = 0; $i < $progressionLength; $i++) {
        $progression[$i] = $progressionStart;
        $progressionStart += $progressionStep;
    }

    return $progression;
}

function hideElement(array $progression, int $hideIndex): array
{
    $progression[$hideIndex] = "..";

    return $progression;
}

function generateData(int $count): array
{
    $data = [];

    for ($i = 0; $i < $count; $i++) {
        $progressionLength = random_int(8, 10);
        $progressionStep = random_int(2, 5);

        $progression = generateProgression($progressionLength, $progressionStep);
        $min = 1;
        $max = count($progression);
        $hideIndex = random_int($min, $max);

        $hideProgression = hideElement($progression, $hideIndex - 1);
        $stringProgression = implode(' ', $hideProgression);

        $hiddeElement = (string) $progression[$hideIndex];

        $data[$i] = ['question' => $stringProgression, 'answer' => $hiddeElement];
    }


    return $data;
}
