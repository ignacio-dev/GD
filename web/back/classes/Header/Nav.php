<?php
	
	namespace Header;
	
	class Nav {
		protected $keyVal;
		protected $label;
		protected $link;
		protected $cssClass = '';
		
		public function __construct($keyVal) {
			$this->keyVal = $keyVal;
		}
		
		protected function getData($jsonFileName) {
			global $lang;
			$con = new \Db\Connect($jsonFileName);
			$index = \Db\Connect::getIndex($con->data, 'keyVal', $this->keyVal);
			$this->label = $con->data[$index]['label'][$lang];
		}
		
		protected function render() {
			?>
				<a href="<?= $this->link ?>" class="<?= $this->cssClass ?>">
					<?= $this->label ?>
				</a>
			<?
		}
		
		public static function separator() {
			?>
				<span class="separator"></span>
			<?
		}
	}