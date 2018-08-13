/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
jQuery("document").ready(function($){

	var navigate = $('nav');

	$(window).scroll(function () {
		if ($(this).scrollTop() > 30) {
		navigate.addClass("f-nav");
	} else {
		navigate.removeClass("f-nav");
		}
	});
});

