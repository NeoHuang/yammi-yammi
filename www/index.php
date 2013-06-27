<?php

if (version_compare(PHP_VERSION, '5.3.1', '<'))
{
	die('Your host needs to use PHP 5.3.1 or higher!');
}

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__FILE__));
require_once (ROOT . DS . 'framework' . DS . 'bootstrap.php');
