<?php
	
	namespace Content\_Default;
	
	class Quote {
		private $quote;
		private $name;
		private $src = 'front/img/quote.jpg';
		
		public function __construct($name) {
			$this->name = $name;
			$this->getData();
			$this->render();
		}
		
		private function getData() {
			global $lang;
			$con = new \Db\Connect('quotes');
			$index = \Db\Connect::getIndex($con->data, 'name', $this->name);
			$this->quote = $con->data[$index]['quote'][$lang];
		}
		
		private function render() {
			?>
				<div class="quote">
					<blockquote>
						<p>«<?= $this->quote ?>»</p>
						<footer><?= $this->name ?></footer>
					</blockquote>
					<img src="<?= $this->src ?>">
				</div>
			<?
		}
	}