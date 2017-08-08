<!DOCTYPE html>
<html lang="ko">
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
				margin-top: 30px;
				background-color: #353535;
				min-height:200px;
				color: #b1b1b1;
				padding: 20px 5px;
			}
			body{
				padding-top:50px;
				background-color: #eeeeee;
			}
			.mainBody{
				/*border : 1px solid silver;*/
				min-height:100%;
				padding-bottom:10%;
			
			}
			.loginSec{
				float : none;
			}
			.loginBtn{
				width: 100%;
			}
		</style>
	</head>
	<body>
		<header class='logoHeader text-center'>
			<a href="/"><img width="250px" src="/img/main_logo.png"></a>
		</header>
		
		<section class='container mainBody'>
			<div class='row'>
				<div class='col-sm-5 loginSec container'>
					<form class='loginForm' method="post" action='/member/login'>
						<article class='form-group'>
							<input type='text' class='form-control' name='userId' placeholder='아이디'/>
						</article>
						<article class='form-group'>
							<input type='password' class='form-control' name='userPwd' placeholder='비밀번호'/>
						</article>
						<button type='submit' class='btn btn-lg btn-primary loginBtn'>로그인</button>
					</form>
					<hr>
					<div class='text-center'>
						<a href='/member/numberCheck'>회원가입</a> | <a href='/member/forget'>계정을 잃어버리셨나요?</a>
					</div>
				</div>
			</div>
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
		
		
	</body>
</html>	 