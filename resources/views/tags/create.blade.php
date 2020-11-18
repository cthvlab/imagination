@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-lg-12 mt-3 mb-3">
            <div class="float-left">
                <a class="btn btn-outline-primary" href="{{ route('tags.index') }}" title="Go back"><</a>
            </div>
		
                <h2 class="float-right display-5">Add New Tag</h2>
        
           
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
    <form action="{{ route('tags.store') }}" method="POST" >
        @csrf

       <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">#</span>
					</div>
				
					<input type="text" class="form-control" name="name" value=""  placeholder="Tag name" aria-label="Tag name">
					
					<input type="hidden" name="ip" value="{{ ip() }}">
					
					<div class="input-group-append">						
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</div>			
            </div>
        </div>

    </form>
	
</div>	
@endsection
