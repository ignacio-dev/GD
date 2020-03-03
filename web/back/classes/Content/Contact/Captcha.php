<?php
	
	namespace Content\Contact;
	
	class Captcha extends FormItem{
		private   $siteKey = '6Le2dLMUAAAAAB4d-8JOhtKL3IEidYHYQUIvSYBI';
		private   $class   = 'g-recaptcha';
		private   $label;
		protected $captchaStatus;
		
		public function __construct() {
			$this->captchaStatus = (empty($_GET['captcha'])) ? '' : $_GET['captcha'];
			if ($this->captchaStatus == 'fail') {
				$this->class .= ' error';
			}
			$this->render();
		}
		
		private function render() {
			?>
				<div class="<?= $this->class?>" data-sitekey="<?= $this->siteKey ?>"></div>
			<?
		}
	}