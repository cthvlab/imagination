 $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

jQuery(document).ready(function($){

    //----- Open model CREATE -----//
    jQuery('#newtag').click(function () {
        jQuery('#btn-save').val("add");
        jQuery('#myForm').trigger("reset");
        jQuery('#formModal').modal('show');
    });

    /* CREATE */


 

	
	  $("#btn-save").click(function(event){
      event.preventDefault();

      var name = $("input[name=name]").val();  
     
	

		  $.ajax({			
			type:"POST",
			url:"{{ route('ajaxRequest.post') }}",
			data:{ name:name },
			 success:function(data){
              alert(data.success);
           }
		   });
  });
	
	
	
});