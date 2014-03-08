<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * Router for code cleanup and linting services
 *
 * @author     Dylan Wood <dwood@mrn.org>
 */

define('VENDOR_DIR', realpath(dirname(__FILE__)) . '/vendor');

require VENDOR_DIR . '/Slim/Slim/Slim.php';
\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim();

//specify routes
$app->any('/php/tidy(/:test)', function($test = false) use ($app) {
    require_once 'classes/PHPFormatterWrapper.php';
    PHPFormatterWrapper::run($app, $test);
});

$app->any('/php/lint(/:test)', function($test = false) use ($app) {
    require_once 'classes/PHPLinterWrapper.php';
    PHPLinterWrapper::run($app, $test);
});

$app->run();
