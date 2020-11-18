@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-lg-12 mt-3 mb-3">
            <div class="float-left">
                <h2>Add New Dream</h2>
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
    <form action="{{ route('dreams.store') }}" method="POST" >
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description:</strong>
                    <textarea class="form-control" style="height:50px" name="description"
                        placeholder="description"></textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
             @foreach($tags as $tag)
				<label class="checkbox-inline">
					<input type="checkbox" id="tag_{{$tag->id}}" name="tag[]" value="{{$tag->id}}" >
				{{$tag->name}}
				</label>
				
			@endforeach
                </div>
            </div>
			
		
			<input type="hidden" name="ip" value="{{ ip() }}">
			
			
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <a class="btn btn-outline-primary" href="{{ route('dreams.index') }}" title="Go back">Cancel </a>
				<button type="submit" class="btn btn-primary">Submit</button>
				
            </div>
        </div>

    </form>
	
</div>	
@endsection
