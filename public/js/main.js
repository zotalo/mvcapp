/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
jQuery("document").ready(function($){

	$(document).ready( function () {
		$('#tprot').DataTable();
	} );

	$(window).scroll(function () {
		if ($(this).scrollTop()) {
			$('nav').addClass("f-nav");
	} else {
		$('nav').removeClass("f-nav");
		}
	});
});

