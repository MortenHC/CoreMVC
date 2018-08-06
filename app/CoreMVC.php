<?php
// Require MVC root and misc classes
require_once __DIR__ . '/misc/CustomExceptions.php';
require_once __DIR__ . '/misc/DataObject.php';
require_once __DIR__ . '/misc/ModelRoot.php';
require_once __DIR__ . '/misc/ControllerRoot.php';

// Require class for default responses
require_once __DIR__ . '/misc/DefaultResponse.php';

// Require classes responsible for MVC loading
require_once __DIR__ . '/misc/Loader.php';

// Create controller and execute
$loader     = new Loader($_GET);
$controller = $loader->createController();
$controller->executeAction();
