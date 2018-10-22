/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
jQuery("document").ready(function($){

	$(document).ready( function () {
		$('#tprot').DataTable({
			"language": {
				"url": "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Greek.json"

			},
			"order": [[0, "desc"]],
			"pageLength": 10,
			"processing": true,
			
		});
	} );

	// $(window).scroll(function () {
	// 	if ($(this).scrollTop()>50) {
	// 		$('thead').addClass("f-nav");
	// } else {
	// 	$('thead').removeClass("f-nav");
	// 	}
	// });

	$(".delete").on("submit", function(){
        return confirm("Πρόκειται να διαγράψετε μία εγγραφή, ΟΚ;");
    });
});

