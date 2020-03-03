<?php

	namespace Content\Contact;

	class SuccessMessage extends FormItem {
		private $label;

		public function __construct() {
			$this->getData();
			$this->render();
		}

		private function getData() {
			global $lang;
			$con = new \Db\Connect('contact');
			$this->label = $con->data['success-message'][$lang];
		}

		private function render() {
			?>
				<p id="success-message">
					<?= $this->label ?>
				</p>
			<?
		}
	}