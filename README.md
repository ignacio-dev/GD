# GERARDO DOMINGUEZ
Portfolio website that uses object-oriented PHP to build front-end elements that will display with the appropiate styles and event listeners depending on user interaction.

***
## Technologies
* PHP
* Json
* HTML
* CSS
* Javascript

***
## How It Works
This project is divided in two main folders, _front_ and _back_. All the server logic will be taken care of by the files located inside the _back_ folder, while all the views and structures will be rendered on the files located inside the _front_ folder. Both folders will interact with each other via the _index.php_ file, located at the root.

#### index.php
Located at the root. This file is in charge of calling the bootstrap, rendering the main HTML skeleton and compressing the HTML output by using the _minimizeHtmlOutput()_ custom function. The website's content will be rendered inside the _main_ HTML tags by instantiating a new _Content\Main()_ class.

```php
<?php
	require_once('back/config/bootstrap.php');
	ob_start('minimizeHtmlOutput');
?>
<!DOCTYPE html>
<html>
<? require_once('front/inc/head.php') ?>
<body>
	<? require_once('front/inc/header.php') ?>
	<main>
		<? new Content\Main() ?>
	</main>
	<? require_once('front/inc/scripts.php') ?>
</body>
</html>
```

***
#### bootstrap.php
Located inside the _config_ folder at the _back_ root. This file is in charge of calling the _config.php_ file (located in the same folder) and load all the classes (located inside the _classes_ folder at the _back_ root) needed for the website to render.

```php	
// Load Config File
require_once('back/config/config.php');

// Load Classes
spl_autoload_register(function($class) {
	$path = "back/classes/{$class}.php";
	$path = str_replace('\\', '/', $path);
	require_once($path);
});
```

***
#### config.php
Located inside the _config_ folder at the _back_ root. This file is in charge of the following:

##### **> TIMESTAMP**
Constant used to control caching of files. Must be set to a string

Example:

```php
define('TIMESTAMP', 'v012');
```

##### **> URL Parametes**
This website uses the following URL parameters:

Name | Description | Values
---- | ----------- | -------
_menu_ | Defines what is the current menu or section that needs to be displayed. | <ul><li>_graphic-design_ (default)</li><li>_illustration_</li><li>_contact_</li></ul>
_display_ | If set to 'default' the website will render a gallery of all work sets related to the current menu. Otherwise, it will display a specific work or collection | <ul><li>_default_ (default)</li><li>_name of collection_</li></ul>
_lang_ | Defines if the website should be displayed in English or Spanish | <ul><li>_en_ (default)</li><li>_es_</li></ul>

Examples:

```?lang=es&menu=illustration&display=trencar-el-silenci``` will load the Illustration menu, display the 'Trencar El Silenci' collection and render the website in Spanish

```?menu=graphic-design``` Will load the Graphic Design menu, display a gallery with all the Graphic Design work sets and render the website in English.


##### **> minimizeHtmlOutput($html)**
As this website uses a lot of images, this function is used to minimize the HTML output to speed up rendering times.

##### **> urlFriendly($str)**
Takes in a string and parses it for URL use by removing or replacing special characters.

****
#### Classes
All classes are located inside the _classes_ folder at the _back_ root. These files are used to render front-end elements into the website by using the _render()_ method which is shared by all classes and called within the constructor.

There is an exception to this which is the _Db_ class. This file does not render any element on the website, but rather collects and handles data from the _json_ folder.

##### **> Head**
Namespace that contains the classes in charge of performing the logic needed to render elements inside the _head_ HTML tags.
* __PageTitle__: Will render the _title_ HTML tags with the corresponding title.
* __StyleSheet($name)__: Will render a stylesheet link pointing to the name of the file specified in the $name parameter.

Example:
```php
new Head\PageTitle();
new Head\StyleSheet('main');
new Head\StyleSheet($menu);
```
... with the following URL parameters:

``` ?menu=illustration&display=trencar-el-silenci```

... will be rendered as:
```HTML
<title>GD | Gerardo Dominguez - Trencar El Silenci</title>
<link rel="stylesheet" href="front/css/main.css">
<link rel="stylesheet" href="front/css/illustration.css">
```