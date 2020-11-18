@extends('layouts.app')

@section('content')

<div class="container mt-3">
    <div class="row">
		<div class="col-md-6  mb-2 ">                
			<span class="btn btn-primary  mb-2 btn-lg" id="newtag">+ Send your dream to matrix now!</span>				
		</div>  
        <div class="col-md-6  mb-2"> 
			<div class="float-right">
            <span class="d-inline">by</span><h1 class="d-inline display-5"> ip's</h2>
			</div>
        </div>  
		     
	</div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
</div>
<div class="container-fluid mt-2 infinite-scroll">
	<div class="row">
        
       
			@foreach ($dreams as $dream)
			  
				<div id="dream_{{ $dream->id }}" class="col-md-6 col-lg-3">
					<div class="row">
						<div class="col-lg-12 mb-3 position-relative">
							
							
							
							<div class="dreamtime position-relative">		<div class="tagging block position-absolute">
									@foreach($dream->tags as $tag)
										<a class="btn btn-primary mt-2 ml-2"  href="{{ route('tags.show',$tag->id) }}">#{{ $tag->name }}</a>
									@endforeach
								</div>			
								<a   href="{{ route('dreams.show',$dream->id) }}" title="show">
									<img class="d-block" src="{{ asset('images/'.$dream->image) }}" alt="{{ $dream->name }}">
									
								</a>
							</div>
							<div class="p-2">
								<!--<small>{{ $dream->updated_at->format('d m Y H:i') }}</small>-->
								
								<a  href="{{ route('dreams.show',$dream->id) }}" title="show"><h2>{{ $dream->name }}</h2></a>
								
								<p>{{ $dream->description }}</p>
							</div>
							
						</div>
					</div>
					
					
					
					
					
				</div> 
				
			@endforeach
		{!! $dreams->links() !!}
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12 mb-2"> 
			
			 
		</div>
	</div>
</div>



<!-- Modal -->
<div class="modal fade" id="formModal" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
		 
			<div class="modal-body">
				<form id="dreamform" name="dreamform"  enctype="multipart/form-data"  novalidate="">

					<div class="row mb-2" >	

						<div class="col-md-12 mb-3">
							<a class="text-secondary float-left howto" style="text-decoration:underline" href="matrix:// how to correctly formulate a dream?" target="blank">Learn: how to correctly formulate a dream?</a>
							<a class="btn btn-outline-primary float-right" href="#" id="close" title="close"> x </a>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<strong class="d-block mb-2">Name your dream:</strong>
								<input type="text" name="name" class="form-control" placeholder="Name">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<strong  class="d-block mb-2">Describe the details:</strong>
								<textarea class="form-control"  name="description"
									placeholder="description"></textarea>
							</div>
						</div>
					
						<div class="col-md-12">
						<strong class="d-block mb-2">Select tags:</strong>
							<div class="form-group tags">
							
								
									@foreach($tags as $tag)
										<label class="mr-1 btn  btn-outline-primary">
											<input type="checkbox" id="tag_{{$tag->id}}" name="tag[]" value="{{$tag->id}}">{{$tag->name}}
										</label>				
									@endforeach	
								
							
								<div class="mb-2 btn btn-outline-primary" id="plus_tag">+</div>
								<div class="input-group d-none mb-2" id="new_tag">
									<div class="input-group-prepend">
										<span class="input-group-text text-primary">#</span>
									</div>
									<input class="form-control" type="text" id="add_tag" name="add_tag" value="" >
									<div class="input-group-append">
										<span class="btn btn-primary" id="add">Add</span>
									</div>
								</div>
							</div>		
							
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-md-12">
							<strong class="d-block mb-2">Associate image with your dream:</strong>
							<div class="form-group custom-file">
								<input class="custom-file-input"  type="file" id="imgInp" name="image" />
								<label class="custom-file-label" for="imgInp">Choose file</label>
								<div id="imagepreview"></div>
							</div>
						</div>
						<input type="hidden" name="ip" value="{{ ip() }}">
					</div>

					<button type="button" class="btn btn-primary btn-block" id="btn-save" value="add">Ok matrix, do your job!
					</button>
				
				</form>
		   
				
			
			</div>
		</div>
	</div>
</div>


<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

$(document).ready(function($){

    //----- Open model CREATE -----//
    $('#newtag').click(function () {
        $('#btn-save').val("add");
        $('#dreamform').trigger("reset");
        $('#formModal').modal('show');
    });
    
    $('#close').click(function(){	
		 $('#dreamform').trigger("reset");
        	$('#formModal').modal('hide');
	});		
		
	
	

/* Create tag */
	
	$('#plus_tag').click(function(){	
		$('#new_tag').removeClass("d-none");		
		$('#plus_tag').addClass("d-none");
		$("#add_tag").focus(); 
	});		
		
	
	$('#add').click(function(event){
	event.preventDefault();

		$('#new_tag').addClass("d-none");
		$('#plus_tag').removeClass("d-none");
	
		var name = $("input[name=add_tag]").val();
		var ip = $("input[name=ip]").val();
		
		$.ajax({			
			type:"POST",
			url:"{{ route('ajax.tagstore') }}",
			data:{ name:name, ip:ip },
			dataType: 'json',
			success:function(data){					
					
					var $label = $("<label class='mr-1 btn  btn-outline-primary'>").text(name);			
					
					if($("#tag_" + data.tag_id).length == 0) {
						var $input = "<input type='checkbox' id='tag_"+data.tag_id+"' name='tag[]' value='"+data.tag_id+"' checked>";					
						$label.prepend($input);
						$('.tags').prepend($label);					
						$('#add_tag').val('');
					} else {
						$("#tag_" + data.tag_id).prop('checked', true);
					}
					
					console.log(data);
				
			},
                error: function(data) {
                    
                   console.log(data);

                }
		});		
		
  });
  
/*Delete tag*/

$('[type="checkbox"]').dblclick(function(event) {
	event.preventDefault();
	console.log("double clicked eahh!");
});	
  
  
/*Preview image*/
  
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
		
		var $image = "<img class='mt-2' id='img' src=''>"
		if($('#img').length == 0) {
			$('#imagepreview').prepend($image);
		}
		$('#img').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}

$("#imgInp").change(function() {
	readURL(this);
});
  
  
  
/*Save form*/

	$("#btn-save").click(function(event){
	
	event.preventDefault();

		var name = $("input[name=name]").val();
        var description = $("textarea[name=description]").val();
        var ip = $("input[name=ip]").val();
		
		var tag = [];
		
		
	
		var image = $('#imgInp')[0].files;
				
		
		
		$(":checked").each(function() {			 
			tag.push($(this).val()); 
		});
		tag= JSON.stringify(tag);
	
	
   
        $.ajax({
           type:'POST',
           url:"{{ route('ajax.store') }}",
		    data: new FormData($('#dreamform')[0]),
			processData: false,
			contentType: false,
		   
		   
       
           success:function(data){
              console.log(data);
			  $('#formModal').modal('hide');
			 /* location.reload();*/
           },
		   error: function(data) {
                    console.log(data);
                    alert('Pizdets');

                }
		   
        });	
	
	});
	
});


 
</script>

<!-- Infinite scroll -->
<script type="text/javascript">
    $('ul.pagination').hide();
    $(function() {
        $('.infinite-scroll').jscroll({			
            autoTrigger: true,
            loadingHtml: '<img class="center-block" src="{{ asset('images/Loading.gif') }}" alt="Loading..." />',
            padding: 0,
            nextSelector: '.pagination li.active + li a',
            contentSelector: 'div.infinite-scroll',
            callback: function() {
                $('ul.pagination').remove();
            }
			
        });
		
    });
</script>

   

@endsection
