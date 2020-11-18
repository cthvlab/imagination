@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12 mt-3 mb-3">
            <div class="float-left">
                <h2>Edit </h2>
            </div>
            <div class="float-right">
                <a class="btn btn-outline-primary" href="{{ route('tags.index') }}" title="Go back"> <i><</i> </a>
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

    <form action="{{ route('tags.update',$tag->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">#</span>
					</div>
				
					<input type="text" class="form-control" name="name" value="{{ $tag->name }}"  placeholder="Tag name" aria-label="Tag name" >
					
					<div class="input-group-append">						
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</div>			
            </div>
        </div>

    </form>
	
	<form action="{{ route('tags.destroy',$tag->id) }}" method="POST">						
									
		@csrf
		@method('DELETE')

		<button class="btn-sm float-right" type="submit" title="delete" >
			<svg version="1.1" width="20px" height="20px" id="Capa_1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 384 384" style="enable-background:new 0 0 384 384;" xml:space="preserve">
			<path d="M64,341.333C64,364.907,83.093,384,106.667,384h170.667C300.907,384,320,364.907,320,341.333v-256H64V341.333z"/>
			<polygon points="266.667,21.333 245.333,0 138.667,0 117.333,21.333 42.667,21.333 42.667,64 341.333,64 341.333,21.333 			"/>
			</svg> <span>remove</span>
		</button>
	</form>
	
</div>	

@endsection