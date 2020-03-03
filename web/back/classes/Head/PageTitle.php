<?php
	
	namespace Head;
	
	class PageTitle {
		private $title = 'GD | Gerardo Domínguez';
		private $appendage = '';
		
		public function __construct() {
			global $display;

			if ($display != 'default') {
				$this->setAppendage();
			}
			
			$this->render();
		}
		
		private function setAppendage() {
			global $menu, $index;
			
			if ($menu == 'graphic-design') {
				$prop = 'name';
			}
			if ($menu == 'illustration') {
				$prop = 'title';
			}
			
			$con = new \Db\Connect($menu);
			$this->appendage  = ' - ';
			$this->appendage .= $con->data['sets'][$index][$prop];
		}

		private function render() {
			?><title><?= $this->title . $this->appendage?></title><?
		}
	}