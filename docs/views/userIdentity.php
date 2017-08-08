
<style type='text/css'>
	html, body{
		height:100%;
		width : 100%;
	}
	.mainBody{
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
	@media (min-width: 768px){
		form{
			width:400px;
		}	
	}
	@media (max-width: 767px){
		form{
			width:350px;
		}	
	}
</style>

<section class='mainBody'>
	<article class='container checkBody'>
		<div class='centerSec'>
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
