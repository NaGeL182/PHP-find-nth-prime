<?php
namespace NthPrime;

require_once "App/App.php";

use NthPrime\App\App;
use NthPrime\App\Prime;

$app = new App();
$prime = new Prime();

$app->run();

