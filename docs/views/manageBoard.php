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
				/*margin-top: 10%;*/
				height: 200px;
				background-color: skyblue;
			}
			body{
				padding-top:50px;
			}
			@media (min-width : 755px){
				#keyword{
					width:30%;
				}
			}
			.mainBody{
				border-left : 1px solid silver;
				border-right : 1px solid silver;
				min-height:100%;
				padding-bottom: 10%;
			}
			.manageSec{
				margin : 0px auto;
				width: 50%;
			}
			@media (min-width : 992px){
				.editSec input, select{
					width:60% !important;
				}
			}
			.dropdown-toggle{
				padding: 10px 15px !important;
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
				<?php if($info['name'] == '') :?>
					<form class='navbar-form navbar-right' action='/member/login' method='post' name='userLoginForm'>
						<a href='/member/numberCheck'>Sign up</a>
						 <!-- <a href='/member/forget'>Forgot ID</a> -->
						<div class='form-group'>
							<input type='text' class='form-control' name ='userId' placeholder='ID' />
							<input type='password' class='form-control' name='userPwd' placeholder='PASSWORD' />
							<button type='submit' class='btn btn-primary'>Login</button> 
						</div>
						
					</form>
				<?php else :?>
					
					<ul class='nav navbar-nav navbar-right'>
						<li class='dropdown'>
							<a  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
							<img class='img-circle' src='/img/1.jpg' width='30px' height='30px'> <?=$info['name']?><span class='caret'></a>
							<ul class='dropdown-menu' role='menu'>
								<li><a href='/profile'>Profile</a></li>
								<li><a href='/project'>MyProject</a></li>
								<li><a href='/member/logout'>Logout</a></li>
							<?php if($info['levelIdx'] == '1') : ?>
								<li role='presentation' class='divider'></li>
								<li><a href='/manage/member'>Member Manage</a></li>
							<!-- 	<li><a href='/manage/board'>Board Manage</a></li> -->
							<?php endif; ?>
							</ul>
						</li>
						<li class='dropdown'>
							<a  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
							<span class='glyphicon glyphicon-menu-hamburger mainMenu' aria-hidden='true'></span></a>
							<ul class='dropdown-menu' role='menu'>
								<li class='active visible-xs'><a href='#'>Common</a></li>
								<li ><a href="#">Information</a></li>
								<li ><a href="#">Q&A</a></li>
								<li ><a href="#">Gallery</a></li>
								<li ><a href="#">Library</a></li>
							</ul>
						</li>
						
					</ul>
				<?php endif;?>
					<ul class='nav navbar-nav '>
					<?php if($info == '') : ?>
						<li><a class='' href="#">About</a></li>
						<li><a href="#">Staff</a></li>
					<?php else : ?>
						<li class='visible-xs'><a class='' href="#">About</a></li>
						<li class='visible-xs'><a href="#">Staff</a></li>
					<?php endif;?>
						
						
					</ul>
				<?php if($info != '') :?>
					<form class='navbar-form' action='/search' >
						
							<input type='text' class='form-control' id='keyword' name = 'keyword' placeholder='Input KeyWord for Search' />
						
						<button type='submit' class='btn btn-primary'>Search</button>
					</form>	
				<?php endif; ?>
				</section>
			</section>
		</header>
		
		<section class='container mainBody'>
			<article class='row '>
				<div class='col-xs-12'>
					<h3>Manage Board</h3>
				</div>
			</article>
			<hr>
		
			<article class='row'>
				<div class='col-sm-12'>
					<div class='manageSec'>
						
					</div>
				</div>
			</article>
		
		</section>
		<footer ></footer>
		
		
	</body>
</html>	 