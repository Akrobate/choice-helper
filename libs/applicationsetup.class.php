<?php

class ApplicationSetup {

	private static $params;


	public static function createItemsTable() {
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
    }

    public static function createCollectionsTable() {

/*

    CREATE TABLE IF NOT EXISTS `collections` (
      `id` int(11) NOT NULL,
      `label` varchar(255) NOT NULL,
      `user_id` int(11) NOT NULL,
      `created` datetime NOT NULL,
      `updated` datetime NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

    --
    -- Indexes for dumped tables
    --

    --
    -- Indexes for table `collections`
    --
    ALTER TABLE `collections`
      ADD PRIMARY KEY (`id`);

    --
    -- AUTO_INCREMENT for dumped tables
    --

    --
    -- AUTO_INCREMENT for table `collections`
    --
    ALTER TABLE `collections`
      MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
*/

    }


}
