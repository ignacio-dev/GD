<?php
	
	namespace Content;
	
	class Main {
		public function __construct() {
			global $menu, $display;
			
			if ($display == 'default') {
				require_once("front/inc/{$menu}/default.php");
			}
			else {
				require_once('front/inc/display.php');
			}
		}
	}