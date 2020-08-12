

(function( $ ) {

	'use strict';

	var datatableInit = function() {

		$('#datatable-default').dataTable();

	};

	$(function() {
		datatableInit();
	});


}).apply( this, [ jQuery ]);


(function( $ ) {

	'use strict';

	var datatableInit = function() {

		$('#datatable-defaults').dataTable({
			"order": [[ 2, "desc" ]]
		});
		
	
	};

	$(function() {
		datatableInit();
	});


}).apply( this, [ jQuery ]);



