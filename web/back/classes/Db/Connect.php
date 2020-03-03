<?php
	
	namespace Db;

	class Connect {
		private $filePath;
		private $fileName;
		public  $data;

		public function __construct($fileName) {
			$this->fileName = $fileName;
			$this->filePath = "back/json/{$this->fileName}.json";
			$this->data     = json_decode(file_get_contents($this->filePath), true);
		}

		public static function getIndex($arr, $prop, $val) {
			foreach ($arr as $key => $value) {
				if ($value[$prop] == $val) {
					return $key;
				}
			}
		}
	}