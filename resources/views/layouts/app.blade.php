<html>
	<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" >
	<meta name="author" content="cthvlab" >
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5" >
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="default">
	<meta name="theme-color" content="#fff"/>
	<meta name="format-detection" content="telephone=no">
	<meta name="description" content="IP's can dreaming">
	<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>@yield('title')</title>

		<!-- Fckin Bootstrap -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
   	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
		<style>
		
		@import "{{ asset('css/theme.min.css') }}";
		
			small {color:#aaa;}
			
			button {
				border: none; 
				background-color:transparent;
			}
			
			img {max-width:100%;}
			
			.wrapper { min-height: calc(100% - 80px); padding: 40px 0; }
			
			header {
				position: fixed;
				display: block;
				color:#fff;				
				z-index: 99;
				width: 100%; height:40px;
				background: rgba(0,0,0,0.8);
    -webkit-backdrop-filter: saturate(180%) blur(20px);
    backdrop-filter: saturate(180%) blur(20px);
			}
			
			footer {height: 50px; }
			
			#generated_speed {position:fixed; bottom:5px; right:5px;}
			
			input[type="checkbox"] {
				-webkit-appearance: none !important;
				-moz-appearance: none!important;
				-ms-appearance: none !important;
				-o-appearance: none !important;
				appearance: none !important;
				border:none;
				background:transparent;
				outline: none;
				cursor:pointer;
				width:10px; 
				line-height:20px;
			}
			
			.dreamtime {width:100%; height:50vh;}
			.fulldreamtime {width:100%;height:calc(100% - 40px);}
			.fulldreamtime img, .dreamtime img {object-fit: cover; height: 100%; width: 100%;}
			
			.tagging {bottom:8px;}			
			
			input[type="checkbox"]:checked + label {background-color:#007bff;color:#fff;line-height:28px;padding:0 10px;border-radius:3px;cursor:pointer;}
			
			input[type=checkbox]:checked:after
				{
				  content:"#"; color:#fff; font-size:16px; 
				}
			input[type=checkbox]:hover:after
				{
				color:#FFF;
				}			
			.Vr8_txt {max-width: 210px;	}
			.Vr8_txt a {color:grey;}
			.display-5 {font-size: 2.5rem;
				font-weight: 300;
				line-height: 1.2;
			}
			 .display-4, .display-5 {   vertical-align: middle; }
			 
			 .dialog {max-width:500px;}
			.howto {max-width:80%;}

		</style>

	</head>

	<body>
		<header>
			<div class="container mt-2 mb-1">
				<strong>imagination</strong> 
			</div>
		</header>
		
	
		
		
		
		<div class="wrapper">
			@yield('content')
		</div>
		<footer>
			<div class="container mt-5 mb-5">
				<div class="row">
				
					<div class="col-md-3 mb-3">
						<strong>Laravel 8</strong> Speed:
						<?php 
						$end = microtime(TRUE);
						echo  round(($end - LARAVEL_START), 5);				
						?>
					</div>
					<div class="col-md-3 mb-3">	
						
						<p>
							<a title="Home page" class="d-lg-flex  no-underline" href="https://github.com">
		 
								<svg height="24" class="octicon octicon-mark-github d-block mr-2 float-left" viewBox="0 0 16 16" version="1.1" width="24" aria-hidden="true"><path fill="#777777" fill-rule="evenodd" d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0016 8c0-4.42-3.58-8-8-8z"></path></svg>
							 

						   
								<span class="text-gray">
								  Download source code 
								</span>

							  
							</a>
							
							
						</p>	
					</div>
					
					<div class="col-md-3 mb-3">
							<span class="d-block">Your IP: {{ ip() }}</span>
							<p><span>WhatsApp:</span> <a rel="noreferrer" href="https://wa.me/79531269599" target="_blank">Let's chat</a></p>
						</div>
				
					<div class="col-md-3 mb-3">				
													
						
							<div class="Vr8 float-left mr-2 pt-1">
								<svg  xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="58px" height="40px" version="1.1" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 58 40" xmlns:xlink="http://www.w3.org/1999/xlink"><path fill="#777777" fill-rule="nonzero" d="M15.93 24.16l-6.45 0 -9.35 -24.18 5.87 0 6.7 18.6 6.67 -18.6 5.88 0 -9.32 24.18zm-14.79 15.15l0 -2.28c0.31,-0.05 0.55,-0.24 0.72,-0.54 0.17,-0.31 0.31,-0.88 0.42,-1.71l0.38 -2.93 4.14 0 0 5.13 0.69 0 0 2.33 -0.93 0 0 -1.51 -4.49 0 0 1.51 -0.93 0zm2.33 -6.65l-0.27 2.23c-0.14,1.04 -0.43,1.74 -0.86,2.09l3.53 0 0 -4.32 -2.4 0zm9.93 5.14l-0.92 0 0 -0.68c-0.5,0.55 -1.16,0.83 -1.97,0.83 -0.55,0 -1.04,-0.18 -1.46,-0.53 -0.42,-0.36 -0.63,-0.84 -0.63,-1.45 0,-0.62 0.21,-1.1 0.63,-1.44 0.41,-0.34 0.9,-0.51 1.46,-0.51 0.84,0 1.5,0.27 1.97,0.81l0 -1.07c0,-0.4 -0.14,-0.71 -0.42,-0.93 -0.28,-0.22 -0.64,-0.33 -1.09,-0.33 -0.69,0 -1.3,0.28 -1.82,0.83l-0.43 -0.64c0.63,-0.66 1.43,-0.99 2.38,-0.99 0.68,0 1.23,0.16 1.66,0.49 0.43,0.33 0.64,0.84 0.64,1.52l0 4.09zm-2.56 -0.52c0.74,0 1.29,-0.25 1.64,-0.74l0 -1.12c-0.35,-0.49 -0.9,-0.74 -1.64,-0.74 -0.43,0 -0.78,0.12 -1.05,0.36 -0.28,0.25 -0.42,0.56 -0.42,0.95 0,0.37 0.14,0.68 0.42,0.93 0.27,0.24 0.62,0.36 1.05,0.36zm6.42 0.52l-0.93 0 0 -5.14 -1.72 0 0 -0.81 4.38 0 0 0.81 -1.73 0 0 5.14zm7.59 0l-0.93 0 0 -0.68c-0.5,0.55 -1.16,0.83 -1.97,0.83 -0.55,0 -1.03,-0.18 -1.45,-0.53 -0.42,-0.36 -0.63,-0.84 -0.63,-1.45 0,-0.62 0.21,-1.1 0.62,-1.44 0.42,-0.34 0.9,-0.51 1.46,-0.51 0.85,0 1.5,0.27 1.97,0.81l0 -1.07c0,-0.4 -0.14,-0.71 -0.42,-0.93 -0.28,-0.22 -0.64,-0.33 -1.08,-0.33 -0.7,0 -1.31,0.28 -1.82,0.83l-0.43 -0.64c0.63,-0.66 1.42,-0.99 2.37,-0.99 0.68,0 1.24,0.16 1.67,0.49 0.42,0.33 0.64,0.84 0.64,1.52l0 4.09zm-2.57 -0.52c0.74,0 1.29,-0.25 1.64,-0.74l0 -1.12c-0.35,-0.49 -0.9,-0.74 -1.64,-0.74 -0.42,0 -0.77,0.12 -1.05,0.36 -0.27,0.25 -0.41,0.56 -0.41,0.95 0,0.37 0.14,0.68 0.41,0.93 0.28,0.24 0.63,0.36 1.05,0.36zm9.13 2.03l0 -1.51 -4.72 0 0 -5.95 0.93 0 0 5.13 3.1 0 0 -5.13 0.93 0 0 5.13 0.69 0 0 2.33 -0.93 0zm4.88 -1.36c-0.89,0 -1.61,-0.29 -2.18,-0.87 -0.57,-0.58 -0.85,-1.34 -0.85,-2.26 0,-0.87 0.28,-1.61 0.84,-2.22 0.56,-0.6 1.26,-0.9 2.09,-0.9 0.88,0 1.58,0.3 2.09,0.9 0.52,0.61 0.77,1.37 0.77,2.29l0 0.23 -4.82 0c0.04,0.59 0.26,1.08 0.64,1.47 0.39,0.39 0.89,0.59 1.51,0.59 0.74,0 1.35,-0.25 1.83,-0.75l0.45 0.6c-0.61,0.61 -1.4,0.92 -2.37,0.92zm1.85 -3.5c-0.01,-0.51 -0.18,-0.97 -0.52,-1.38 -0.33,-0.4 -0.82,-0.61 -1.44,-0.61 -0.59,0 -1.06,0.21 -1.4,0.61 -0.34,0.4 -0.52,0.86 -0.55,1.38l3.91 0zm3.33 3.35l-0.93 0 0 -5.95 0.93 0 0 2.47 3.1 0 0 -2.47 0.92 0 0 5.95 -0.92 0 0 -2.66 -3.1 0 0 2.66zm7.88 0l-0.92 0 0 -5.14 -1.73 0 0 -0.81 4.39 0 0 0.81 -1.74 0 0 5.14zm5.88 0.15c-0.84,0 -1.51,-0.35 -2.01,-1.05l0 3.16 -0.92 0 0 -8.21 0.92 0 0 0.88c0.22,-0.31 0.51,-0.56 0.86,-0.75 0.35,-0.19 0.74,-0.28 1.15,-0.28 0.78,0 1.42,0.28 1.91,0.84 0.49,0.57 0.73,1.32 0.73,2.28 0,0.95 -0.24,1.71 -0.73,2.28 -0.49,0.56 -1.13,0.85 -1.91,0.85zm-0.24 -0.83c0.59,0 1.05,-0.22 1.39,-0.65 0.35,-0.43 0.52,-0.98 0.52,-1.65 0,-0.68 -0.17,-1.23 -0.52,-1.65 -0.34,-0.43 -0.8,-0.65 -1.39,-0.65 -0.35,0 -0.69,0.1 -1.03,0.28 -0.33,0.19 -0.58,0.41 -0.74,0.67l0 2.69c0.16,0.27 0.41,0.5 0.74,0.68 0.34,0.19 0.68,0.28 1.03,0.28zm-25.03 -12.96l-4.61 0 0 -17.51 4.61 0 0 2.39c0.65,-0.82 1.48,-1.5 2.5,-2.03 1.01,-0.53 2.04,-0.8 3.08,-0.8l0 4.5c-0.31,-0.07 -0.74,-0.11 -1.27,-0.11 -0.77,0 -1.59,0.19 -2.46,0.58 -0.87,0.39 -1.49,0.86 -1.85,1.41l0 11.57zm17.14 0.43c-2.73,0 -5.03,-0.58 -6.9,-1.74 -1.88,-1.16 -2.81,-2.81 -2.81,-4.96 0,-1.41 0.48,-2.66 1.45,-3.76 0.96,-1.1 2.21,-1.91 3.73,-2.44 -3.19,-1.11 -4.78,-3.01 -4.78,-5.69 0,-2.1 0.92,-3.69 2.77,-4.77 1.85,-1.08 4.03,-1.61 6.54,-1.61 1.6,0 3.07,0.2 4.43,0.61 1.35,0.41 2.5,1.12 3.46,2.12 0.95,1.01 1.43,2.22 1.43,3.65 0,2.66 -1.61,4.55 -4.82,5.69 1.52,0.53 2.77,1.34 3.75,2.44 0.98,1.1 1.47,2.35 1.47,3.76 0,2.12 -0.94,3.77 -2.83,4.94 -1.88,1.18 -4.18,1.76 -6.89,1.76zm0 -14.93c0.99,-0.15 1.92,-0.46 2.78,-0.94 0.85,-0.49 1.28,-1.13 1.28,-1.93 0,-0.84 -0.37,-1.51 -1.12,-2.01 -0.75,-0.49 -1.73,-0.74 -2.94,-0.74 -1.21,0 -2.19,0.25 -2.95,0.74 -0.76,0.5 -1.14,1.17 -1.14,2.01 0,0.8 0.43,1.44 1.3,1.93 0.87,0.48 1.8,0.79 2.79,0.94zm0 10.51c1.26,0 2.32,-0.27 3.19,-0.82 0.87,-0.54 1.31,-1.25 1.31,-2.12 0,-0.89 -0.49,-1.62 -1.47,-2.17 -0.98,-0.56 -1.99,-0.91 -3.03,-1.05 -1.04,0.14 -2.05,0.49 -3.02,1.05 -0.98,0.55 -1.47,1.28 -1.47,2.17 0,0.87 0.43,1.58 1.29,2.12 0.85,0.55 1.92,0.82 3.2,0.82z"></path></svg>								
							</div>
							<div class="Vr8_txt small align-middle pt-1">
								<a href="http://cthvlab.ru/vr8" target="_blank" rel="noreferrer">Full stack development <br>by cthvlab</a>
							</div>
					</div>
				</div>
			</div>
		</footer>
	
    
   	
	<script src="{{ asset('js/scramble-ES5.min.js') }}"></script>
	<script src="{{ asset('js/jquery.jscroll.min.js') }}"></script>
	
	<script>Scrambler('h2');</script>
	<script>
	$(function() {		
		setTimeout(function() {
			if($(".alert").length != 0) {
			$(".alert").hide() }
		}, 3000);
		
	});
	</script>

	</body>

</html>
