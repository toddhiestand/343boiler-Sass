// Clear the input boxes when clicked

jQuery(document).ready(function() {

	jQuery.fn.cleardefault = function() {
	return this.focus(function() {
	if( this.value == this.defaultValue ) {
	this.value = "";
	}
	}).blur(function() {
	if( !this.value.length ) {
	this.value = this.defaultValue;
	}
	});
	};
	jQuery(".input_clear input, .input_clear textarea").cleardefault();

});


// Scroll to Div for the home page

function scrollToElement(selector, time, verticalOffset) {
	time = typeof(time) != 'undefined' ? time : 500;
	verticalOffset = typeof(verticalOffset) != 'undefined' ? verticalOffset : -60;
	element = $(selector);
	offset = element.offset();
	offsetTop = offset.top + verticalOffset;
	$('html, body').animate({
		scrollTop: offsetTop
	}, time);			
}
			
$(document).ready(function() {
		
		$('#scroll-to-div').click(function (e) {
			e.preventDefault();
			scrollToElement('#div');
		});
		
		
		
});




