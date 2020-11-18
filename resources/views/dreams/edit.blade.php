@extends('layouts.app')

@section('content')

<div class="container dialog mb-5">
    <div class="row">
        <div class="col-lg-12 mt-3 mb-3">
            <div class="float-left">
                <h2>Edit Dream</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-outline-primary" href="{{ route('dreams.show',$dream->id) }}" title="Go back"> <i><</i> </a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Error!</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('dreams.update',$dream->id) }}" enctype="multipart/form-data"  method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong class="d-block mb-2">Name:</strong>
                    <input type="text" name="name" value="{{ $dream->name }}" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong class="d-block mb-2">Description:</strong>
                    <textarea class="form-control"  name="description"
                        placeholder="description">{{ $dream->description }}</textarea>
                </div>
            </div>
           
		   <div class="form-group tags col-xs-12 col-sm-12 col-md-12 ">
		   <strong class="d-block mb-2">Select tags:</strong>
		   	
			
			@foreach($tags as $tag)
				<label class="mr-1 btn btn-outline-primary">
					<input type="checkbox" id="tag_{{$tag->id}}" name="tag[]" value="{{$tag->id}}" {{ $dream->tags->contains($tag->id) ? 'checked' : '' }} >
				{{$tag->name}}
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
		
		
		<div class="col-md-12 mb-3">
			<strong class="d-block mb-2">Change image:</strong>
			
				<input class="custom-file-input d-none"  type="file" id="imgInp" name="image" />
				<label for="imgInp" id="imagepreview">
				<img id="img" class="d-block" src="{{ asset('images/'.$dream->image) }}" alt="{{ $dream->name }}">
				</label>
				
			
		</div>
						
		
			
			
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            	<input type="hidden" name="ip" value="{{ ip() }}">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
	<form action="{{ route('dreams.destroy',$dream->id) }}" method="POST">						
									
		@csrf
		@method('DELETE')

		<button class="btn-sm float-right" type="submit" title="delete" >
			<svg version="1.1" width="20px" height="20px" id="Capa_1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 384 384" style="enable-background:new 0 0 384 384;" xml:space="preserve">
			<path d="M64,341.333C64,364.907,83.093,384,106.667,384h170.667C300.907,384,320,364.907,320,341.333v-256H64V341.333z"/>
			<polygon points="266.667,21.333 245.333,0 138.667,0 117.333,21.333 42.667,21.333 42.667,64 341.333,64 341.333,21.333 			"/>
			</svg> <span>move to trash</span>
		</button>
	</form>
</div>	






<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

$(document).ready(function($){

   
    
    
    
    	

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
	
	
	
	
	
});
 
</script>

@endsection
