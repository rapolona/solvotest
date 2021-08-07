<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
define('__ROOT__', dirname(dirname(__FILE__)) . '/solvotest');
require_once(__ROOT__.'/electronics/Items.php');
require_once(__ROOT__.'/electronics/ElectronicItem.php');
require_once(__ROOT__.'/electronics/Console.php');
require_once(__ROOT__.'/electronics/Controller.php');
require_once(__ROOT__.'/electronics/Microwave.php');
require_once(__ROOT__.'/electronics/Television.php');