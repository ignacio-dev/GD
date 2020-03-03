<?php
	
	namespace Content\Contact;
	
	class SendButton extends FormItem {
		private $label;
		
		public function __construct() {
			$this->getData();
			$this->render();
		}
		
		private function getData() {
			global $lang;
			$con = new \Db\Connect('contact');
			$this->label = $con->data['send-button'][$lang];
		}
		
		private function render() {
			?>
				<button name="send">
					<?= $this->label ?>
				</button>
			<?
		}
	}