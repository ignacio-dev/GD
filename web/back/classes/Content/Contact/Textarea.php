<?php
	
	namespace Content\Contact;
	
	class Textarea extends FormItem {
		private $maxLength = '1000';
		private $label;
		
		public function __construct($name, $required) {
			parent::__construct($name, $required);
			$this->getData($name);
			$this->render();
		}
		
		private function getData($val) {
			global $lang;
			$con = new \Db\Connect('contact');
			$this->label = $con->data[$val][$lang];
		}
		
		private function render() {
			?>
				<label for="<?= $this->name ?>">
					<?= $this->label ?>
				</label>
				<textarea name="<?= $this->name ?>" maxLength="<?= $this->maxLength ?>" data-gramm_editor="false" <?= $this->required() ?>><?=
					$this->value ?></textarea>
			<?
		}
	}