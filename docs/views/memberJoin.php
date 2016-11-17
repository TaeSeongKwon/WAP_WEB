<style type='text/css'>
	
	#birthDayDiv select{
		width : 30%;
		display: inline;
		margin-right: 1%;
	}
	.exampleLb{
		margin-left: 15px
	}
	.txtUnderLn{
		border-bottom: 3px solid skyblue;
		padding-bottom: 1px;
	}
</style>


<section class='container mainBody'>
	<article class='row '>
		<div class='col-xs-12'>
			<h3>회원가입</h3>
		</div>
	</article>
	<hr>
	<article class='row container joinBody'>
		<div class='col-sm-5' style='margin:0px auto; float:none !important;'>
			<form class='form-iline' name='joinForm' action='/member/joinControl' method="post" action=''>
			<!-- <div class='row'> -->
				<label class='txtUnderLn'>아이디</label>
				<div class='form-group'>
					<input type='text' class='form-control' name='userId' placeholder='아이디'>
				</div>
				<!-- <a class='btn btn-danger'>Check ID</a> -->
				<p id='idNotice'>아이디를 입력하세요</p>
			<!-- </div> -->
			<!-- <div class='row'> -->
				<label class='txtUnderLn'>비밀번호</label>
				<div class='form-group'>
					<input type='password' class='form-control' id='pwd' name='pwd' placeholder='비밀번호'>
				</div>
			<!-- </div> -->
			<!-- <div class='row'> -->
				<div class='form-group'>
					
					<input type='password' class='form-control' id='rePwd' placeholder='비밀번호 확인'>
				</div>
				<p id='stdNumNotice'>Please Check the PASSWORD!</p>
				<label class='txtUnderLn'>이름</label>
				<div class='form-group'>
					<input type='text' class='form-control' name='name' placeholder='이름'>
				</div>
				<label class='txtUnderLn'>생년월일</label>
				<div id='birthDayDiv' class='form-group'></div>
				<label class='txtUnderLn'>학번</label>
				<div class='form-group'>
					<input type='text' class='form-control' readonly="true" name='sNumber' value='<?=$sNumber?>'>
				</div>
				<label class='txtUnderLn'>학과</label>
				<div class='form-group'>
					<select name='major' class='form-control'value=''>
						<option value=''>====== 학과를 선택하세요 ======</option>
						<option value='1'>컴퓨터공학과</option>
						<option value='2'>IT융합응용공학과</option>
					</select>
					<!-- <input type='text' class='form-control' placeholder='MAJOR'> -->
				</div>
				
				<label class='txtUnderLn'>E-Mail </label><label class='exampleLb'>EX)WAP@gmail.com</label>
				<div class='form-group'>
					<input type='text' class='form-control' name='email' placeholder='이메일'>
				</div>
				<label class='txtUnderLn'>연락처</label><label class='exampleLb'>EX)010-0000-0000</label>
				<div class='form-group'>
					<input type='text' class='form-control' name='phoneNumber' placeholder="연락처">
				</div>
				<label class='txtUnderLn'>자기소개</label>
				<div class='form-group'>
					<textarea class='form-control' name='introduce' placeholder='자기소개를 입력하세요'></textarea>
				</div>
			<!-- </div> -->
			</form>
			<a class='btn btn-primary joinBtn' href='javascript:;' >가입</a> <a class='btn btn-danger' herf='/'>취소</a>
		</div>
	</article>
</section>

<script type='text/javascript' >
	$('#birthDayDiv').birthdayPicker();
	$('#birthDayDiv select').addClass('form-control');
	$('input[name="userId"]').on('keyup', function(){
		// console.log("123");
		var id = document.joinForm.userId.value;
		var target = $('#idNotice');
		id = id.trim();
		if(id.length < 6){
			target.empty();
			target.append('ID is big then 5 length');
			return ;
		}
		$.ajax({
			url : '/member/idCheck',
			dataType : 'json',
			type : 'post',
			data : 'userId='+id,
			success : function(data){
				target.empty();
				if(data.code == 200){
					if(data.isExist == 'true')
						target.append("이미 사용중인 아이디입니다.");
					else 
						target.append("사용가능한 아이디");
				}else target.append("Faild Check! Error Code : "+data.code);
			}
		});
	});
	$('#pwd').keyup(function(){
		var pwd = document.joinForm.pwd.value;
		pwd = pwd.trim();
		var target =$('#stdNumNotice');
		target.empty();
		if(pwd.length <6)
			target.append("비밀번호는 5자리 이상 이어야 합니다.");
		else 
			target.append("좋습니다. 비밀번호를 확인해주세요");
	});
	$('#rePwd').keyup(function(){
		var pwd = document.joinForm.pwd.value;
		var rePwd = document.joinForm.rePwd.value;
		rePwd = rePwd.trim();
		var target =$('#stdNumNotice');
		target.empty();
		if(rePwd == pwd)
			target.append("좋습니다.");
		else 
			target.append('비밀번호가 일치하지 않습니다.');

	});
	$('.joinBtn').click(function(){
		var id = document.joinForm.userId.value;
		var pwd = document.joinForm.pwd.value;
		var rePwd = document.joinForm.rePwd.value;
		var name = document.joinForm.name.value;
		var major = document.joinForm.major.value;
		var email = document.joinForm.email.value;
		var phoneNumber = document.joinForm.phoneNumber.value;
		var introduce = document.joinForm.introduce.value;
		var birthday = document.joinForm.birthDay.value;

		id = id.trim();
		
		pwd = pwd.trim();
		rePwd = rePwd.trim();
		name = name.trim();
		major = major.trim();
		email = email.trim();
		phoneNumber = phoneNumber.trim();
		introduce = introduce.trim();
		birthday = birthday.trim();


		if(id.length<6 && id == ""){
			alert("아이디를 입력하세요");
			return;
		}else if(pwd == ""){
			alert("비밀번호를 입력하세요");
			return;
		}else if(pwd != rePwd){
			alert("비밀번호를 확인하세요");
			return ;
		}else if(name == ""){
			alert("이름을 입력하세요");
			return;
		}else if(major == ""){
			alert("학과를 선택하세요");
			return;
		}else if(email == ""){
			alert("Email을 입력하세요");
			return;
		}else if(phoneNumber == ""){
			alert("연락처를 입력하세요");
			return;
		}else if(introduce == ""){
			alert("자기소개를 입력하세요");
			return;
		}else if(birthday == ""){
			alert("생년월일을 입력하세요");
			return;
		}
		
		$.ajax({
			url : '/member/idCheck',
			dataType : 'json',
			type : 'post',
			data : 'userId='+id,
			success : function(data){
				if(data.code == 200){
					if(data.isExist == 'true')
						alert('아이디를 확인하세요');
					else
						document.joinForm.submit();
				}else alert("Faild Check! Error Code : "+data.code);
			}
		});
		
	});
</script>