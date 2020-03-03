<?php
	
	namespace Content\Contact;
	
	class Input extends FormItem {
		private $placeholder;
		private $type;
		
		public function __construct($name, $required, $type) {
			parent::__construct($name, $required);
			$this->type = $type;
			$this->getData($name);
			$this->render();
		}
		
		private function getData($val) {
			global $lang;
			$con = new \Db\Connect('contact');
			$this->placeholder = $con->data[$val][$lang];
		}
		
		private function render() {
			?>
				<input type="<?= $this->type ?>" name="<?= $this->name ?>" placeholder="<?= $this->placeholder?>" value="<?= $this->value?>" <?= $this->required() ?>>
			<?
		}
	}