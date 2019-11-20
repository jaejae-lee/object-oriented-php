<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Challenges;

$challenges = new Challenges();
$challenges->start();
