<figure>
	<figcaption>
		<?php
			if ($menu == "graphic-design") {
				$figure = new Content\Display\GraphicDesign();
			}
			if ($menu == "illustration") {
				$figure = new Content\Display\Illustration();
			}			
		?>
	</figcaption>
	<?php $figure->renderImgs(); ?>
</figure>