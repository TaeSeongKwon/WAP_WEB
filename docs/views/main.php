<!doctype html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>W.A.P | Why Are you Programming?</title>
		<link rel='stylesheet' href='/css/bootstrap.css' />
		<script src='/js/jquery-2.1.4.min.js'></script>
		<script src='/js/bootstrap.min.js'></script>
		<style type='text/css'>
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

			.test{
				border-left : solid 1px silver;
				border-right : solid 1px silver;
			}
			.aboutTitle .col-xs-12, .simpleBoard .col-md-6{
				padding: 0px !important;
			}
			.mainBody{
				min-height:50%;
				padding:0px !important;
				box-shadow: 1px 1px 5px silver;
				background: #ffffff;
				/*border-left : solid 1px silver;
				border-right : solid 1px silver;*/
			}
			.simpleBoard{
				min-height:50%;
			}
			.simpleBoard .test{
				height:100%;
			}
			
			.item{
				padding :10px 10px;
				/*font-weight: bold;*/
				font-size: medium;
			}
			.simpleBoardTitle{
				padding: 5px 10px;
				color :white;
				font-size: medium;
				font-weight: bold;
			}
			.common{
				background-color: #CC6600;
			}
			.board_1{
				background-color: #CC6600;	
			}
			.board_2{
				background-color: #6699CC;
			}
			.board_3{
				background-color: #99CCFF;
			}
			.board_4{
				background-color: #CAE5FF;
			}
			.gallery{
				background-color:#9BE1FB;
			}
			.moreBoard{
				float:right;
				color:white;
				text-decoration: none;
				font-size: medium;
			}
			.moreBoard:hover{
				color:skyblue;
				text-decoration: none;
			}
			.item a{
				text-decoration: none;
				color:#444444;
			}
			.item:hover{
				background-color: rgba(192,192,192,0.12);
			}
			.simpleBoard .row{
				margin :0px !important;
			}
			
			
			.boardElement{
				height:292px !important;
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
		
		<section class='container mainBody'>
			<article class='row aboutTitle test'>
				<div class='col-xs-12'>
					<a href='/intro'><img src='/img/title.png'></a>
				</div>

			</article>
			<article class='simpleBoard'>
				<div class='row'>
					<?php $cnt = 1;
						foreach($boardData as $i => $row) : ?>
						<div class='col-md-6 test boardElement'>
							<div class='row board_<?=$cnt?>'>
								<div class='col-xs 12 simpleBoardTitle '><?=$row['name']?><a href='/board/lists/<?=$row["idx"]?>' class='moreBoard'>+</a></div>
							</div>
							<div class='row board'>
								<?php $tmp = $row['dataList'];
									foreach($tmp as $j => $rowJ) : ?>
								<div class='col-xs-12 item'><a href='/board/view/<?=$rowJ['boardType']?>/<?=$rowJ['idx']?>'><?=$rowJ['title']?> [<?=$rowJ['numOfCmt']?>]</a></div>
								<?php endforeach; ?>
								<!-- <div class='col-xs-12 item'>Welcome</div>
								<div class='col-xs-12 item'>To</div>
								<div class='col-xs-12 item'>PKNU</div>
								<div class='col-xs-12 item'>W.A.P</div>
								<div class='col-xs-12 item'>!!!!!</div>
								<div class='col-xs-12 item'>Welcome</div> -->
							</div>
						</div>
					<?php 
						$cnt++;
					endforeach;?>
					<div class='col-md-6 test boardElement'>
						<div class='row gallery'>
							<div class='col-xs-12 simpleBoardTitle'>Gallery<a href='/gallery' class='moreBoard'>+</a></div>
						</div>
						<div class='row board'>
							<?php foreach($galleryData as $i =>$row) : ?>
								<div class='col-xs-12 item'><a href='/gallery/view/<?=$row["idx"]?>'><?=$row['name']?> [<?=$row['cnt']?>]</a></div>
							<?php endforeach;?>
							
						</div>
					</div>
					<!-- <div class='col-md-6 test'>
						<div class='row information'>
							<div class='col-xs-12 simpleBoardTitle'>정보게시판<a href='/board' class='moreBoard'>+</a></div>
						</div>
						<div class='row board'>
							<div class='col-xs-12 item'>Welcome</div>
							<div class='col-xs-12 item'>To</div>
							<div class='col-xs-12 item'>PKNU</div>
							<div class='col-xs-12 item'>W.A.P</div>
							<div class='col-xs-12 item'>!!!!!</div>
							<div class='col-xs-12 item'>Welcome</div>
						</div>
					</div> -->
				</div>
			</article>
			<!-- <article class='simpleBoard'>
				<div class='row'>
					<div class='col-md-6 test'>
						<div class='row qna'>
							<div class='col-xs-12 simpleBoardTitle'>Q&A<a href='/board' class='moreBoard'>+</a></div>
						</div>
						<div class='row board'>
							<div class='col-xs-12 item'>Welcome</div>
							<div class='col-xs-12 item'>To</div>
							<div class='col-xs-12 item'>PKNU</div>
							<div class='col-xs-12 item'>W.A.P</div>
							<div class='col-xs-12 item'>!!!!!</div>
							<div class='col-xs-12 item'>Welcome</div>
						</div>
					</div>
					<div class='col-md-6 test'>
						<div class='row gallery'>
							<div class='simpleBoardTitle'>사진첩<a href='/board' class='moreBoard'>+</a></div>
						</div>
						<div class='row board'>
							<div class='col-xs-12 item'>Welcome</div>
							<div class='col-xs-12 item'>To</div>
							<div class='col-xs-12 item'>PKNU</div>
							<div class='col-xs-12 item'>W.A.P</div>
							<div class='col-xs-12 item'>!!!!!</div>
							<div class='col-xs-12 item'>Welcome</div>
						</div>
					</div>
				</div>
			</article> -->
		</section>
		<footer ></footer>
		
		
	</body>
</html>	 