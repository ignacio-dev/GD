<?php
	
	namespace Header;

	class NavMenu extends Nav {
		public function __construct($keyVal) {
			global $menu, $lang;
			parent::__construct($keyVal);
			$this->link = "?lang={$lang}&menu={$this->keyVal}";
			if ($this->keyVal == $menu) {
				$this->cssClass = 'active';
			}
			$this->getData('nav-menus');
			$this->render();
		}
	}