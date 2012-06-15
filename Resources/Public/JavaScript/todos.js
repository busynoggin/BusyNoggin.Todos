$(document).ready(function() {
	$('ul.todos li input[type=checkbox]').click(function() {
		$(this).parents('form').submit();
	});
});