<?php
	
	namespace Header;

	class Main {
		static public function hr() {
			global $display;
			if ($display != 'default') {
				?><hr><?
			}
		}
	}