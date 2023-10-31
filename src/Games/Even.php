<?php
namespace BrainGames\Games\Even;

function generateData($count): array
{
	$data = [];

	for ($i = 0; $i < $count; $i++) {
		$num = random_int(1, 20);

		if ($num % 2 === 0) {
			$data[$i] = ['question' => $num, 'answer' => 'yes'];
		} else {
			$data[$i] = ['question' => $num, 'answer' => 'no'];
		}
	}
	return $data;
}
