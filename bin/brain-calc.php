#!/usr/bin/env php
<?php

namespace BrainGames\Bin;

require_once __DIR__ . '/../vendor/autoload.php';

use function BrainGames\Cli\sayHello;
use function BrainGames\Games\Calc\startGame;

$name = sayHello();
startGame($name);
