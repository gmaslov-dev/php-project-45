<?php

namespace BrainGames\Engine;

use function BrainGames\Cli\sayHello;
use function BrainGames\Cli\getQuestion;
use function BrainGames\Cli\setAnswer;
use function BrainGames\Cli\printMessage;
use function BrainGames\Games\Calc\getGreeting as getCalcGreeting;
use function BrainGames\Games\Even\getGreeting as getEvenGreeting;
use function BrainGames\Games\Gcd\getGreeting as getGcdGreeting;
use function BrainGames\Games\Prime\getGreeting as getPrimeGreeting;
use function BrainGames\Games\Progression\getGreeting as getProgressionGreeting;
use function BrainGames\Games\Calc\generateData as getCalcData;
use function BrainGames\Games\Even\generateData as getEvenData;
use function BrainGames\Games\Gcd\generateData as getGcdData;
use function BrainGames\Games\Prime\generateData as getPrimeData;
use function BrainGames\Games\Progression\generateData as getProgressionData;

function generateData($gameType, $rounds = 3): array
{
    return match ($gameType) {
        'calc' => getCalcData($rounds),
        'even' => getEvenData($rounds),
        'gcd' => getGcdData($rounds),
        'prime' => getPrimeData($rounds),
        'progression' => getProgressionData($rounds),
        default => null,
    };
}

function showGameRule($gameType): void
{
    match ($gameType) {
        'calc' => printMessage(getCalcGreeting()),
        'even' => printMessage(getEvenGreeting()),
        'gcd' => printMessage(getGcdGreeting()),
        'prime' => printMessage(getPrimeGreeting()),
        'progression' => printMessage(getProgressionGreeting()),
        default => null,
    };
}

function isCorrectAnswer($userAnswer, $correctAnswer): bool
{
    if ($userAnswer === $correctAnswer) {
        return true;
    }
    return false;
}
function startGame($gameType, $userName): void
{
    showGameRule($gameType);
    $data = generateData($gameType);


    foreach ($data as $roundData) {
        getQuestion($roundData['question']);
        $correctAnswer = $roundData['answer'];

        $userAnswer = setAnswer();
        $isCorrect = isCorrectAnswer($userAnswer, $correctAnswer);

        if (!$isCorrect) {
            printMessage("'{$userAnswer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
            printMessage("Let's try again, {$userName}!");
            return;
        }
        printMessage("Correct!");
    }

    printMessage("Congratulations, {$userName}!");
}
