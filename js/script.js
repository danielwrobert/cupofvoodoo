/*
	Author: Daniel Robert
*/

/*! matchMedia() polyfill - Test a CSS media type/query in JS. Authors & copyright (c) 2012: Scott Jehl, Paul Irish, Nicholas Zakas. Dual MIT/BSD license */
window.matchMedia = window.matchMedia || (function( doc, undefined ) {

  "use strict";

  var bool,
      docElem = doc.documentElement,
      refNode = docElem.firstElementChild || docElem.firstChild,
      // fakeBody required for <FF4 when executed in <head>
      fakeBody = doc.createElement( "body" ),
      div = doc.createElement( "div" );

  div.id = "mq-test-1";
  div.style.cssText = "position:absolute;top:-100em";
  fakeBody.style.background = "none";
  fakeBody.appendChild(div);

  return function(q){

    div.innerHTML = "&shy;<style media=\"" + q + "\"> #mq-test-1 { width: 42px; }</style>";

    docElem.insertBefore( fakeBody, refNode );
    bool = div.offsetWidth === 42;
    docElem.removeChild( fakeBody );

    return {
      matches: bool,
      media: q
    };

  };

}( document ));


//--- Voodoo Object ---//
var Voodoo = {

	// Tablet nav manutab control
	addMenuTab : function() {
		$('<a>', {
			id: 'menutab',
			href: '#',
			text: 'MENU',
			click: function() {
				$('#container nav').slideToggle('fast');
				return false;
			}
		}).insertAfter('.nav_wrap nav');
	}

};


//--- Document Ready Method ---//
$(function() {

	// Initialize FitVids.js in post entry section
	$(".entry").fitVids();

	// Initialize Tab Button
	if (matchMedia('screen and (max-width: 30em)').matches) {
		$('#container nav').css('display', 'none');
		Voodoo.addMenuTab();
	}

	// Disable tag links on portfolio thumbnails
	if($('body').hasClass('page-template-template-portfolio-php')) {
		$('.tech_list > a').on('click', function() {
			return false;
		});
	}

	// Display latest tweet in footer - http://css-tricks.com/snippets/jquery/display-last-tweet/
	// $.getJSON("https://twitter.com/statuses/user_timeline/danielwrobert.json?callback=?", function(data) {
	// 	$("#voodoo_tweets").html(data[0].text);
	// });
});
