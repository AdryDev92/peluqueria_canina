<?php

namespace App;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;

/**
* Class Log que usa la aplicación para escribir información en los archivos de log.
*
* @package App
*/
class Log {

private static $_logger = null;

/**
* Método que usa el patrón Singleton para tener solo una instancia de Logger en toda la aplicación.
*
* @return Logger|null
*/

private static function getLogger(){
if(!self::$_logger){
self::$_logger = new Logger('App Log');
}
return self::$_logger;
}

/**
* Método que escribe un mensaje en el archivo de Logs de error.
*
* @param $error mensaje de error.
*/
public static function logError($error){
self::getLogger()->pushHandler(
new StreamHandler('../logs/error.log', Logger::ERROR)
);
self::getLogger()->addError($error);
}

/**
* Método que escribe un mensaje en el archivo de Logs de información.
*
* @param $info mensaje de información.
*/
public static function logInfo($info){
self::getLogger()->pushHandler(
new StreamHandler('../logs/info.log', Logger::INFO)
);
self::getLogger()->addInfo($info);
}
}