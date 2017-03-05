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

        // Force elementB to be different of elementA
        $force_exit_after = 1000;
        while (($elemB['id'] == $elemA['id']) && ($force_exit_after > 0)) {
            $elemB = $game->getRandItem();
            $force_exit_after--;
        }

		$this->assign('itemA', $elemA);
		$this->assign('itemB', $elemB);

	}

}
