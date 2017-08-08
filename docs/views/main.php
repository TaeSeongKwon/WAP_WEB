<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>W.A.P | Why Are you Programming?</title>
		<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
		<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<link rel='stylesheet' href='/css/bootstrap.min.css' />
		<script src="/js/jquery-2.1.4.min.js"></script>
		<script src="/js/bootstrap.min.js"></script>
		<script src='/js/waypoints.min.js'></script>
		<style>
			header.navbar{
				border-bottom : 1px solid #eee;
			}
			#main_bg {
			    background: url("/img/main_bg.png");
    			background-size: cover;
    			height:500px;
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
			.board div{
				height : 300px;
			}
			.gallery .thumbnail img{
				height : 250px;
			}
			.subscript{
				height : 150px;
				background-color: #f4f4f4;
			}
			.subscript p{
				line-height: 150px;
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
			.board div{
				margin-top: 15px;
			}
			.board div+div{
				border-left: 1px silver dotted;
			}
			.more_board{
				float: right;
				cursor : pointer;
				color : #585858;	
			}
			.item{
				padding :5px 15px;
				/*font-weight: bold;*/
				font-size: medium;

			}
			.item a{
				text-decoration: none;	
				color : #585858;
			}
			.gallery .thumbnail .caption a{
				text-decoration: none;	
				color : #585858;
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
		<section>
			<article class="container-fluid" id="main_bg">
				<p class="text-center lead">
					<strong class="hidden-xs hidden-sm main_title" style="display:none;">
						Why Are you Programming?
					</strong>
					<strong class="hidden-md hidden-lg main_title" style="display:none;">
						ICT Crew W.A.P
					</strong>
				</p>
			</article>
			<article class="container-fluid subscript">
				<p class="lead text-center">
					소프트웨어 개발 열정이 넘치는 이곳! W.A.P
				</p>
			</article>
			<article class="container-fluid">
				<div class="row board">
				<?php $cnt = 1;
					foreach($boardData as $i => $row) : ?>
					<div class="col-md-4">
						<p class='lead'>
							<?=$row['name']?>
							<a href='/board/lists/<?=$row["idx"]?>'><span class="glyphicon glyphicon-chevron-left more_board"></span></a>
						</p>
						<hr>
						<?php $tmp = $row['dataList'];
							foreach($tmp as $j => $rowJ) : ?>
							<article class="row">
								<article class="col-xs-12 item">
									<a href='/board/view/<?=$rowJ['boardType']?>/<?=$rowJ['idx']?>'><?=$rowJ['title']?> <span class="badge"><?=$rowJ['numOfCmt']?></span></a>
								</article>
							</article>
						<?php endforeach; ?>
					</div>
				<?php 
					$cnt++;
				endforeach;?>
				</div>
				<hr>
				<div class="row gallery">
					<?php for($idx = 0, $len = count($galleryData); $idx < 3 && $idx < $len; $idx++) :
						$row = $galleryData[$idx];
					?>
						<div class="col-md-4">
							<div class="thumbnail">
								<a href='/gallery/view/<?=$row["idx"]?>'>
									<img src="<?=$row['thumbPath']?>">
								</a>
								<div class="caption">
									<h3><a href='/gallery/view/<?=$row["idx"]?>'><?=$row['name']?> <span class="badge"><?=$row['cnt']?></span></a></h3>
								</div>
							</div>
						</div>
					<?php endfor; ?>
				</div>
			</article>
		</section>
		<footer>
			<section class="container">
				<address>
					<strong>W.A.P, Inc.</strong><br>
					대한민국 부산광역시 남구 용소로 45. 부경대학교 대연캠퍼스<br>
					누리관 옥상 컨테이너 W.A.P<br><br>
					NooRi Building 5F Container, Pukyong National University DaeYeon Campus<br>
					YongSo Street 45, NamGoo, Pusan City, Republic of Korea
				</address>
				<small>© 2017 All Rights Reserved. W.A.P Create By Kwon TaeSeong</small>
			</section>
		</footer>
		<script>
			$('body').waypoint(function(){ 
				console.log("111");
				$(".main_title").fadeIn();
			});
			var kts = function(){
				// $.post("https://portal.pknu.ac.kr/enview/registry/search.face?method=idFindNewView&langKnd=ko",
				// 	{
				// 		"userType" : "U",
				// 		"userNm" : "권태성",
				// 		"birYear" : "1992",
				// 		"birMonth" : "11",
				// 		"birDay" : "23",
				// 		"birthDay" : "19921123",
				// 		"sexFlag" : "M"
				// 	}, 
				// 	function(data, stae){
				// 		console.log("daa: ", data);
				// 	}, "html");
				// var formData = new FormData();
				// formData.append("userType", "U");
				// formData.append("userNm", "권태성");
				// formData.append("birYear", "1992");
				// formData.append("birMonth", "11");
				// formData.append("birDay", "23");
				// formData.append("birthDay", "19921123");
				// formData.append("sexFlag", "M");
				// console.log(formData);
				var iData = {
						"userType" : "U",
						"userNm" : "권태성",
						"birYear" : "1992",
						"birMonth" : "11",
						"birDay" : "23",
						"birthDay" : "19921123",
						"sexFlag" : "M"
					};
					var tt = "&userType=U"+
					"&userNm=권태성"+
					"&birYear=1992"+
					"&birMonth=11"+
					"&birDay=23"+
					"&birthDay=19921123"+
					"&sexFlag=M";
				$.ajax({
					"url"  : "https://portal.pknu.ac.kr/enview/registry/search.face?method=idFindNewView&langKnd=ko",
					"dataType" : "jsonp",
					"type" : "POST",
					"crossDomain" : true,
					"data" : tt,
					success : function(data){
						console.log(data);
					}
				});
			};
		</script>
	</body>
</html>