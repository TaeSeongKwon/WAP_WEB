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
				height: 200px;
				background-color: skyblue;
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
			<h1><a href='/'>LOGO</a></h1>
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
		<footer ></footer>
		
		
	</body>
</html>	 