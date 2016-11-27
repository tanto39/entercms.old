//слайдер с миниатюрами
$(document).ready(function() {
	
	$('.slider-mini-block div').click(function(){
		$('.slider-mini-block div').each(function() {
            $(this).css('border','2px solid #666');
        });
		$(this).css('border','2px solid #C30');
		var minisrc = $(this).children().eq(0).attr('src');
			$('.slider-big img').fadeOut(300, function(){$('.slider-big img').attr('src',minisrc).fadeIn(300);});	
		});
		
	if($('.slider-mini-block div').length == 5)	{
		$('.slider-mini-block').css('width','520px');
		$('.slider-wrap').css('width','520px');
	}	
	if($('.slider-mini-block div').length == 4)	{
		$('.slider-mini-block').css('width','420px');
		$('.slider-wrap').css('width','420px');
	}
	if($('.slider-mini-block div').length == 2)	{
		$('.slider-mini-block').css('width','220px');
	}
	if($('.slider-mini-block div').length == 1)	{
		$('.slider-mini-block').css('display','none');
	}
		
//модальное окно
		jQuery(document).click( function(event){
			if( jQuery(event.target).closest(".full-img img").length ) 
			return;
			jQuery(".full-img-wrap").fadeOut(500);
			jQuery(".fon").fadeOut(500);
				event.stopPropagation();
			});
			jQuery('.slider-big img').click(function(){
				var bigsrs = jQuery(this).attr('src');
				jQuery('.full-img-wrap').fadeIn(500);
				jQuery('.full-img').html('<img src="'+bigsrs+'"/><div class="close-img">x</div>');	
				var fullwidth = jQuery('.full-img img').prop('width');
				var fullheight = jQuery('.full-img img').prop('height');
				var raznica = (fullwidth - fullheight)/20;
				var i;
				var fullsize = 40;
			if(raznica >= 0){
				for(i = 0; i < raznica; i++){
					fullsize += 1;
				}
			}
			else{
				raznica = 0 - raznica;
				for(i = 0; i < raznica; i++){
					fullsize -= 0.5;
				}
			}
				jQuery('.full-img').css('width', fullsize+'%');
				jQuery(".fon").fadeIn(500);
			return false;
			});

});