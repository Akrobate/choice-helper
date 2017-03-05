<?php
/**
 *  Source manager
 *
 */


class Sources{

	private $sources_list = array();
	private $sources_collection = array();

	/**
	 *	Setteur de source list
	 *
	 */

	public function setSourceListe($list) {
		$this->sources_list = $list;
		return $this;
	}


	/**
	 *	Ajouter une source
	 *
	 */

	public function addSource($srcPath) {
		$this->sources_list[] = $srcPath;
		return $this;
	}


	public function createCollectionFromSources() {
		$result = array();
		foreach($this->sources_list as $path) {
			if (($arr = $this->getFilesFromPath($path)) !== false) {
				$result = array_merge($result, $arr);
			} else {
				echo("cant open");
			}
		}
		$this->sources_collection = $result;
	}


    /**
     * Build collection from dirpath
     *
     */

	public function createImageCollectionFromSources() {
		$result = array();
		foreach($this->sources_list as $path) {
			if (($arr = $this->getImagesFromPath($path)) !== false) {
				$result = array_merge($result, $arr);
			} else {
				echo("cant open");
			}
		}
		$this->sources_collection = $result;
	}


	public function getCollection() {
		return $this->sources_collection;
	}


	public function getImagesFromPath($path) {
		$collec = $this->getFilesFromPath($path);
		$result = array();
		$img_files_ext = array('jpg','JPG','JPEG', 'jpeg', 'png', 'PNG');
		foreach($collec as $item) {
			if (in_array($item['ext'], $img_files_ext)) {
				$result[] = $item;
			}
		}
		return $result;
	}


	public function getFilesFromPath($path) {
		$url = $path['url'];
		$path = $path['path'];
		$results = array();
		if (is_dir($path)) {
			if ($dh = opendir($path)) {
				while (($file = readdir($dh)) !== false) {
					$t['type'] = filetype($path . $file);
					$t['file'] = $file;
					$t['pathfile'] = $path . $file;
					$exx = explode('.', $file);
					$t['ext'] = $exx[1];
					$t['url'] = $url;
					$results[] = $t;
				}
				closedir($dh);
				return $results;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

}
