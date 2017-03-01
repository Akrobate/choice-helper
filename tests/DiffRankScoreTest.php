<?php

include_once("bootstrap_classes.php");

class DiffRankScoreTest extends PHPUnit_Framework_TestCase {

	//public static $idOfLocationForCRUDTest = 5;
	
    protected function setUp() {
      
    }


   	/**
	 *	On Connecte l'utilisateur et on recuper les skills
	 *	users / access
	 *
	 */ 
    
	public function testCompareLists() {

		$this->assertEquals(200, 200);

//		$l1 = DiffRankScore::generateOrderedList(10);
		$l2 = DiffRankScore::generateRandomList(10);
//		$l2b = DiffRankScore::generateRandomList(10);
		
//		$l3 = DiffRankScore::reverseList($l1);

//		print_r($l3);
		
//		$sc = DiffRankScore::compare($l2, $l2b);
		echo("dataset\n********");
		print_r($l2);


		#creating eloranking reference
		
		$ranks = DiffRankScore::generateSameValueList(1500, 10);
		echo("ranks\n********");
		//print_r($ranks);
		
		
		#On cree une variable ou on sort by ranks
		$ranks_sorted = $ranks;
		//asort($ranks_sorted);
		
		$ranks_sorted[0] = 1600;
		$ranks_sorted[9] = 1400;
		
		uksort($ranks_sorted, function($a,$b)use($ranks_sorted){
			if($ranks_sorted[$a] < $ranks_sorted[$b]){
				return -1;
			 }
			 if($ranks_sorted[$a] > $ranks_sorted[$b]){ 
				return 1;
			 }
			 return strcmp($a,$b);
		 }); 
		
		
		
		//print_r(array_keys($ranks_sorted));
		
		echo("ranks_sorted\n********");
		print_r($ranks_sorted);
		
		
		echo("new_l2\n********");
		$new_l2 = DiffRankScore::reorderList($l2, array_keys($ranks_sorted));
		print_r($new_l2);
		
		$ranks_sort_keys = array();
		foreach($ranks_sorted as $rank) {
			$ranks_sort_keys[] = $rank;
		}
		
		echo("ranks_sort_keys\n********");
		print_r($ranks_sort_keys);	

		//$g = new game();
		//EloCalculator::updatePlayersEloRanking($EloPlayer1,$EloPlayer2,$winner);

		//array_sort($array, $on, $order=SORT_ASC)

		//$itemA['rank'] = $scores['a'];
		//$itemB['rank'] = $scores['b'];

	}



	/**
	 *	On Connecte l'utilisateur et on recuper les skills
	 *	users / access
	 *
	 */ 
    
	public function testProcess1() {

		$data_list = DiffRankScore::generateRandomList(10);
		$ranks_list = DiffRankScore::generateSameValueList(1500, 10);
		echo("testProcess1 data_list\n********");
		print_r($data_list);
		
		echo("testProcess1 data_list\n********BeforeWHile****");
		
		$i = 1;
		
		$lsc = array();
		
		for($i = 1; $i < 10000; $i++) {
		
			echo("processOneShuffle\n********");
		
			$couple = $this->selectTwoRandomPlayers($data_list);
		
			$rk1 = array_search($couple[0], $data_list);
			$rk2 = array_search($couple[1], $data_list);
		
			$winner = 0;
			if ($data_list[$rk1] > $data_list[$rk2]) {
				$winner = 1;
			} else {
				$winner = 2;
			}

			$scores = EloCalculator::updatePlayersEloRanking($ranks_list[$rk1],$ranks_list[$rk2],$winner);
		
			$ranks_list[$rk1] = $scores['a'];
			$ranks_list[$rk2] = $scores['b'];
		
			echo("testProcess1 ranks_list");
			print_r($ranks_list);
		
			

			$r = $this->processOneShuffle($data_list, $ranks_list);
		
			
			print_r($r);
			$sc = DiffRankScore::compare($data_list, $r['list']);
			
			//sleep(5);
			$lsc[] = $sc;
			
			
		}
		
		
		
		
		echo("SCCCscores ranks_list");
		print_r($lsc);
		
	}



	public function selectTwoRandomPlayers($data_list) {
	
		$nl = $data_list;
		shuffle($nl);
		return array($nl[0], $nl[1]);
	}



   
   function processOneShuffle($data_list, $ranks_list) {
   
	   	$ranks_sorted = $ranks_list;
		//asort($ranks_sorted);
	
		uksort($ranks_sorted, function($a,$b)use($ranks_sorted){
			if($ranks_sorted[$a] < $ranks_sorted[$b]){
				return -1;
			 }
			 if($ranks_sorted[$a] > $ranks_sorted[$b]){ 
				return 1;
			 }
			 return strcmp($a,$b);
		 }); 
		
   	
   		$new_l2 = DiffRankScore::reorderList($data_list, array_keys($ranks_sorted));
   	
   		$ranks_sort_keys = array();
		foreach($ranks_sorted as $rank) {
			$ranks_sort_keys[] = $rank;
		}
   	
   		return array('list' => $new_l2 , 'ranks' => $ranks_sort_keys);
   
   }
   
   
   
    /**
	 *	On Connecte l'utilisateur et on recuper les skills
	 *	users / access
	 *
	 */    
   
    protected function tearDown() {


    }

}

