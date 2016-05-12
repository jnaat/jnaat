$(document).ready(function(){
	if($('#jTitle').length)
	{
		var b=$('#breadcrumb').children('a').first().next(); var t=b.text(); b.text($('#jTitle').text()+", "+t);
	}
});