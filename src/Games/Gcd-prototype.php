<?php
function findDividers($num): array {
    $divedNum = $num;
    $divList = [];
    for ($i = 2; $i <= $num; $i++) {
        if ($divedNum % $i === 0) {
            $divList[] = $i;
            $divedNum /= $i;
            $i = 1;
        }
    }

    return $divList;
}

$dividersOne = findDividers(9);
$dividersTwo = findDividers(12);

print_r($dividersOne);
print_r($dividersTwo);

print_r(array_intersect_assoc($dividersOne, $dividersTwo));