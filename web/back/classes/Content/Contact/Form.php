<?php
	
	namespace Content\Contact;
	
	class Form {
		private   $action = 'back/actions/send.php';
		private   $method = 'POST';
		protected $status;
		
		public function __construct() {
			global $lang;
			$this->status  = (isset($_GET['status'])) ? $_GET['status'] : '';
			$this->action .= "?lang={$lang}";
			$this->render();
		}
		
		private function render() {
			?>
				<form action="<?= $this->action ?>" method="<?= $this->method ?>">
					<?
						if ($this->status != 'success') {
							new Input("name",       true,  "text");
							new Input("email",      true,  "email");
							new Input("phone",      false, "tel");
							new Textarea("message", true);
							new CaptchaErrorBox();
							?>
							<div id="validation-area">
								<?
									new Captcha();
									new SendButton();
								?>
							</div>
							<?
						}
						else {
							new SuccessMessage();
						}
					?>
				</form>
			<?
		}
	}