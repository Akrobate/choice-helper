<?php

/**
 *	Class used by script installation to prepare data storage
 *	Creates tables
 */

class ApplicationSetup {

	public static function queryCreateItemsTable() {
		$query = '
			CREATE TABLE `items` (
			  `id` bigint(24) unsigned NOT NULL AUTO_INCREMENT,
			  `title` varchar(255) NOT NULL,
			  `value` text NOT NULL,
			  `created` datetime NOT NULL,
			  `updated` datetime NOT NULL,
			  `rank` float(10,5) NOT NULL,
			  PRIMARY KEY (`id`)
			) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=UTF8;
		';
		return $query;
    }


    public static function queryCreateCollectionsTable() {
		$query = '
		    CREATE TABLE IF NOT EXISTS `collections` (
		      `id` bigint(24) NOT NULL AUTO_INCREMENT,
		      `label` varchar(255) NOT NULL,
		      `user_id` int(11) NOT NULL,
		      `created` datetime NOT NULL,
		      `updated` datetime NOT NULL,
			  PRIMARY KEY (`id`)
		    ) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=UTF8;
		';
		return $query;
    }


    public static function queryCreateUsersTable() {
		$query = '
		    CREATE TABLE IF NOT EXISTS `users` (
		      `id` bigint(24) NOT NULL AUTO_INCREMENT,
		      `email` varchar(255) NOT NULL,
		      `first_name` int(11) NOT NULL,
		      `last_name` datetime NOT NULL,
			  `token` TEXT NOT NULL,
			  `created` datetime NOT NULL,
		      `updated` datetime NOT NULL,
			  PRIMARY KEY (`id`)
		    ) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=UTF8;
		';
		return $query;
    }

}
