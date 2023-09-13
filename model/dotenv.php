<?php
require_once realpath(__DIR__ . '\..\vendor\autoload.php');
// echo __DIR__ . '\..\vendor\autoload.php';
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '\..');
$dotenv->load();

// $s3_bucket = $_ENV['HOST_EMAIL'];
// echo $s3_bucket;
