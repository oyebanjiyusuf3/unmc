<?php 
	// SLIDER ITEMS
	$item_number = 0;
	foreach($slider_items as $item){

?>
	<div id="intro-carousel" class="owl-carousel" >
	  <div class="item" style="background-image: url('<?php echo UPLOADS_DIR;?>/images/<?php echo $item['image'];?>');">
	  </div>
	</div>

<?php
	$item_number = $item_number + 1;
	}
?>