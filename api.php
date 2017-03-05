<?php

/**
 * @brief		ensemble des inclusions nécessaires a l'application
 * @author		Artiom FEDOROV
 *
 */

///////////////////////////////////////////////////////////////////////////////////
/////////////////////////// MUST BE SET FOR THE CORE AKROAPI //////////////////////
///////////////////////////////////////////////////////////////////////////////////

// Definitions des Constantes
define ("PATH_SEP", '/');

// Permet la surcharge en amont de path_current pour que tout s'include correctement
if (!defined ( "PATH_CURRENT" ) ) {
	define ("PATH_CURRENT", "." . PATH_SEP );
}
define ("PATH_CONFIGS", PATH_CURRENT. "config" . PATH_SEP);
define ("PATH_CORE", PATH_CURRENT . "core" . PATH_SEP );
define ("PATH_MODULES", PATH_CURRENT . "modules" . PATH_SEP );
define ("PATH_CONTROLLER", PATH_CURRENT . "controller" . PATH_SEP);

///////////////////////////////////////////////////////////////////////////////////
/////////////////////////// MUST BE SET FOR THE CORE AKROAPI //////////////////////
///////////////////////////////////////////////////////////////////////////////////

define ("PATH_LIBS", PATH_CURRENT . "libs" . PATH_SEP );

// Inclusion des fichiers libs
// require_once(PATH_CONFIGS . "db.php");
require_once(PATH_CONFIGS . "config.php");

// Include of akroApi Core
require_once(PATH_CORE . "api.php");

// Include of akroApi Core simple Server
require_once(PATH_CORE . "server.php");

require_once(PATH_LIBS . "sourceslist.php");
require_once(PATH_LIBS . "game.class.php");
require_once(PATH_LIBS . "diffrankscore.class.php");
require_once(PATH_LIBS . "elocalculator.class.php");
