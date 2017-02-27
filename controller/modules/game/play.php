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

class Modules_Game_Play extends CoreController {


	/**
	 *	@brief	Méthode init qui recupere la liste de resultats
	 *	@details	Affiche la liste de contenus
	 *
	 */

	public function init() {

        $p = json_decode(json_encode($this->params), True);

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

		// echo($game->getMR());
	}
}
