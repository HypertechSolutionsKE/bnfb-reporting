	CKEDITOR.on('instanceReady', function(){
	  $.each( CKEDITOR.instances, function(instance) {

	    CKEDITOR.instances[instance].on("instanceReady", function() {
	      this.document.on("keyup", CK_jQ);
	      this.document.on("paste", CK_jQ);
	      this.document.on("keypress", CK_jQ);
	      this.document.on("blur", CK_jQ);
	      this.document.on("change", CK_jQ);
	    });
	  });

	});

	function CK_jQ() {
	  for ( var instance in CKEDITOR.instances ) { CKEDITOR.instances[instance].updateElement(); }
	}