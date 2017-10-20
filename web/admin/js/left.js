$().ready(function(){
	$('ul').hide();
    $('ul:first').show();
	$('button').click(function(){
		$('ul').hide();
		$(this).next('ul').show();
	});
});