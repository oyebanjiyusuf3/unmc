	<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<?php
			// SLIDER INDICATORS
			$slider_items = getSliderItems(); // array
			$counter = 0;
			foreach($slider_items as $item)
				{			
				?>
				<li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $counter;?>" <?php if($counter==0) echo 'class="active"';?>></li>
				<?php
				$counter = $counter + 1;
				}
				?>
		</ol>

		
									
		<div class="carousel-inner">	
			<?php
			// SLIDER ITEMS
			$item_number = 0;
			foreach($slider_items as $item)
				{
					
					// yusufi
				?>
				<div class="carousel-item <?php if($item_number==0) echo 'active';?>">
					<img class="d-block w-100" src="<?php echo UPLOADS_DIR;?>/images/<?php echo $item['image'];?>" alt="<?php echo $item['title'];?>">
					<div class="carousel-caption d-md-block">
						<?php if($item['url']) { ?><div class="slide-title"><a href="<?php echo $item['url'];?>"><?php echo $item['title'];?></a></div><?php } 
						else { ?><div class="slide-title"><?php echo $item['title'];?></div> <?php } ?>
						<p class="slide-content d-none d-md-block"><?php echo $item['content'] ;?></p>
					</div>
				</div>
				<?php
				$item_number = $item_number + 1;
				}
				?>
		</div>
		
		<a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
								  
	</div>