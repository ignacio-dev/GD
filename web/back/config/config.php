<?php

	// TIMESTAMP
		/*
			• Use vNumber To Cache Files
			• Use time() To Avoid File Cache
		*/
	define('TIMESTAMP', 'v012');

	// URL PARAMS (Defaults Marked With *)
		/*
			Menu
				* Graphic Design
				• Illustration
				• Contact
			Display
				* Default (Display All Works) (defult)
				• Current Work
			Lang
				* En (English) (default)
				• Es (Spanish)
			Index
				• Current Work ID (In Order To Call JSON Data) (Empty When Display Is Default)
		*/
	$menu    = (!isset($_GET['menu']))    ? 'graphic-design' : $_GET['menu'];
	$display = (!isset($_GET['display'])) ? 'default'        : $_GET['display'];
	$lang    = (!isset($_GET['lang']))    ? 'en'             : $_GET['lang'];
	$index   = (!isset($_GET['index']))   ? ''               : $_GET['index'];	

	// HTML MINIMIZER
	function minimizeHtmlOutput($html) {
		$search  = array('/\>[^\S ]+/s', '/[^\S ]+\</s', '/(\s)+/s');
		$replace = array('>', '<', '\\1');
		$html    = preg_replace($search, $replace, $html);
		return $html;
	}

	// URL PARSER
	function urlFriendly($str) {
		$str = str_replace(
			array('(', ')', ' '),
			array('', '', '-'),
			$str
		);
		$target = '/&([A-Za-z]{1,2})(grave|acute|circ|cedil|uml|lig|tilde);/';
		$str_encoded = htmlentities($str, ENT_NOQUOTES, 'UTF-8');
		$str = preg_replace($target, '$1', $str_encoded);
		return strtolower($str);
	}