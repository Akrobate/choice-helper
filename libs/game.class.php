<?php

class game {


	public function initItemsTable($src) {

		$this->prepareAllTables();
		//$src = new Sources();
		//$src->addSource(array('path'=>'/home/artiom/Images','url'=>'gallery/lda'));
		$src->createImageCollectionFromSources();
		$collection = $src->getCollection();



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
		sql::query("INSERT INTO
                        games (itema_id, itemb_id, created, winner)
                            VALUES (" . $p['a'] . "," . $p['b'] . ", NOW() ,'". $winner . "' )");
	}


	public function getExpectedScore($EloPlayer1,$EloPlayer2){
		return EloCalculator::getExpectedScore($EloPlayer1,$EloPlayer2);
	}


	public function updatePlayer1EloRanking($EloPlayer1,$EloPlayer2,$winner){
		return EloCalculator::updatePlayer1EloRanking($EloPlayer1,$EloPlayer2,$winner);
	}


	public function updatePlayersEloRanking($EloPlayer1,$EloPlayer2,$winner){
		return EloCalculator::updatePlayersEloRanking($EloPlayer1,$EloPlayer2,$winner);
	}

}
