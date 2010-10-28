<?php
// Definisco l'ambiente dell'applicazione
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));

// Definisco il separatore di directory per ambienti windows e unix
define('DS', DIRECTORY_SEPARATOR);

//Definisco il percorso per l'applicazione
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application/jaheira'));
// Definisco il percorso per la libreria Zend
//defined('ZEND_LIBRARY_PATH')
//    || define('ZEND_LIBRARY_PATH', realpath(dirname(__FILE__) . '/../library'));

// Definisco il percorso per la libreria dell'applicazione
defined('APP_LIBRARY_PATH')
    || define('APP_LIBRARY_PATH', APPLICATION_PATH . '/library');

$paths = array(
    //ZEND_LIBRARY_PATH,
    APP_LIBRARY_PATH,
    get_include_path()
);

set_include_path(implode(PATH_SEPARATOR, $paths));

// Creo l'applicazione, eseguo il bootstrap e la avvio (run)
require_once 'Zend/Application.php';

$application = new Zend_Application(
    APPLICATION_ENV,
    APPLICATION_PATH . DS . 'configs' . DS . 'application.ini'
);

$application->bootstrap();
$application->run();