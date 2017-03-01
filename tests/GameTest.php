<?php

include_once("bootstrap_api.php");

class GameTest extends PHPUnit_Framework_TestCase {

	public static $url = API_URL;
	public static $token = null;
	public static $nbrOffersMine = 3;
	public static $nbrOffersTotal = 33;

	//	public static $nbrOffersMine = 4;	
	//public static $idOfLocationForCRUDTest = 5;
	
    protected function setUp() {
      
    }


   	/**
	 *	On Connecte l'utilisateur et on recuper les skills
	 *	users / access
	 *
	 */ 
    
	public function testGameGetItems() {

		$answer = apiQuickQuery(self::$url, 'game', 'getitemsforgame', array(), 1);
		$this->assertEquals(200, $answer->errorId);

	}
   
   
    /**
	 *	On Connecte l'utilisateur et on recuper les skills
	 *	users / access
	 *
	 */ 
    
	public function testGameGetResults() {

		$answer = apiQuickQuery(self::$url, 'game', 'getresults', array(), 1);
		$this->assertEquals(200, $answer->errorId);

	}
   
   
    protected function tearDown() {


    }

}

