@extends('layouts.app')


@section('content')
<div class="container">
	<div class="position-absolute mt-3 ml-3">
		<a class="btn btn-primary " href="{{ route('dreams.index') }}" title="Go back"> < </a>
	</div>	
</div>



<div class="container">
    <div class="row">	
		<div class="col-md-12">
			<div class="row">
				<div class="tagging block position-absolute">
					@foreach($dream->tags as $tag)
						<a class="btn btn-primary mt-2 ml-2" href="{{ route('tags.show',$tag->id) }}">#{{ $tag->name }}</a>	
					@endforeach
				</div>
				
				<img class="d-block" src="{{ asset('images/'.$dream->image) }}" alt="{{ $dream->name }}">
			
			</div> 
		</div> 
	
        <div class="col-md-12 mt-3">
		
		
			<div class="row">
				<div class="col-lg-12">
					<h1 class="d-inline">{{ $dream->name }}</h1>
					
					@if($dream->ip == ip())

						<a class="d-inline btn-sm" href="{{ route('dreams.edit',$dream->id) }}">
									<svg version="1.1" width="20px" height="20px"  id="Capa_1" xmlns="http://www.w3.org/2000/svg"  x="0px" y="0px" viewBox="0 0 383.947 383.947" style="enable-background:new 0 0 383.947 383.947;" xml:space="preserve">
									<polygon points="0,303.947 0,383.947 80,383.947 316.053,147.893 236.053,67.893"/>
									<path d="M377.707,56.053L327.893,6.24c-8.32-8.32-21.867-8.32-30.187,0l-39.04,39.04l80,80l39.04-39.04 C386.027,77.92,386.027,64.373,377.707,56.053z"/>
									</svg>
								</a>
					
					@endif	
				</div>
				
				
					<div class="col-lg-12 mb-3 text-grey">						
						<small>{{ $dream->updated_at->format('d m Y H:i') }}</small> IP: {{ $dream->ip }}		

					</div>
			
				
				
				
					<div class="col-lg-12 mb-3">		
						
						<p>{{ $dream->description }}</p>			

					</div>
				
				
					
					
					
					<div class="col-lg-12 d-flex justify-content-between bd-highlight mb-3">
						<div class="mb-3">	
						@if($prew)
							
							<a class="btn btn-outline-primary text-left" href="{{ route( 'dreams.show', $prew->id ) }}"><</a>
							
						@endif
						</div>
						
						<div class="mb-3">	
							<a class="btn btn-outline-primary text-center" href="{{ route('dreams.index') }}" title="Go back"> x </a>
						</div>
						
						<div class="mb-3">	
						@if($next)
							
							<a class="btn btn-outline-primary text-right" href="{{ route( 'dreams.show', $next->id ) }}">></a>
							
						@endif
						</div>
			</div>
		
            
            
        </div>
    </div>

	
	
	
	
	
	
	
</div>	

@endsection
