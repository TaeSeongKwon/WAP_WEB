
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
	}
	.mainBody{
		border : 1px solid silver;
		/*min-height:100%;*/
		height:100%;
		padding-bottom:10%;
	
	}
	.centerSec{
		margin: auto auto;

	}
	.checkBody{
		display: flex;
		display: -webkit-flex;
		align-items : center;
		height: inherit;
	}
	.checkPwdBtn{
		width:100%;
	}
	.dropdown-toggle{
		padding: 10px 15px !important;
	}
</style>

<section class='container mainBody'>
	<!-- <article class='row '>
		<div class='col-xs-12'>
			<h3>User Identity</h3>
		</div>
	</article>
	<hr> -->
	<article class='row container checkBody'>
		<div class='col-md-5 col-sm-6 col-xs-12 centerSec'>
			<h3>사용자 확인</h3>
			<form method='post' action='<?=$checkUrl?>' name='userInfoForm' >
				<div class='form-group'>
					<input type='password' name='userPwd' placeholder='Please Input Password' class='form-control'>
				</div>
				<hr>
				<button type='submit' class='btn btn-primary checkPwdBtn' >OK</a>
			</form>
			 
		</div>
	</article>
</section>
