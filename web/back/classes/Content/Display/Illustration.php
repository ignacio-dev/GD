<?php
	
	namespace Content\Display;

	class Illustration extends Set {
		private $title;
		private $authors;

		// LABELS
		private $titleLabel;
		private $authorsLabels; // Array
		private $authorsLabel; // Output
		private $seriesLabel;

		public function __construct() {
			parent::__construct();
			$this->getData();
			$this->render();
		}

		private function getData() {
			global $lang;
			$con = new \Db\Connect('illustration');
			$index = $_GET['index'];

			$setsPath = $con->data['sets'][$index];
			$this->title   = $setsPath['title'];
			$this->authors = $setsPath['authors'];
			$this->series  = $setsPath['series'];
			$this->client  = $setsPath['client'];

			$labelsPath = $con->data['labels'];
			$this->titleLabel    = $labelsPath['title'][$lang];
			$this->authorsLabels = $labelsPath['authors'][$lang];
			$this->seriesLabel   = $labelsPath['series'][$lang];
			$this->clientLabel   = $labelsPath['client'][$lang];
		}

		private function setAuthorsLabel() {
			global $lang;

			// ENGLISH
			if ($lang == 'en') {
				// Singular Else Plural
				$i = (sizeof($this->authors) < 2) ? 0 : 1;
			}

			// SPANISH
			if ($lang == 'es') {
				$genders = array();
				foreach ($this->authors as $author) {
					array_push($genders, $author['gender']);
				}
				// Singular (Mascule Else Fememine)
				if (sizeof($this->authors) < 2) {
					$i = (in_array('male', $genders)) ? 0 : 1;
				}
				else {
					// Plural (Masculine Else Femenine)
					$i = (in_array('male', $genders)) ? 2 : 3;
				}
			}

			$this->authorsLabel = $this->authorsLabels[$i];
		}

		private function render() {
			// TITLE
			?>
				<?= $this->titleLabel ?>:
				<cite>
					<?= $this->title ?>
				</cite>
				<br>
			<?

			// AUTHORS
			if ($this->authors != null) {
				$this->setAuthorsLabel();
				$names = array();
				foreach ($this->authors as $author) {
					array_push($names, $author['name']);
				}
				$this->authors = implode(', ', $names);
				?>
					<?= $this->authorsLabel ?>: <?= $this->authors ?>
					<br>
				<?
			}

			// SERIES
			if ($this->series != null) {
				?>
					<?= $this->seriesLabel ?>:
					<cite>
						<?= $this->series ?>
					</cite>
					<br>
				<?
			}

			// CLIENT
			if ($this->client != null) {
				?>
					<?= $this->clientLabel?>: <?= $this->client ?>
				<?
			}
		}
	}