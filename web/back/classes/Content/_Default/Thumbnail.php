<?php
	
	namespace Content\_Default;
	
	class Thumbnail {
		private $name;
		private $urlName;
		private $src;
		private $link;
		private $index;
		
		public function __construct($name) {
			global $lang, $menu;
			
			$this->name = $name;
			$this->urlName = urlFriendly($this->name);
			$this->src = "front/img/{$menu}/{$this->urlName}.jpg?" . TIMESTAMP;
			$this->getData($this->name);
			$this->link = "?lang={$lang}&menu={$menu}&display={$this->urlName}&index={$this->index}";
			$this->render();
		}
		
		private function getData($name) {
			global $menu;
			$con = new \Db\Connect($menu);
			$prop = ($menu == 'graphic-design') ? 'name' : 'title';
			$this->index = \Db\Connect::getIndex($con->data['sets'], $prop, $name);
		}
		
		public function render() {
			?>
				<a href="<?= $this->link ?>">
					<img src="<?= $this->src ?>">
				</a>
			<?
		}
	}