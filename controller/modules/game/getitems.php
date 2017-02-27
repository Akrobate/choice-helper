<?php

/**
 *	Controlleur pour mettre en jeu deux propositions
 *	Renvoi deux items a comparer
 *
 *
 *	@author	Artiom FEDOROV
 *	@date	2014
 */

class Modules_Game_Getitems extends CoreController {


	/**
	 *	@brief	Méthode init qui recupere la liste de resultats
	 *	@details	Affiche la liste de contenus
	 *
	 */

	public function init() {

        $game = new game();
        $elemA = $game->getRandItem();
        $elemB = $game->getRandItem();

		$this->assign('itemA', $elemA);
		$this->assign('itemB', $elemB);

	}

}
