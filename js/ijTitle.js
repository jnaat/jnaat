$(document).ready(function(){
	var jtext = $('#jTitle').text();
	var htext = $('h2').first().text();
	var s=", ";
	var finaltext =jtext.concat(s,htext) ;
	$('h2').text(finaltext);
})