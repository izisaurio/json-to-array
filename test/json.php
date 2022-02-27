<?php

require '../vendor/autoload.php';

use JsonToArray\Json;

$json = new Json('file.json');

var_dump($json);

var_dump($json['name']);