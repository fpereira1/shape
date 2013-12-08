<?php

$exclude = array(
	10,14,20,21,39,37,87,81,80,106,115,
	131,142,143,182,184,209,222,240,244,318,335,340,345,347,348);

?>

<div class="content">
	<?php for($i=1; $i<=350; $i++){ ?>
		<?php if(!in_array($i, $exclude)): ?>
		<?php $image =  "/themes/" . THEME ."/images/weddingphotos/WEB-Lara-Fliype-wedding-" . str_pad($i, 3, "0", STR_PAD_LEFT) . ".JPG"; ?>	
			<img src="<?php echo $image; ?>" class="img-rounded" data-ssrc="/themes/default/images/gui/clear.gif" />
		<?php endif; ?>
	<?php } ?>
</div>

 <div id="loadmoreajaxloader" style="display:none;"><center>Loading</center></div>

<script type="text/javascript">

$('document').ready(function() {
	$('.img-rounded.hide').slice(0,10).each(function(i, el) {
		$('div#loadmoreajaxloader').hide();
		$(el).removeClass('hide').attr('src', $(this).data('original'));
	});
	$(window).scroll(function() {
		if(($(window).scrollTop()) == $(document).height() - $(window).height()){
			if($('.img-rounded.hide').length) {
				$('div#loadmoreajaxloader').show();
				$('.img-rounded.hide').slice(0,10).each(function(i, el) {
					$('div#loadmoreajaxloader').hide();
					$(el).removeClass('hide').attr('src', $(this).data('original'));
				});
			}
		}
	});

});
</script>

<iframe width="0" height="0" src="http://www.youtube.com/embed/hOA-2hl1Vbc?autoplay=1" frameborder="0" allowfullscreen></iframe>
