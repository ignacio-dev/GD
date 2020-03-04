# GERARDO DOMINGUEZ
Portfolio website that uses object-oriented PHP to build front-end elements that will display with the appropiate styles and event listeners depending on user interaction using URL parameters.

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
Located inside the _config_ folder at the _back_ root. This file is in charge of calling _config.php_ (located in the same folder) and load all the classes (located inside the _classes_ folder at the _back_ root) needed for the website to render.

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
_menu_ | Defines what menu or section will be displayed. | <ul><li>_graphic-design_ (default)</li><li>_illustration_</li><li>_contact_</li></ul>
_display_ | If set to 'default' the website will render a gallery of all work sets related to the current _menu_. Otherwise, it will display a specific work or collection | <ul><li>_default_ (default)</li><li>\<name of collection\></li></ul>
_lang_ | Defines if the website should be displayed in English or Spanish | <ul><li>_en_ (default)</li><li>_es_</li></ul>

Examples:

```?lang=es&menu=illustration&display=trencar-el-silenci``` will load the Illustration menu, display the 'Trencar El Silenci' collection and render the website in Spanish

```?menu=graphic-design``` will load the Graphic Design menu, display a gallery with all the Graphic Design work sets and render the website in English.


##### **> minimizeHtmlOutput($html)**
As this website uses a lot of images, this function is used to minimize the HTML output to speed up loading times.

##### **> urlFriendly($str)**
Takes in a string and parses it for URL use by removing or replacing special characters.

****
#### Namespaces & Classes
All classes are located inside the _classes_ folder at the _back_ root. These files are used to render front-end elements into the website by using the _render()_ method which is shared by all classes and called within the constructor.

There is an exception to this which is the _Db_ class. This file does not render any element on the website, but rather collects and handles data from the _json_ folder.

##### **> Db**
Namespace that contains the _Connect_ class, in charge of collecting data from the JSON files. Expects a string stating the name of the JSON file that needs to be called.

Example:

```php
$data = new \Db\Connect('quotes');
echo $data[0]['name'];
echo $data[0]['quote']['en'];
```

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

##### **> Header**
Namespace that contains the classes in charge of performing the logic needed to render the header and navigation bar.
* __Main__: Base class from which all _Header_ classes are extended. Contains the _hr()_ method that will render a horizontal line when _display_ value is unequal to _default_.
* __Logo__: Will render the logo with a link pointing to the default _display_ of the current _menu_.
* __Nav__: Class from which navigation elements are generated. Contains the _separator()_ method that will render a vertical line to separate menus when desired. When clicking on a link generated by the _Nav_ class (or any class that extends it) the element will acquire the _active_ CSS class.
* __NavMenu__: Extends the _Nav_ class. Will render the main menus. Expects a string that states what menu the link needs to point to.
* __NavLang__: Extends the _Nav_ class. Will render the language menus. Expects a string that states what language the link needs to point to.

Example:

```php
<header>
    <div class="flex-wrap">
        <div id="logo">
            <?php new Header\Logo(); ?>
        </div>
        <nav>
            <?php
                new Header\NavMenu("graphic-design");
                Header\Nav::separator();
                new Header\NavMenu("illustration");
                Header\Nav::separator();
                new Header\NavMenu("contact");
            ?>
        </nav>
        <div id="languages">
            <?php
                new Header\NavLang("es");
                Header\Nav::separator();
                new Header\NavLang("en");
            ?>
        </div>
        <i class="fas fa-bars" id="burger"></i>
    </div>
    <?php Header\Main::hr(); ?>
</header>
```

##### **> Content**
Namespace that contains the classes in charge of performing the logic needed to render the content.
* __Main__: Base class from which all _Content_ classes are extended. This class listens to the _display_ URL parameter, and loads either the _default_ of the corresponding _menu_, or a specified collection or set from the corresponding _menu_.
* __\_Default__: _Content_ class in charge of rendering the _default_ display of the current _menu_. Two elements can be rendered from this class (quotes and thumbnails) using their corresponding methods: _Quote()_ and _Thumbnail()_. Both expect a string with the name of the thumbnail or quote that needs to be rendered.

Example:

```php
new Content\_Default\Thumbnail("Nueva Biblioteca EDAF");
new Content\_Default\Quote("Milton Claser");
```

* __Display__: _Content_ namespace from which all sets or collection classes are extended.
* __Set__: _Display_ class in charge of rendering all the images and information from a specific set or collection. The information gets rendered when instantiating the class. The images can be rendered separately by using the _renderImgs()_ method (inherited from the _Set_ class).

Example:
```php
<figure>
	<figcaption>
		<?php
			$set = new Content\Display\GraphicDesign();			
		?>
	</figcaption>
	<?php $set->renderImgs(); ?>
</figure>
```
* __Contact__: _Content_ namespace from which all the classes needed to render the contact form are extended. Contains the following classes: <ul><li>Form</li><li>FormItem<ul><li>Input</li><li>Textarea</li><li>SentButton</li><li>Captcha</li></li><li>SuccessMessage</li></ul></ul> In order to insert the it into the page a new _Form_ class must be instantiated. The rest is taken care of automatically.

Example:
```php
new Content\Contact\Form();
```

****
#### JSON Files
Files containing all the data are located inside the _json_ folder at the _back_ root.