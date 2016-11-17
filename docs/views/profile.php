<style type='text/css'>
	
	.txtUnderLn{
		border-bottom: 3px solid skyblue;
		padding-bottom: 1px;
	}

	.editSec{
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


<section class='container mainBody'>
	<article class='row '>
		<div class='col-xs-12'>
			<h3>나의 정보</h3>
		</div>
	</article>
	<hr>

	<article class='row'>
		<div class='col-sm-12'>
			<div class='editSec'>
				<form name='updateForm' id='updateForm'>
					<div class='row'>
						<div class='col-sm-4 col-sm-push-8 text-center'>
							<img src='/img/1.jpg' class='img-circle' width='100px' height='100px'>
						</div>
						<div class='col-sm-8 col-sm-pull-4'>
							<label class='txtUnderLn'>이름</label>
							<p><?=$userInfo['name']?></p>
							<label class='txtUnderLn'>ID</label>
							<p><?=$userInfo['id']?></p>
						</div>
					</div>
					<label class='txtUnderLn'>등급</label>
					<p><?=$userInfo['levelIdx']?></p>
					<label class='txtUnderLn'>비밀번호</label>
					<div class='form-group'>
						<input type='password' class='form-control' name='pwd' id='pwd' placeholder='새 비밀번호'>
					</div>
					<div class='form-group'>
						<input type='password' class='form-control' name='repwd' id='repwd' placeholder='새 비밀번호 확인'>
					</div> 
					<label>학번</label>
					<div class='form-group'>
						<input type='text' class='form-control' readonly  value='<?=$userInfo['sNumber']?>'>
					</div>
					<label class='txtUnderLn'>전공학과</label>
					<p><?=$userInfo['majorIdx']?></p>
					<label>연락처</label>
					<div class='form-group'>
						<input type='text' class='form-control' name='phoneNumber' placeholder='연락처를 입력하세요'  value='<?=$userInfo['phoneNumber']?>'>
					</div>
					<label class='txtUnderLn'>E-Mail</label>
					<div class='form-group'>
						<input type='text' class='form-control' name='email' placeholder='e-mail을 입력하세요'  value='<?=$userInfo['email']?>'>
					</div>
					<label class='txtUnderLn'>자기소개</label>
					<div class='form-group'>
						<textarea class='form-control' name='intro' placeholder='자기소개를 입력하세요' ><?=$userInfo['introduction']?></textarea>
					</div>
				</form>
				<div class='text-right'>
				<a class='btn btn-primary saveBtn'>Save</a> <a class='btn btn-danger'>Cancel</a>
				</div>
			</div>
		</div>
	</article>

</section>


<script >
$('.saveBtn').click(function(){
	var phoneNumber = document.updateForm.phoneNumber.value;
	var email = document.updateForm.email.value;
	var introduction = document.updateForm.intro.value;
	var pwd = document.updateForm.pwd.value;
	var rePwd = document.updateForm.repwd.value;
	phoneNumber = phoneNumber.trim();
	email = email.trim();
	introduction = introduction.trim();
	var checkPwd = pwd.trim();
	var checkRePwd = rePwd.trim();
	if(checkPwd.length < pwd.length){
		alert("비밀번호를 입력하셔야 합니다.");
		return;
	}else if(pwd == "" && rePwd != ""){
		alert("비밀번호를 확인해 주십시요.");
		return ;
	}else if(checkPwd.length > 0 && checkPwd.length < 6){
		alert("비밀번호는 6자리 이상 이어야 합니다.");
		return;
	}else if(checkPwd != checkRePwd){
		alert("비밀번호를 확인해 주십시요.");
		return ;
	}else{
		$.ajax({
			url : '/profile/update',
			dataType : 'json',
			type : 'post',
			data : $('#updateForm').serialize(),
			success : function(data){
				if(data.code == 200){
					alert("저장하였습니다.");
					document.location.reload();
				}else alert("Update Error!! ErrorCode : "+data.code);
			}
		});
	}
});
</script>