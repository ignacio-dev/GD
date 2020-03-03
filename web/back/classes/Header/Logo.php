<?php
	
	namespace Header;
	
	class Logo {
		private $heading = 'GERARDO DOMINGUEZ';
		private $src = 'front/img/logo.svg';
		private $link;
		
		public function __construct() {
			global $menu, $lang;
			$this->link = "?lang={$lang}&menu={$menu}";
			$this->render();
		}
		
		private function render() {
			?>
				<a href="<?= $this->link?>">
					<img src="<?= $this->src?>">
				</a>
				<h1>
					<?= $this->heading ?>
				</h1>
			<?
		}
	}