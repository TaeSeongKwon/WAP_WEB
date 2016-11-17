<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<title>W.A.P | Why Are you Programming?</title>
		<link rel='stylesheet' href='/css/bootstrap.css' />
		<script type='text/javascript' src='/js/jquery-2.1.4.min.js'></script>
		<script type='text/javascript' src='/js/bootstrap.min.js'></script>
		<style type='text/css'>
			html, body{
				height:100%;
				width : 100%;
			}
			footer{
				margin-top: 10%;
				height: 200px;
				background-color: skyblue;
			}
			body{
				padding-top:50px;
			}
			.mainBody{
				border : 1px solid silver;
				min-height:100%;
			}
			.boardFrame{
				width : 100%;
				border : 1px solid silver;
			}
			.boardHead{
				background-color: burlywood;
				color: white;
				font-weight: bold;
				font-size: medium;
				height:30px;
			}
			.boardItem{
				height:25px;
			}
		</style>
	</head>
	<body>
		<header class='navbar navbar-default navbar-fixed-top'>
			<section class='container'>
				<section class='navbar-header'>
					<button type='button' class='navbar-toggle collapsed' data-target='#contants' data-toggle='collapse'>
						<span class='sr-only'></span>
						<span class='icon-bar'></span>
						<span class='icon-bar'></span>
						<span class='icon-bar'></span>
					</button>
					<a class='navbar-brand' href='/'>W.A.P</a>
				</section>
				<section class='collapse navbar-collapse' id='contants'>
					<form class='navbar-form navbar-right '>
						<div class='form-group'>
							<input type='text' class='form-control' placeholder='ID' />
							<input type='password' class='form-control' placeholder='PASSWORD' />
						</div>
						<a class='btn btn-primary'>Login</a> 
					</form>
					
					<form class='navbar-form hidden-md'>
						<div class='form-group'>
							<input type='text' class='form-control' id='keyword' placeholder='Input KeyWord for Search' />
						</div>
						<a class='btn btn-primary'>Search</a>
					</form>	
				</section>
			</section>
		</header>
		
		<section class='container mainBody'>
			
		</section>
		<footer ></footer>
		
		
	</body>
</html>	 