<!doctype html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>W.A.P | Why Are you Programming?</title>
		<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<link rel='stylesheet' href='/css/bootstrap.css' />
		<link type="text/css" rel="stylesheet" href="/css/jquery.faloading.min.css"/>
		
		<?php foreach($css as $i => $row) : ?>
			<link rel="stylesheet" href='/css/<?=$row?>.css' />
		<?php endforeach; ?>
		<script src='/js/jquery-2.1.4.min.js'></script>
		<script src='/js/bootstrap.min.js'></script>
		<script type="text/javascript" src="/js/jquery.faloading-0.2.min.js"></script>
		<?php foreach($js as $i => $row) : ?>
			<script src='/js/<?=$row?>.js'></script>
		<?php endforeach; ?>

		<style type='text/css'>
			body { 
				position: relative;
			}
			.fa-loading-icon-wrapper{
				height: 0px !important;
			}
			 body{
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
				background-color: #eeeeee;
			}
			@media (min-width : 755px){
				#keyword{
					width:30%;
				}
			}
			.aboutTitle img{
				max-height:300px;
				width:100%;
			}
			.mainMenu{
				padding : 8px 8px;
			}
			/*body div{
				height:100%;
			}*/
			
			.aboutTitle{
				margin : 0px !important;
				/*height : 40%;*/
			/*	margin-bottom: 3%;*/
			}
			.dropdown-toggle{
				padding: 10px 15px !important;
			}

			.mainBody{
				border-left  : 1px solid silver;
				border-right  : 1px solid silver;
				padding-bottom:10%;
				min-height:100%;
				height:auto;
				box-shadow: 1px 1px 5px silver;
				background-color: #ffffff;
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
						<a href='/member/numberCheck'>회원가입</a>
						 <!-- <a href='/member/forget'>Forgot ID</a> -->
						<div class='form-group'>
							<input type='text' class='form-control' name ='userId' placeholder='아이디' />
							<input type='password' class='form-control' name='userPwd' placeholder='비밀번호' />
							<button type='submit' class='btn btn-primary'>로그인</button> 
						</div>
						
					</form>
				<?php else :?>
					
					<ul class='nav navbar-nav navbar-right'>
						<li class='dropdown'>
							<a  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
							<img class='img-circle' src='/img/1.jpg' width='30px' height='30px'> <?=$info['name']?><span class='caret'></a>
							<ul class='dropdown-menu' role='menu'>
								<li><a href='/profile'>내 정보</a></li>
								<li><a href='/project'>나의 프로젝트</a></li>
								<li><a href='/member/logout'>로그아웃</a></li>
							<?php if($info['levelIdx'] == '1') : ?>
								<li role='presentation' class='divider'></li>
								<li><a href='/manage/member'>회원관리</a></li>
							<!-- 	<li><a href='/manage/board'>Board Manage</a></li> -->
							<?php endif; ?>
							</ul>
						</li>
						<li class='dropdown'>
							<a  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
							<span class='glyphicon glyphicon-menu-hamburger mainMenu' aria-hidden='true'></span></a>
							<ul class='dropdown-menu' role='menu'>
								<li ><a href='/board/lists/1'>공지사항</a></li>
								<li ><a href="/project/all">프로젝트</a></li>
								<li ><a href="/board/lists/2">정보게시판</a></li>
								<li ><a href="/board/lists/3">Q&A</a></li>
								<li ><a href="/gallery">갤러리</a></li>
								<li ><a href="#">Library</a></li>
							</ul>
						</li>
						
					</ul>
				<?php endif;?>
					<ul class='nav navbar-nav '>
					<?php if($info == '') : ?>
						<li><a class='' href="/intro">About</a></li>
						<!-- <li><a href="/intro/staff">Staff</a></li> -->
					<?php else : ?>
						<li class='visible-xs'><a class='' href="/intro">About</a></li>
						<!-- <li class='visible-xs'><a href="/intro/staff">Staff</a></li> -->
					<?php endif;?>
						
						
					</ul>
				<?php if($info != '') :?>
					<form class='navbar-form' action='/search' >
						
							<input type='text' class='form-control' id='keyword' name = 'keyword' placeholder='검색할 단어를 입력하세요' />
						
						<button type='submit' class='btn btn-primary'>검색</button>
					</form>	
				<?php endif; ?>
				</section>
			</section>
		</header>