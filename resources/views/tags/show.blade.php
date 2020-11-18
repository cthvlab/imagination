@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 mt-3 mb-3">
			  <div class="float-left">
                <a class="btn btn-outline-primary" href="{{ route('tags.index') }}" title="Go back"> <i><</i> </a>
            </div>
		
            <div class="float-right">
                <h1 class="d-inline display-5">#{{ $tag->name }}</h1>
				<a class="d-inline btn-sm" href="{{ route('tags.edit',$tag->id) }}">
								<svg version="1.1" width="20px" height="20px" id="Capa_1" xmlns="http://www.w3.org/2000/svg"  x="0px" y="0px" viewBox="0 0 383.947 383.947" style="enable-background:new 0 0 383.947 383.947;" xml:space="preserve">
								<polygon points="0,303.947 0,383.947 80,383.947 316.053,147.893 236.053,67.893"/>
								<path d="M377.707,56.053L327.893,6.24c-8.32-8.32-21.867-8.32-30.187,0l-39.04,39.04l80,80l39.04-39.04 C386.027,77.92,386.027,64.373,377.707,56.053z"/>
								</svg>
							</a>
				
				
				
				
				
            </div>
          
        </div>
    </div>

  
	

	
	
	<div class="container-fluid mt-2 infinite-scroll">
	<div class="row">
        
       
			@foreach ($tag->dreams as $dream)
			
			  
				<div id="dream_{{ $dream->id }}" class="col-md-6 col-lg-3">
					<div class="row">
						
							
							
							
							<div class="dreamtime position-relative">		<div class="tagging block position-absolute">
									@foreach($dream->tags as $tag)
										<a class="btn btn-primary mt-2 ml-2"  href="{{ route('tags.show',$tag->id) }}">#{{ $tag->name }}</a>
									@endforeach
								</div>			
								<a  href="{{ route('dreams.show',$dream->id) }}" title="show">
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
				
			@endforeach
			
		{!! $dreams->links() !!}
    </div>
</div>
	
	
	
</div>	

@endsection
