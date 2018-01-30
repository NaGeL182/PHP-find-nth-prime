<?php

namespace NthPrime;

$requestURI = explode('/', $_SERVER['REQUEST_URI']);
$scriptName = explode('/', $_SERVER['SCRIPT_NAME']);
var_dump($requestURI);
var_dump($scriptName);
