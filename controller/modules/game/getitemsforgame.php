<?php

/**
 *	Controlleur pour mettre en jeu deux propositions
 *	Renvoi deux items a comparer
 *	
 *
 *	@author	Artiom FEDOROV
 *	@date	2014
 */

class Modules_Game_Getitemsforgame extends CoreController {


	/** 
	 *	@brief	Méthode init qui recupere la liste de resultats
	 *	@details	Affiche la liste de contenus
	 *
	 */

	public function init() {
		$items = array("One", "two");		
/*		
			$iduser = users::getId();	
			$query = "SELECT * FROM offers WHERE 1";
			sql::query($query);
			if(sql::errorNo()) {
				echo(sql::error());
			}
			while($offer = sql::fetchAssoc()) {
				$offers[] = $offer;
			}
*/
		$this->assign('items', $items);
		
	}

}
