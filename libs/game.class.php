<?php

class game {


	public function initItemsTable($src) {



		$this->prepareAllTables();


			//$src = new Sources();
			//$src->addSource(array('path'=>'/home/artiom/Images/Lynda/LyndaPerso/','url'=>'gallery/lda'));
			$src->createImageCollectionFromSources();

			$collection = $src->getCollection();

			//$collection


			/*
			CREATE TABLE `items` (
			  `id` bigint(24) unsigned NOT NULL AUTO_INCREMENT,
			  `title` varchar(255) NOT NULL,
			  `value` text NOT NULL,
			  `created` datetime NOT NULL,
			  `updated` datetime NOT NULL,
			  `rank` float(10,5) NOT NULL,
			  PRIMARY KEY (`id`)
			) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=latin1;
			*/

			$inserts = "";
			foreach($collection as $item) {
				$inserts .= "('".$item['file']."', '".$item['pathfile']."||".$item['url']."', NOW(), NOW(), 1500),";
			}
			//echo($inserts);



			$inserts = "INSERT INTO items (title, value, created, updated, rank) VALUES " . $inserts;
			$query = substr($inserts, 0, -1);
			$query .= ";";
			sql::query($query);

	}





	public function prepare() {
		$this->prepareAllTables();
	}


	public function prepareAllTables() {
		$this->emptyItemsTable();
		$this->emptyGamesTable();
	}


	public function emptyItemsTable() {
		sql::query("TRUNCATE TABLE items");
	}


	public function emptyGamesTable() {
		sql::query("TRUNCATE TABLE games");
	}


	public function getRandItem() {
		sql::query("SELECT * FROM items WHERE 1 ORDER BY RAND() LIMIT 1");
		$item = sql::fetchArray();
		$item['file'] = $item['title'];
		$tmp = explode('||',$item['value']);
		$item['pathfile'] = $tmp[0];
		$item['url'] = $tmp[1];
		return $item;
	}


	public function getMR() {
		sql::query("SELECT * FROM items WHERE rank = 1500");
		return sql::nbrRows();
	}




	public function getNonDoubleItem() {

		while (! ($this->isGoodChoice($ritem = $this->getRandItem() )));
		$this->addChoice($ritem, 20);
		return $ritem ;

	}






	function openItem($id) {
		sql::query("SELECT * FROM items WHERE id = $id");
		$item = sql::fetchArray();

		$item['file'] = $item['title'];

		$tmp = explode('||',$item['value']);
		$item['pathfile'] = $tmp[0];
		$item['url'] = $tmp[1];

		return $item;
	}


	function saveEloItem($item) {
		sql::query("UPDATE items SET rank = ".$item['rank']." WHERE id = ".$item['id'] );
		//echo ("UPDATE items SET (rank = ".$item['rank'].") WHERE id = ".$item['id'] );
		return $item;
	}



	function saveGame($p) {

		$winner = 0;
		if ($p['a'] == $p['v']) {
			$winner = 'a';
		}elseif ($p['b'] == $p['v']) {
			$winner = 'b';
		}

		 sql::query("INSERT INTO games (itema_id, itemb_id, created, winner) VALUES (" . $p['a'] . "," . $p['b'] . ",
		 	NOW() ,'". $winner . "' )");

	}

/*
	function getKConstant() {
		return 16;
	}
*/

	public function getExpectedScore($EloPlayer1,$EloPlayer2){
		return EloCalculator::getExpectedScore($EloPlayer1,$EloPlayer2);
	}



	public function updatePlayer1EloRanking($EloPlayer1,$EloPlayer2,$winner){
	/*	$score=($winner>0)?$winner*-1+2:0.5;
		$expectedScore = $this->getExpectedScore($EloPlayer1,$EloPlayer2);
		$K=$this->getKConstant($EloPlayer1); // qui est à définir selon vos envie
		$updatedRank = round($EloPlayer1+$K*($score-$expectedScore));
		//threshold
		if($updatedRank<300){
			return 300;
		}else{
			return $updatedRank;
		}

		*/
		return EloCalculator::updatePlayer1EloRanking($EloPlayer1,$EloPlayer2,$winner);

	}



	public function updatePlayersEloRanking($EloPlayer1,$EloPlayer2,$winner){
		/*

		$tmpElo1=$this->updatePlayer1EloRanking($EloPlayer1,$EloPlayer2,$winner);
		$winner=($winner>0)?$winner*-1+3:0.5;		// on inverse le resultat si 1 alors 2 si 2 alors 1
		$EloPlayer2=$this->updatePlayer1EloRanking($EloPlayer2,$EloPlayer1,$winner);
		$EloPlayer1=$tmpElo1;
		$result['a'] = $EloPlayer1;
		$result['b'] = $EloPlayer2;
		return $result;

		*/

		return EloCalculator::updatePlayersEloRanking($EloPlayer1,$EloPlayer2,$winner);

	}


	function isGoodChoice($elem) {

		if (isset($_SESSION['previous_choices']) && is_array($_SESSION['previous_choices'])) {
			$prev_choices = $_SESSION['previous_choices'];
			if (in_array ($elem['pathfile'], $_SESSION['previous_choices'])) {
				return false;
			} else {
				return true;
			}

		} else {
			return true;
		}
	}


		function addChoice($elem, $nbr_max) {
			if (!isset($_SESSION['previous_choices'])) {
				$_SESSION['previous_choices'] = array();
			}
			$i=0;

			//if (!in_array($elem['pathfile'], $_SESSION['previous_choices'])) {
				if (count($_SESSION['previous_choices']) < $nbr_max) {
					$_SESSION['previous_choices'][] = $elem['pathfile'];
				} else {
					reset($_SESSION['previous_choices']);
					$fk = key($_SESSION['previous_choices']);
					unset($_SESSION['previous_choices'][$fk]);

				}
			//}

		}
}
