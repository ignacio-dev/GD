<?php

	$class = <<<EOT
class='active'
EOT;

	$figure = <<<HTML
<figure $class>
	<figcaption></figcaption>
	<img src="">
	<img src="">
	<img src="">
	<img src="">
	<img src="">
</figure>
HTML;
	echo $figure;