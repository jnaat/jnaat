$(document).ready(function(){
	//set bibtex as default citation
	var link=$('.articleToolItem').children('a').attr("href");
	var newLink=link.replace("/0","/0/BibtexCitationPlugin");
	$('.articleToolItem').children('a').attr("href",newLink);
	//copy citation to main page
	var cite=$('.articleToolItem').children('a');
	cite.clone().appendTo($('#articleCite'));
	var text="BibTeX";
	$('#articleCite').children('a').html(text);
	//$('#articleCite').children('a').css('text-decoration','none');
	//$('#articleCite').children('a').css('color','#1abc9c');
	
	//numbers for references
	// $("#articleCitations").children('div').children().each(function( index ) {
		// var n=index+1;
		// $(this).prepend("<span>["+n+"] </span>");
	// });
});