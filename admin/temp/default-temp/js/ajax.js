/*-----Аякс редактор--------*/
$(document).ready(function(){
	$('#get-data-form').submit(function(e){
		e.preventDefault();
		$('.after-save').css({'display': 'block'});
		var str = $(this).serialize();
		$.ajax({
			type: "POST",
			url: "getdata.php",
			data: str,
			success: function(data){
				$('.after-save').html(data);
			}
		}); //end ajax
		return false;
	}); //end submit


});