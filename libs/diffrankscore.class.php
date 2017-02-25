<?php

class DiffRankScore {
	
	
	
	
	public static function compare($alist, $blist) {
	
		//return list($alist, $blist);
		
		$total_diffs = 0;
		
		foreach($alist as $akey => $item) {
		
			$bkey = array_search($item, $blist);	
		
			$diff_score = abs($akey - $bkey);
	
			$total_diffs += $diff_score;
		
		}
		
		return $total_diffs;
		
	}
	
	
	
	
	#********************************* Generateurs de datas pour les tests ****************************************
	
	/**
	 *	Generateurs de datas pour les tests
	 *
	 */
	
	public static function generateOrderedList($nb) {
	
		$list = array();
		for($i = 1; $i <= $nb; $i++) {
			$list[] = $i;
		}
		return $list;
	}
	
	
	public static function generateRandomList($nb) {
	
		$list = self::generateOrderedList($nb);
		shuffle($list);
		return $list;
	}
	
	
	public static function reverseList($list) {
		$list = array_reverse($list);
		return $list;
	}
	
		
	public static function generateSameValueList($value, $nb) {
		$list = array();
		for($i = 0; $i < $nb; $i++) {
			$list[] = $value;
		}
		return $list;
	}	
		
		
	public static function reorderList($list_to_order, $ordered_keys) {
   		$list = array();
		foreach($ordered_keys as $val) {
			$list[] = $list_to_order[$val];
		}
		return $list;
    }
		
};
