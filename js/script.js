$(document).ready(function(){
	$('code').hover(function(){
		var elem = $(getElementName(this)),
		    bg = elem.css("background");
		    elem.data('bg-orig', bg).css({"background": "yellow"});
	},
	function(){
		var elem = $(getElementName(this));
		bg = elem.data('bg-orig');
		$(elem).css({"background": bg});
	});
	function getElementName(element){
		return String($(element).text().match(/\w+/));
	}
});

---------- stao na 27 oj strani -----------