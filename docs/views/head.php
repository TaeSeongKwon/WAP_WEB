<!DOCTYPE html>
<html lang="ko">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>W.A.P | Why Are you Programming?</title>
		<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
		<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<link rel='stylesheet' href='/css/bootstrap.min.css' />
		<?php foreach($css as $i => $row) : ?>
			<link rel="stylesheet" href='/css/<?=$row?>.css' />
		<?php endforeach; ?>
		<!-- <script src='/js/jquery-2.1.4.min.js'></script>
		<script src='/js/bootstrap.min.js'></script>
		<script type="text/javascript" src="/js/jquery.faloading-0.2.min.js"></script>
		-->
		<?php foreach($js as $i => $row) : ?>
			<script src='/js/<?=$row?>.js'></script>
		<?php endforeach; ?>

		<style>
			header.navbar{
				border-bottom : 2px solid #eee;
			}
			#menu_bar{
				height : 75px;
			}
			#menu_bar img{
				height : 65px;
				margin: 5px;
			}
			.navbar{
				margin-bottom: 0px !important;
			}
			footer{
				margin-top: 30px;
				background-color: #353535;
				min-height:200px;
				color: #b1b1b1;
				padding: 20px 5px;
			}
			
			.main_title{
				line-height: 500px;
    			font-size: 3em;
    			color: white;
			}
			.mynavbar-brand{
				float : left;
			}
			.navbar-nav>li>a{
				line-height: 45px !important;
				font-size: 1.1em;
			}
			@media (min-width : 768px){
				#login_btnSec{
					position: absolute;
	    			top: 2px;
	    			right: 10px;
				}
			}
			@media (max-width : 767px){
				#login_btnSec{
	    		/*	position: absolute;
    				top: 30px;
    				right: 78px;
    				*/
    				display: block;
    				margin: 15px auto;
				}	
				.navbar-collapse.in>ul>li>a{
					border-bottom: solid 1px silver;
				}
			}
			.navbar-collapse{
				background-color: white;
			}
			
			.navbar-toggle{
				border: 1px solid #797979;
				padding : 12px 10px;
				margin-top: 17px;
				
			}
			.navbar-toggle .icon-bar {
			    width: 30px;
			    height: 2px;
			    background-color: #797979 !important;
			}
			
			.nav.navbar-nav a{
				text-decoration: none;	
				color : #585858;
			}
		</style>
	</head>
	
	<body>
		<header class="navbar">
			<div class="container-fluid" id="menu_bar">
				<div class="navbar-header">
					<a href="/" class="mynavbar-brand">
						<img src="/img/main_logo.png">
					</a>
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu_section">
				        <span class="sr-only">Toggle navigation</span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
			      	</button>
				</div>
				<div class="collapse navbar-collapse navbar-right" id="menu_section">
					<ul class="nav navbar-nav">
						<li ><a href='/board/lists/1'>공지사항</a></li>
						<!-- <li ><a href="/project/all">프로젝트</a></li> -->
						<li ><a href="/board/lists/2">정보게시판</a></li>
						<li ><a href="/board/lists/3">Q&A</a></li>
						<li ><a href="/gallery">갤러리</a></li>
						<li ><a href="/library">도서대여</a></li>
						<?php if($info['levelIdx'] == '1') : ?>
							<li><a href='/manage/member'>회원관리</a></li>
							<li><a href='/library/manage'>도서관리</a></li>
						<?php elseif($info['levelIdx'] == '5') : ?>
							<li><a href='/library/manage'>도서관리</a></li>
						<?php endif; ?>
						<!-- <li ><a class="glyphicon glyphicon-search" href=""></a></li> -->
						<?php if($info['name'] == '') :?>
							<span id="login_btnSec"><a href="/member/loginView">로그인</a> | <a href="/member/numberCheck">회원가입</a></span>
						<?php else :?>
							<span id="login_btnSec"><a href="/profile"><?=$info['name']?></a>
							| <a href='/member/logout'>로그아웃</a>
							</span>
						<?php endif; ?>
					</ul>
				</div>
			</div>
			
		</header>
