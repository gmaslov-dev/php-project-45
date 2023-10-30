<?php
namespace BrainGames\Engine;
// Главная задача этого шага – построить архитектуру запуска игр так, чтобы эта логика была в одном месте и управляла играми.

use function BrainGames\Cli\sayHello;
use function BrainGames\Cli\askQuestion;
use function BrainGames\Cli\getAnswer;

use function BrainGames\Games\Calc\getData as getCalcData;
use function BrainGames\Games\Even\getData as getEvenData;

function setGame($gameType) {
	$data = null;
	if ($gameType === 'calc') {
		return startGame('calc', $getCalcData);
	} else if ($gameType === 'even') {
		return $getEvenData;
	}
}

function startGame($gameType, $rounds = 3) {

	getCalcData();
	// for ($i = 0; $i < $rounds; $i++) {
	// 	var_dump(call_user_func('getCalcData'));
	// }
} 



setGame('calc', 3);