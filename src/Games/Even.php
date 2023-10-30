<?php
namespace BrainGames\Games\Even;

function generateData() {
	$num = random_int(1, 20);

	if ($num % 2 === 0) {
		return ['yes' => $num];
	}
	return ['no' => $num];
}
