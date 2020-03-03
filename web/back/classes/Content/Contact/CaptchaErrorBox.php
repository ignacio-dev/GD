<?php
	
	namespace Content\Contact;
	
	class CaptchaErrorBox extends Captcha {
		public function __construct() { 
			$this->captchaStatus = (empty($_GET['captcha'])) ? '' : $_GET['captcha'];
			if ($this->captchaStatus == 'fail') {
				$this->getData();
				$this->render();
			}
		}
		
		private function getData() {
			global $lang;
			$con = new \Db\Connect('contact');
			$this->label = $con->data['captcha-error'][$lang];
		}
		
		private function render() {
			?>
				<p class="error">
					<?= $this->label ?>
				</p>
			<?
		}
	}