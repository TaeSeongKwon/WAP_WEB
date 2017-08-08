<style>
	.main.container{
		padding : 100px 20px;
	}
	.input-group+.input-group {
		margin-top: 10px;
	}
	.row+form{
		margin-top: 20px;
	}
	.main *{
		position: static !important;
	}
</style>
<section class="main container">
	<article id="descript">
		<div class="row">
			<div class="col-md-5">
				<img width="300px" src="/img/main_logo.png">
			</div>
			<div class="col-md-7">
				<p class="lead">
					안녕하십니까? <?=$info["name"]?> 님<br>
					우리 W.A.P 홈페이지에 접속해주셔서 감사합니다.<br>
					최근 보안강화로 인하여 비밀번호 정책이 변경되었습니다.<br>
					따라서 회원님의 개인정보를 강화하기 위해 새로운 비밀번호를 <br>
					설정해야 합니다. <br>
					<br>
					따라서 새로운 비밀번호 설정을 부탁드립니다.<br>
				</p>
			</div>
		</div>
		<form name="changeForm">
			<input type="hidden" name="idx" value="<?=$info['idx']?>">
			<div class="input-group">
				<span class="input-group-addon">새 비밀번호</span>
				<input type="password" class="form-control"  name="pwd" placeholder="Please Input New Password">
			</div>
			<div class="input-group">
				<span class="input-group-addon">비밀번호 확인</span>
				<input type="password" class="form-control" name="repwd" placeholder="Please Input New Password">
			</div>
			<div class="input-group">
				<!-- <div class="input-group-btn"> -->
					<a class="btn btn-primary btn-lg" id="changeBtn">변경</a>
				<!-- </div> -->
			</div>
		</form>
	</article>
</section>

<script>
	(function(){
		OK = 200;
		$("#changeBtn").click(() => {
			var pwd = document.changeForm.pwd.value;
			var repwd = document.changeForm.repwd.value;

			pwd = pwd.trim();
			repwd = repwd.trim();
			if(pwd.length < 6){
				alert("비밀번호는 6자리 이상입니다.");
				return ;
			}
			if(pwd != repwd){
				alert("비밀번호를 확인해 주세요.");
				document.changeForm.repwd.focus();			
			}

			$.ajax({
				"url"  	: 		"/member/setPassword",
				"type": 		"post",
				"data"  : 		$("form[name='changeForm']").serialize(),
				"dataType" : 	"json",
				"success" : 	(data) =>{
					if(data["code"] == OK){
					 	alert("비밀번호를 변경했습니다. 로그인해주세요.");
					 	location.href="/member/loginView";
					}else{
						alert("비밀번호를 변경하는데 실패했습니다. 관리자에게 문의하세요");
					}
				}
			})
		});
	})();
</script>