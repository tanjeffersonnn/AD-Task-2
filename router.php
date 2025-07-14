<?php

if (!defined('APP_ROOT')) {
    define('APP_ROOT', dirname(__FILE__));
}

$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$scriptName = dirname($_SERVER['SCRIPT_NAME']);

if ($scriptName !== '/' && strpos($requestUri, $scriptName) === 0) {
    $requestPath = substr($requestUri, strlen($scriptName));
} else {
    $requestPath = $requestUri;
}

if ($requestPath !== '/' && $requestPath !== '') {
    $requestPath = rtrim($requestPath, '/');
}

$pageContentFile = null;

switch ($requestPath) {
    case '/':
    case '/home':
        $pageContentFile = APP_ROOT . '/pages/home/index.php';
        break;

    default:

        http_response_code(404);

        break;
}


require_once APP_ROOT . '/layout/main.layout.php';
