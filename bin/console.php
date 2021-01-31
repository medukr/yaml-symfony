<?php
require_once __DIR__ . '/../vendor/autoload.php';

use app\bin\commands\DeployRun;
use app\bin\commands\InitDirectories;
use app\bin\commands\MakeDir;
use Symfony\Component\Console\Application;

$app = new Application();

$app->add(new MakeDir());
$app->add(new InitDirectories());
$app->add(new DeployRun());

$app->run();
