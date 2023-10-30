<?php
namespace BrainGames\Engine;
// Главная задача этого шага – построить архитектуру запуска игр так, чтобы эта логика была в одном месте и управляла играми.

use function BrainGames\Cli\sayHello;
use function BrainGames\Cli\askQuestion;
use function BrainGames\Cli\getAnswer;

use function BrainGames\Games\Calc\generateData as getCalcData;
use function BrainGames\Games\Even\generateData as getEvenData;

function generateData($gameType, $rounds = 3)
{
	return match ($gameType) {
		'calc' => getCalcData($rounds),
		'even' => getEvenData($rounds),
		default => null,
	};
}

function startGame($gameType) 
{
	$data = generateData($gameType);

	foreach ($data as $arr) {
		print_r($arr);
	}
}
