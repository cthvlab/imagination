@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        
		
		<div class="col-md-12 mt-3 mb-3">
		 <div class="float-left">
                <a class="btn btn-outline-primary" href="{{ route('dreams.index') }}" title="Go back"><</a>
            </div>
			<h1 class="display-5 float-right">Dreams Has#Tags</h2>
        </div>   
       
        
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
</div>
<div class="container-fluid mb-5">
	<div class="row">   

       
			@foreach ($tags as $tag)
			  
				<div id="tag_{{ ++$i }}" class="col-lg-3">
					<div class="row">
						<div class="col-lg-12 mb-3">							
							
							<a href="{{ route('tags.show',$tag->id) }}" title="show"><h2 class="d-inline">#{{ $tag->name }}</h2></a>
							{{ $tag->dreams_count}}
							
							
						</div>
					</div>
				</div> 
				
			@endforeach
		
    </div>
</div>
    {!! $tags->links() !!}
	
<div class="container">	
	<div class="row">   
		<div class="col-md-6 mt-3 mb-3">
            <a class="btn btn-secondary" href="{{ route('tags.create') }}" title="Create new tag"> + Add new Tag
            </a>
        </div>
	</div>
</div>	
	
@endsection