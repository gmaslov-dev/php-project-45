<?php
namespace BrainGames\Games\Even;

function generateData($count) {
	$data = [];

	for ($i = 0; $i < $count; $i++) {
		$num = random_int(1, 20);

		if ($num % 2 === 0) {
			$data[] = ['yes' => $num];
		} else {
			$data[] = ['no' => $num];
		}
	}
	
	return $data;
}
