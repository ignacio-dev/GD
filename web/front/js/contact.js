(function () {
	// Add 'submitted' Class To Form When Clicking Btn
	(function addSubmittedClass(){
		var btn = document.getElementsByTagName('button')[0];
		btn.onclick = function() {
			var form = document.getElementsByTagName('form')[0];
			form.classList.add('submitted');
		}
	})();

	// Change Textarea's Label Color When Textarea Is Focused
	(function changeLabelColor() {
		var textarea = document.getElementsByTagName('textarea')[0];
		var label = document.getElementsByTagName('label')[0];
		textarea.onfocus = function() {
				label.classList.add('active');
		}
		textarea.onblur = function() {
				label.classList.remove('active');
		}
	})();
})();