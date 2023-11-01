<?php
namespace BrainGames\Engine;
// Главная задача этого шага – построить архитектуру запуска игр так, чтобы эта логика была в одном месте и управляла играми.

use function BrainGames\Cli\sayHello;
use function BrainGames\Cli\getQuestion;
use function BrainGames\Cli\setAnswer;
use function BrainGames\Cli\printMessage;

use function BrainGames\Games\Calc\generateData as getCalcData;
use function BrainGames\Games\Even\generateData as getEvenData;
use function BrainGames\Games\Gcd\generateData as getGcdData;

function generateData($gameType, $rounds = 3): array
{
	return match ($gameType) {
		'calc' => getCalcData($rounds),
		'even' => getEvenData($rounds),
        'gcd' => getGcdData($rounds),
		default => null,
	};
}

function showGameRule($gameType): void
{
    match($gameType) {
        'calc' => printMessage('What is the result of the expression?'),
        'even' => printMessage('Answer "yes" if the number is even, otherwise answer "no".'),
        'gcd' => printMessage('Find the greatest common divisor of given numbers.'),
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
function startGame($gameType): void
{
    $userName = sayHello();
    showGameRule($gameType);
    $data = generateData($gameType);


	foreach ($data as $roundData) {
        getQuestion($roundData['question']);
        $correctAnswer = $roundData['answer'];

        $userAnswer = setAnswer();
		$isCorrect = isCorrectAnswer($userAnswer, $correctAnswer);

        if(!$isCorrect) {
            printMessage("'{$userAnswer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
            printMessage("Let's try again, {$userName}!");
            return;
        }
        printMessage("Correct!");
	}

    printMessage("Congratulations, {$userName}!");
}
