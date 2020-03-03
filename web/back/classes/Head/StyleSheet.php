<?php
	
	namespace Head;

	class Stylesheet {
		private $path = 'front/css';
		private $name;
		private $link;

		public function __construct($name) {
			$this->name = $name;
			$this->link = "{$this->path}/{$this->name}.css?" . TIMESTAMP;
			$this->render();
		}

		private function render() {
			?><link rel="stylesheet" href="<?= $this->link ?>"><?
		}
	}