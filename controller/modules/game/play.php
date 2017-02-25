<?php

/**
 *	Controlleur générique de visualisation de la liste de resultats
 *	Permet la visualisation de toutes les données
 *	De l'enregistrement
 *
 *	@author	Artiom FEDOROV
 *	@date	2014
 *
 */

class Modules_Game_Getresults extends CoreController {


	/** 
	 *	@brief	Méthode init qui recupere la liste de resultats
	 *	@details	Affiche la liste de contenus
	 *
	 */

	public function init() {
	
		$p = $_GET;

		error_reporting(15);

		define ("PATH_CURRENT", "../");
		require_once('../api.php');

		$game = new game();
	
		$itemA = $game->openItem($p['a']);
		$itemB = $game->openItem($p['b']);
	
		$winner = 0;
		if ($p['a'] == $p['v']) {
			$winner = 1;
		} elseif ($p['b'] == $p['v']) {
			$winner = 2;
		}
	
		$scores = $game->updatePlayersEloRanking($itemA['rank'], $itemB['rank'], $winner);

		$itemA['rank'] = $scores['a'];
		$itemB['rank'] = $scores['b'];

		$game->saveEloItem($itemA);
		$game->saveEloItem($itemB);
		$game->saveGame($p);
	
		echo($game->getMR());
	
	}
	
}
