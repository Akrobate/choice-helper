<?php

class EloCalculator {
	
	
	public static function getExpectedScore($EloPlayer1,$EloPlayer2){
		$exp = -($EloPlayer1-$EloPlayer2)/400;
		return 1/(1+pow(10,$exp));
	}



	public static function updatePlayer1EloRanking($EloPlayer1,$EloPlayer2,$winner){
		$score=($winner>0)?$winner*-1+2:0.5;
		$expectedScore = self::getExpectedScore($EloPlayer1,$EloPlayer2);
		$K=self::getKConstant($EloPlayer1); // qui est à définir selon vos envie
		$updatedRank = round($EloPlayer1+$K*($score-$expectedScore));
		//threshold
		if($updatedRank<300){
			return 300;
		}else{
			return $updatedRank;
		}
	}
	
	
	
	public static function updatePlayersEloRanking($EloPlayer1,$EloPlayer2,$winner){
		$tmpElo1=self::updatePlayer1EloRanking($EloPlayer1,$EloPlayer2,$winner);
		$winner=($winner>0)?$winner*-1+3:0.5;		// on inverse le resultat si 1 alors 2 si 2 alors 1
		$EloPlayer2=self::updatePlayer1EloRanking($EloPlayer2,$EloPlayer1,$winner);
		$EloPlayer1=$tmpElo1;
		$result['a'] = $EloPlayer1;
		$result['b'] = $EloPlayer2;
		return $result;
		
	}
	
	
	public static function getKConstant() {
		return 16;
	}
	
	
}
