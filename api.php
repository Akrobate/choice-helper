<?php

/**
 * @brief		ensemble des inclusions nécessaires a l'application
 * @author		Artiom FEDOROV
 *
 */

// Definitions des Constantes
define ("PATH_SEP", '/');	

// Permet la surcharge en amont de path_current pour que tout s'include correctement
if (!defined ( "PATH_CURRENT" ) ) {
	define ("PATH_CURRENT", "." . PATH_SEP );
}

define ("PATH_CONFIGS", PATH_CURRENT. "config" . PATH_SEP);	
define ("PATH_LIBS", PATH_CURRENT . "libs" . PATH_SEP );
define ("LIBS_PATH", PATH_CURRENT . "libs" . PATH_SEP );
define ("PATH_FONTS", PATH_CURRENT."public" . PATH_SEP . "fonts" . PATH_SEP);
define ("PATH_MODULES", PATH_CURRENT . "modules" . PATH_SEP );

define ("PATH_CUSTOM_CONTROLLER", PATH_CURRENT . "controller" . PATH_SEP );
define ("PATH_CORE_CONTROLLER", PATH_CURRENT . "controller" . PATH_SEP );


define ("ADMIN_LOGIN", "admin");
define ("ADMIN_PASSWORD", "admin");

define('PROJ_PATH', '/var/www/photo-diapo/');
define('DIR_TPL', PROJ_PATH . 'templates/');
define('DIR_LIBS', PROJ_PATH. 'libs/');

// Inclusion des fichiers libs
require_once(PATH_CONFIGS . "config.php");

require_once(PATH_LIBS . "sourceslist.php");
require_once(PATH_LIBS . "game.class.php");
require_once(PATH_LIBS . "sql.class.php");
require_once(PATH_LIBS . "request.class.php");
require_once(PATH_LIBS . "session.class.php");
require_once(PATH_LIBS . "core.controller.class.php");
require_once(PATH_LIBS . "diffrankscore.class.php");
require_once(PATH_LIBS . "elocalculator.class.php");




/**
 *	Regles de routage pour l'inclusion des classes de controlleurs
 *	
 *	@brief	Autoload des classes
 *	@details	On tente d'inclure en priorité ce qui est dans custom, 
 *				si classe innexistante on se rabat sur les controlleurs generiques
 *	@autor	Artiom FEDOROV
 *
 */

spl_autoload_register(function ($class) {
	// core class
	$path = "";		
	$explode = explode("_",$class);
	$filename = strtolower(array_pop($explode));
	if (count($explode) > 0) {
		foreach($explode as $ex) {
			$path .= strtolower($ex) . '/';
		}
	}
	
	if (file_exists(PATH_CUSTOM_CONTROLLER . $path . $filename . '.php')){
		include PATH_CUSTOM_CONTROLLER . $path . $filename . '.php';
		
		//echo( PATH_CUSTOM_CONTROLLER . $path . $filename . '.php');
		
	} else if (file_exists(PATH_CORE_CONTROLLER . $path . $filename . '.php')) {
		include PATH_CORE_CONTROLLER . $path . $filename . '.php';
		
		//echo(  PATH_CORE_CONTROLLER . $path . $filename . '.php');
		
	}  
	
});

