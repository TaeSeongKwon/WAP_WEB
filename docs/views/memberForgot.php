
<style type='text/css'>
	.txtUnderLn{
		border-bottom: 3px solid skyblue;
		padding-bottom: 1px;
	}

	.forgotSec{
		height: 300px;
		display: flex;
		display: -webkit-flex;
		align-items: center;
		justify-content: center;
	}
	@media (min-width: 750px){
		#idSec{
			border-right: 1px solid silver;
		}
	}
	.findIdSec, .findPwdSec, .setPwdSec{
		float:none;
		margin: 0px auto;
	}
	/*@media (max-width: 749px) {
		#idSec{
			border-bottom: 1px solid silver;
		}
	}*/
	.container *{
		position: static !important;
	}
</style>

<section class='container mainBody'>
	<article class='row '>
		<div class='col-xs-12'>
			<h3>계정 찾기</h3>
		</div>
	</article>
	<hr>
	<article class='row container joinBody'>
		<div class='col-sm-6 forgotSec text-center ' id='idSec'>
			<div>
			<h3>아이디가 기억나지 않나요?</h3>
			<a class='btn btn-primary idBtn'>아이디 찾기</a>
			</div>
		</div>
		<hr class='visible-xs'>
		<div class='col-sm-6 forgotSec text-center'>
			<div>
			<h3>비밀번호를 잊어버리셨나요?</h3>
			<a class='btn btn-danger pwdBtn'>비밀번호 찾기</a>
			</div>
		</div>
	</article>
</section>

<section class='modal fade' id='idModal'>
	<section class='modal-dialog'>
		<article class='modal-content'>
			<div class='modal-header'>
				<h3>아이디 찾기</h3>
			</div>
			<div class='modal-body'>
				<div class='container-fluid'>
					
					<div class='row'>
						<div class='col-xs-10  col-sm-6 findIdSec'>
							<form name='findIdForm'>
								<label class='txtUnderLn'>이름</label>
								<div class='form-group'>
									<input type='text' class='form-control' name='name' placeholder='Please Input Name'> 
								</div>
								<label class='txtUnderLn'>학번</label>
								<div class='form-group'>
									<input type='text' class='form-control' name='sNumber' placeholder='Please Input Student Number'> 
								</div>
							</form>
						</div>
					</div>
					
				</div>
			</div>
			<div class='modal-footer'>
				<a class='btn btn-primary findIdBtn'>찾기</a>  
				<a class='btn btn-danger' data-dismiss='modal'>취소</a>
			</div>
		</article>
	</section>
</section>

<section class='modal fade' id='pwdModal'>
	<section class='modal-dialog'>
		<article class='modal-content'>
			<div class='modal-header'>
				<h3>비밀번호 찾기</h3>
			</div>
			<div class='modal-body'>
				<div class='container-fluid'>
					<div class='row'>
						<div class='col-xs-10  col-sm-6 findPwdSec'>
							<form name='findPwdForm' id='pwdForm'>
								<label class='txtUnderLn'>아이디</label>
								<div class='form-group'>
									<input type='text' class='form-control' name='id' placeholder='Please Input Name'> 
								</div>
								<label class='txtUnderLn'>학번</label>
								<div class='form-group'>
									<input type='text' class='form-control' name='sNumber' placeholder='Please Input Student Number'> 
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class='modal-footer'>
				<a class='btn btn-primary findPwdBtn'>찾기</a>
				<a class='btn btn-danger' data-dismiss='modal'>취소</a>
			</div>
		</article>
	</section>
</section>

<section class='modal fade' id='pwdSetModal'>
	<section class='modal-dialog'>
		<article class='modal-content'>
			<div class='modal-header'>
				<h3>비밀번호 재설정</h3>
			</div>
			<div class='modal-body'>
				<div class='container-fluid'>
					<div class='row' >
						<div class='col-xs-10  col-sm-6 setPwdSec'>
							<form name='setPwdForm'>
								<label class='txtUnderLn'>새 비밀번호</label>
								<div class='form-gruop'>
									<input type='password' class='form-control' name='pwd' placeholder='Please Input New Password'>
								</div>
								<label class='txtUnderLn'>비밀번호 확인</label>
								<div class='form-gruop'>
									<input type='password' class='form-control' name='rePwd' placeholder='Please Input One more Password'>
								</div>
								<p id='noticePwd'>새로운 비밀번호를 입력하세요</p>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class='modal-footer'>
				<a class='btn btn-primary setPwdBtn'>변경</a>
			</div>
		</article>
	</section>
</section>

<script>
	$('.idBtn').click(function(){ $('#idModal').modal('show');});
	$('.pwdBtn').click(function(){ $('#pwdModal').modal('show');});
	$('#pwdModal').on('hidden.bs.modal', initInput);
	$('#idModal').on('hidden.bs.modal', initInput);
	$('#pwdSetModal').on('hidden.bs.modal', initInput);
	function initInput(){
		$(this).find('input').val("");
	}

	$('.findIdBtn').click(function(){
		var name = document.findIdForm.name.value;
		var sNumber = document.findIdForm.sNumber.value;
		name = name.trim();
		sNumber = sNumber.trim();
		if(name == ""){
			alert("아이디를 입력하세요");
			return ;
		}
		if(sNumber ==""){
			alert("학번을 입력하세요.");
			return ;
		}

		$.ajax({
			url : '/member/findId',
			dataType : 'json',
			type : 'post',
			data : $('form[name="findIdForm"]').serialize(),
			success : function(data){
				if(data.code == 200){
					if(data.isExist == "Y"){
						alert("Find your ID : "+data.id);
						$('#idModal').modal('hide');
					}
					else
						alert("Can't Find ID");
				}else alert("Can't Find ID");
			}

		});
	});

	var Tmp;
	$('.findPwdBtn').click(function(){
		var id = document.findPwdForm.id.value;
		var sNumber = document.findPwdForm.sNumber.value;
		id = id.trim();
		sNumber = sNumber.trim();

		if(id == ""){
			alert('Please Input ID');
			return;
		}
		if(sNumber ==""){
			alert("Please Input Student Number");
			return ;
		}

		$.ajax({
			url : '/member/findPwd',
			dataType : 'json',
			type : 'post',
			data : $('#pwdForm').serialize(),
			success : function(data){
				if(data.code == 200){
					if(data.isExist == "Y"){
						Tmp = data.K;
						$('#pwdModal').modal('hide');
						$('#pwdSetModal').modal('show');
					}else alert("Cant't Find Password");
				}else alert("Cant't Find Password");
			}
		});
	});
	$('input[name="pwd"]').keyup(function(){
		var pwd = document.setPwdForm.pwd.value;
		pwd = pwd.trim();
		var target = $('#noticePwd');
		target.empty();
		if(pwd.length < 6)
			target.append("비밀번호는 5자리 이상 이어야 합니다.");
		else 
			target.append("Good! Please Re Input");
	});
	$('input[name="rePwd"]').keyup(function(){
		var pwd = document.setPwdForm.pwd.value;
		var rePwd = document.setPwdForm.rePwd.value;
		pwd = pwd.trim();
		rePwd = rePwd.trim();
		var target = $('#noticePwd');
		target.empty();
		if(rePwd != pwd)
			target.append("입력하신 비밀번호가 맞지않습니다.");
		else 
			target.append("GOOD!")

	});
	$('.setPwdBtn').click(function(){
		var pwd = document.setPwdForm.pwd.value;
		var rePwd = document.setPwdForm.rePwd.value;

		pwd = pwd.trim();
		rePwd = rePwd.trim();

		if(pwd.length < 6){
			alert("Please Check Password Lengh");
			return ;
		}else if(pwd != rePwd){
			alert('Please Check Password Inputs');
			return;
		}

		$.ajax({
			url : '/member/setPassword',
			dataType : "json",
			type : "post",
			data : $('form[name="setPwdForm"]').serialize()+'&idx='+Tmp,
			success : function(data){
				if(data.code == 200){
					alert("Success Setting Your New Password!");
					$('pwdSetModal').modal('hide');
					document.location.href='/';
				}else alert("Error! Code : "+data.code);
			}
		});
	});
</script>
