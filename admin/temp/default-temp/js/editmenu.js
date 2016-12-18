/*-----подстановка наименования элемента----*/
$(document).ready(function(){
	$('#itemmenu-element_name_change').change(function(){
		$('#itemmenu-element').val($('#itemmenu-element_name_change').val());
		$('#itemmenu-element_name').val($('#itemmenu-element_name_change option:selected').html());
	});
	
	$('#add-itemmenu-element_name_change').change(function(){
		$('#additemmenu-element').val($('#add-itemmenu-element_name_change').val());
		$('#additemmenu-element_name').val($('#add-itemmenu-element_name_change option:selected').html());
	});

});
