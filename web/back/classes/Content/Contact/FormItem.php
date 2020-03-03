<?php
	
	namespace Content\Contact;
	
	class FormItem {
		protected $name;
		protected $required; // Boolean
		protected $value;    // For Recovery
		
		public function __construct($name, $required) {
			$this->name = $name;
			$this->required = $required;
			$this->recoverData();
		}
		
		protected function required() {
			if ($this->required) {
				return ' required';
			}
		}
		
		private function recoverData() {
			if (!empty($_GET[$this->name])) {
				$this->value = $_GET[$this->name];
			}
			else {
				$this->value = '';
			}
		}
	}