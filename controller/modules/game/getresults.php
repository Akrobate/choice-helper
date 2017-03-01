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
		$items = array();

		sql::query("SELECT * FROM items WHERE 1 ORDER BY rank DESC LIMIT 100");
		$data = sql::OLDfetchArray();

		$i=0;
		while (isset($data[$i])) {
			$data[$i]['file'] = $data[$i]['title'];
			$tmp = explode('||',$data[$i]['value']);
			$data[$i]['pathfile'] = $tmp[0];
			$data[$i]['url'] = $tmp[1];
			$i++;
		}
		$this->assign('items', $data);
	}

}
