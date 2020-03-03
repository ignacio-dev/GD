(function () {
	// Toggle Navs	
	var toggleNav = function() {
		var nav = document.getElementsByTagName('nav')[0];
		var nav2 = document.getElementById('languages');

		nav.classList.toggle('open');
		nav2.classList.toggle('open');	
	};

	// Menus Slide Effect
	var slideMenus = function() {
		// Merge Menus Nodelists Into Array
		var menus1 = [].slice.call(document.querySelectorAll('header nav a'));
		var menus2 = [].slice.call(document.querySelectorAll('#languages a'));
		var allMenus = menus1.concat(menus2);

		// Append CSS Animations To Every Item In Array, And Set Delay
		for (var i = 0, delay = 0; i < allMenus.length; i++, delay += 200) {
			if (allMenus[i].classList.contains('slideIn')) {
				allMenus[i].style.webkitAnimationDuration = '600ms';
				allMenus[i].style.animationDuration = '600ms';
				allMenus[i].classList.remove('slideIn');
				allMenus[i].classList.add('slideOut');
			}
			else {
				allMenus[i].style.webkitAnimationDuration = delay + 'ms';
				allMenus[i].style.animationDuration = delay + 'ms';
				allMenus[i].classList.remove('slideOut');
				allMenus[i].classList.add('slideIn');
			}
		}	
	};
	
	// Set Hamburger Click Event
	var burger = document.getElementById('burger');
	burger.onclick = function() {	
		// Change Icon
		if (this.classList.contains('fa-bars')) {
			this.classList.remove('fa-bars');
			this.classList.add('fa-times');
		}
		else {
			this.classList.remove('fa-times');
			this.classList.add('fa-bars');
		}
	
		// Call Other Functions
		slideMenus();
		toggleNav();
	};

	// Collapse Header On Scroll
	window.onscroll = function() {
		var header = document.getElementsByTagName('header')[0];
		var breakpoint = 70;
		
		if (window.pageYOffset >= breakpoint) {
			header.classList.add('collapsed');
		}
		else {
			header.classList.remove('collapsed');
		}
	};
})();