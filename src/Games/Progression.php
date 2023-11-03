<?php

namespace BrainGames\Games\Progression;

function generateProgression($progressionLength, $progressionStep): array
{
    $progression = [];
    $progressionStart = random_int(1, 10);
    for ($i = 0; $i < $progressionLength; $i++) {
        $progression[$i] = $progressionStart;
        $progressionStart += $progressionStep;
    }

    return $progression;
}

function hideElement($progression, $hideIndex): array
{
    $progression[$hideIndex] = "..";

    return $progression;
}

function generateData($count): array
{
    $data = [];

    for ($i = 0; $i < $count; $i++) {
        $progressionLength = random_int(8, 10);
        $progressionStep = random_int(2, 5);

        $progression = generateProgression($progressionLength, $progressionStep);
        $hideIndex = random_int(0, count($progression) - 1);

        $hideProgression = hideElement($progression, $hideIndex);
        $stringProgression = implode(' ', $hideProgression);

        $hiddeElement = (string) $progression[$hideIndex];

        $data[$i] = ['question' => $stringProgression, 'answer' => $hiddeElement];
    }


    return $data;
}
