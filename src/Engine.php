<?php

namespace BrainGames\Engine;

use function BrainGames\Cli\getQuestion;
use function BrainGames\Cli\setAnswer;
use function BrainGames\Cli\printMessage;
use function BrainGames\Games\Calc\generateData as getCalcData;
use function BrainGames\Games\Even\generateData as getEvenData;
use function BrainGames\Games\Gcd\generateData as getGcdData;
use function BrainGames\Games\Prime\generateData as getPrimeData;
use function BrainGames\Games\Progression\generateData as getProgressionData;

function generateData(string $gameType, int $rounds = 3): array
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

function showGameRule(string $gameType): void
{
    match ($gameType) {
        'calc' => printMessage("What is the result of the expression?"),
        'even' => printMessage("Answer \"yes\" if the number is even, otherwise answer \"no\"."),
        'gcd' => printMessage("Find the greatest common divisor of given numbers."),
        'prime' => printMessage("Answer \"yes\" if given number is prime. Otherwise answer \"no\"."),
        'progression' => printMessage("What number is missing in the progression?"),
        default => null,
    };
}

function isCorrectAnswer(string $userAnswer, string $correctAnswer): bool
{
    if ($userAnswer === $correctAnswer) {
        return true;
    }
    return false;
}
function startGame(string $gameType, string $userName): void
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
