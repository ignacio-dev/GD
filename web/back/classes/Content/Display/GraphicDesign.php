<?php
	
	namespace Content\Display;

	class GraphicDesign extends Set {
		private $name; // Project Name
		private $role;
		private $award;

		public function __construct() {
			parent::__construct();
			$this->getData();
			$this->render();
		}

		private function getData() {
			global $lang, $menu;
			$con = new \Db\Connect('graphic-design');
			$index = $_GET['index'];

			$setsPath = $con->data['sets'][$index];
			$this->name   = $setsPath['name'];
			$this->series = $setsPath['series'];
			$this->role   = $setsPath['role'][$lang];
			$this->award  = $setsPath['award'];
			$this->client = $setsPath['client'];

			$labelsPath = $con->data['labels'];
			$this->clientLabel = $labelsPath['client'][$lang];
		}

		private function render() {
			global $lang;

			if ($this->series) {
				?>
					<?= $this->role ?>:
					<cite><?= $this->name ?></cite>
					<br>
				<?
			}
			else {
				?>
					<?= $this->role ?>
					<br>
				<?
			}

			if ($this->award != null) {
				?>
					<?= $this->award[$lang] ?>
					<br>
				<?
			}
			?>
				<?= $this->clientLabel ?>: <?= $this->client?>
			<?

		}
	}