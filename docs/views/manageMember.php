<style type='text/css'>
	
	.manageSec{
		margin : 0px auto;
		width: 90%;
	}
	@media (min-width : 992px){
		.editSec input, select{
			width:60% !important;
		}
	}
	.dropdown-toggle{
		padding: 10px 15px !important;
	}

	.boardFrame, .tFrame{
		/*width : 100%;*/
		float: none;
		/*border : 1px solid silver;*/
		min-height: 490px;
	}
	
	.mySlider {
		overflow-y: hidden;
		overflow-x: visible; 
		height: 0px; /* approximate max height */

		transition-property: all;
		transition-duration: .5s;
		transition-timing-function: cubic-bezier(0, 1, 0.5, 1);
	}
	.myClose{
		min-height:250px ;
	}
	#newMemberDiv{
		margin-left: -15px ;
		margin-right: -15px ;
	}
	#newMemberDiv .row{
		margin-left: 0px ;
		margin-right: 0px ;
	}
	.newMemberBtn, .newMemberBtn:hover{
		text-decoration: none;
	}
	.userInfoSec{
		margin:0px auto;
		float: none !important;
	}
</style>

<section class="container">
	<h3>회원 관리</h3>
	<hr>
</section>
<section class="container">
	<a href='javascript:;' class='newMemberBtn'>
		<label >새로 가입된 회원</label>
		<label id='newMemberCnt'>( <?=$noCnt?> )</label>
		<span class='caret'></span>
	</a>
	<article id='newMemberDiv' class='mySlider'>
		<table class="table table-striped">
			<thead>
				<th class="text-center">번호</th>
				<th class="text-center">이름</th>
				<th class="text-center hidden-xs">학번</th>
				<th class="text-center hidden-xs">학과</th>
				<th class="text-center">등급</th>
				<th class="text-center hidden-xs">가입일</th>
			</thead>
			<tbody>
				<?php $tmpIdx = $noCnt; ?>
				<?php foreach($noList as $i => $row) : ?>
					<tr id="newMember_<?=$row['idx']?>">
						<td class="text-center"><?=$tmpIdx?></td>
						<td class="text-center">
							<a href='javascript:;' class='newMemberLink'><?=$row['name']?></a>
							<form name='newMemberForm' class='newMemberForm'>
								<input type='hidden' id='newMemberIdx' name='idx' value="<?=$row['idx']?>">
							</form>
						</td>
						<td class="text-center hidden-xs"><?=$row['sNumber']?></td>
						<td class="text-center hidden-xs"><?=$row['major']?></td>
						<td class="text-center"><?=$row['level']?></td>
						<td class="text-center hidden-xs"><?=$row['regDate']?></td>
					</tr>
					<?php $tmpIdx--; ?>
				<?php endforeach; ?>
			</tbody>
		</table>
	</article>
</section>
<section class="container">
	<label>Activity Memeber</label>
	<table class="table table-striped">
		<thead>
			<th class="text-center">번호</th>
			<th class="text-center">이름</th>
			<th class="text-center hidden-xs">학번</th>
			<th class="text-center hidden-xs">학과</th>
			<th class="text-center">등급</th>
			<th class="text-center hidden-xs">가입일</th>
		</thead>
		<tbody>
			<?php $tmpIdx = count($yeList); ?>
			<?php foreach($yeList as $i => $row) : ?>
				<tr id="newMember_<?=$row['idx']?>">
					<td class="text-center"><?=$tmpIdx?></td>
					<td class="text-center">
						<a href='javascript:;' class='mbNameLink'><?=$row['name']?></a>
						<form name='actMemberForm' class='actMemberForm'>
							<input type='hidden' id='actMemberIdx' name='idx' value="<?=$row['idx']?>">
						</form>
					</td>
					<td class="text-center hidden-xs"><?=$row['sNumber']?></td>
					<td class="text-center hidden-xs"><?=$row['major']?></td>
					<td class="text-center"><?=$row['level']?></td>
					<td class="text-center hidden-xs"><?=$row['regDate']?></td>
				</tr>
				<?php $tmpIdx--; ?>
			<?php endforeach; ?>
		</tbody>
	</table>
</section>

<section class="container">
	<label>Non Activity Memeber</label>
	<table class="table table-striped">
		<thead>
			<th class="text-center">번호</th>
			<th class="text-center">이름</th>
			<th class="text-center hidden-xs">학번</th>
			<th class="text-center hidden-xs">학과</th>
			<th class="text-center">등급</th>
			<th class="text-center hidden-xs">가입일</th>
		</thead>
		<tbody>
			<?php $tmpIdx = count($badList); ?>
			<?php foreach($badList as $i => $row) : ?>
				<tr id="newMember_<?=$row['idx']?>">
					<td class="text-center"><?=$tmpIdx?></td>
					<td class="text-center">
						<a href='javascript:;' class='mbNameLink'><?=$row['name']?></a>
						<form name='actMemberForm' class='actMemberForm'>
							<input type='hidden' id='actMemberIdx' name='idx' value="<?=$row['idx']?>">
						</form>
					</td>
					<td class="text-center hidden-xs"><?=$row['sNumber']?></td>
					<td class="text-center hidden-xs"><?=$row['major']?></td>
					<td class="text-center"><?=$row['level']?></td>
					<td class="text-center hidden-xs"><?=$row['regDate']?></td>
				</tr>
				<?php $tmpIdx--; ?>
			<?php endforeach; ?>
		</tbody>
	</table>
</section>

<?php /*=============================== Modal Area ======================================*/?>
<section class='modal fade' id='userInfoModal'>
	<section class='modal-dialog'>
		<article class='modal-content'>
			<div class='modal-header'>
				<h4>회원 정보</h4>
			</div>
			<div class='modal-body'>
				<div class='container-fluid'>
					<div class='row '>
						<div class='col-xs-11 userInfoSec' >
							<div class='row'>
								<div class='col-sm-4 col-sm-push-8 text-center'>
									<img src='/img/1.jpg' class='img-circle' width='100px' height='100px'>
								</div>
								<div class='col-sm-8 col-sm-pull-4'>
									<label>이름</label>
									<p class='name'></p>
									<label>아이디</label>
									<p class='id'></p>
								</div>
							</div>
							<label>Level</label>
							<form name='memberInfoForm' id='memberInfoForm'>
								<div class='form-group'>
									<select class='form-control' name='level'>
										<option>====등급 선택====</option>
										<?php foreach($levelList as $i =>$row ) : ?>
											<option value='<?=$row["idx"]?>'><?=$row['name']?></option>
										<?php endforeach;?>
									</select>
								</div>
							</form>
							<label>비밀번호</label>
							<div><a class='btn btn-primary setPwdBtn' value=''>초기화</a></div>
							<label>학번</label>
							<p class='sNumber'></p>
							<label>학과</label>
							<p class='major'></p>
							<label>연락처</label>
							<p class='pNumber'></p>
							<label>E-Mail</label>
							<p class='email'></p>
							<label>자기소개</label>
							<p class='intro'></p>
						</div>
					</div>
				</div>
			</div>
			<div class='modal-footer'>
				<a class='btn btn-primary mbSaveBtn' value=''>저장</a>
				<a class='btn btn-danger' data-dismiss='modal'>취소</a>
			</div>
		</article>
	</section>
</section>
<section class='modal fade' id='requestModal'>
	<section class='modal-dialog'>
		<article class='modal-content'>
			<div class='modal-header'>
				<h3>새로 가입한 회원</h3>
			</div>
			<div class='modal-body'>
				<div class='container-fluid'>
					<div class='row '>
						<div class='col-xs-11 userInfoSec' >
							<div class='row'>
								<div class='col-sm-4 col-sm-push-8 text-center'>
									<img src='/img/1.jpg' class='img-circle' width='100px' height='100px'>
								</div>
								<div class='col-sm-8 col-sm-pull-4'>
									<label>이름</label>
									<p class='name'></p>
									<label>아이디</label>
									<p class='id'></p>
								</div>
							</div>
							<label>등급</label>
							<p class='level'></p>
							<label>학번</label>
							<p class='sNumber'></p>
							<label>학과</label>
							<p class='major'></p>
							<label>연락처</label>
							<p class='pNumber'></p>
							<label>E-Mail</label>
							<p class='email'></p>
							<label>자기소개</label>
							<p class='intro'></p>
						</div>
					</div>
				</div>
			</div>
			<div class='modal-footer'>
				<a class='btn btn-primary allowBtn' value=''>승인</a>
				<a class='btn btn-danger' data-dismiss='modal'>취소</a>
			</div>
		</article>
	</section>
</section>


<script>
	$('.mbNameLink').click(function(){
		
		$("#userInfoModal p").empty();
		var idx = $(this).parent().find('#actMemberIdx').val();

		$.ajax({
			url : '/manage/getMemberInfo/'+idx,
			dataType : "json",
			success : function(data){
				if(data.code == 200){
					var info = data.info;
					var nameTag = $("#userInfoModal .name");
					var idTag = $("#userInfoModal .id");
					var sNumberTag = $("#userInfoModal .sNumber");
					var emailTag = $("#userInfoModal .email");
					var majorTag = $("#userInfoModal .major");
					// var levelTag = $("#userInfoModal .level");
					var pNumberTag = $("#userInfoModal .pNumber");
					var introTag = $("#userInfoModal .intro");
					var levelTag = $("#userInfoModal select[name='level']");
					nameTag.append(info['name']);
					idTag.append(info['id']);
					levelTag.val(info['levelIdx']);
					majorTag.append(info['major']);
					sNumberTag.append(info['sNumber']);
					pNumberTag.append(info['phoneNumber']);
					emailTag.append(info['email']);
					introTag.append(info['introduction']);
					$(".setPwdBtn").attr('value', info['idx']);
					$(".mbSaveBtn").attr('value', info['idx']);
					$('#userInfoModal').modal("show");
				}else alert("Error! Code : "+data.code);
			}
		})
		// $("#userInfoModal").modal("show");
	});
	$('.mbSaveBtn').click(function(){
		var idx = $(this).attr('value');
		if(confirm("저장하시겠습니까? ") > 0){
			$.ajax({
				url : "/manage/mbLevelUpdate/"+idx,
				dataType : "json",
				type : 'post',
				data : $("#memberInfoForm").serialize(),
				success : function(data){
					if(data.code == 200){
						document.location.reload();
					}else alert("Fail! ErrorCode : "+data.code);
				}
			});
		}
		memberInfoForm
	});
	$('.setPwdBtn').click(function(){
		if(confirm("Set Pwd?") > 0){
			var idx = $(this).attr('value');
			$.ajax({
				url : "/manage/setPwd/"+idx,
				dataType : 'json',
				success : function(data){
					if(data.code == 200){
						alert("비밀번호 초기화 완료!");
					}else alert("Fail! Error Code : "+data.code);
				}
			})
		}
	});
	$('.newMemberLink').click(function(){
		$("#requestModal p").empty();
		var idx = $(this).parent().find('#newMemberIdx').val();

		$.ajax({
			url : '/manage/getMemberInfo/'+idx,
			dataType : "json",
			success : function(data){
				if(data.code == 200){
					var info = data.info;
					var nameTag = $("#requestModal .name");
					var idTag = $("#requestModal .id");
					var sNumberTag = $("#requestModal .sNumber");
					var emailTag = $("#requestModal .email");
					var majorTag = $("#requestModal .major");
					var levelTag = $("#requestModal .level");
					var pNumberTag = $("#requestModal .pNumber");
					var introTag = $("#requestModal .intro");

					nameTag.append(info['name']);
					idTag.append(info['id']);
					levelTag.append(info['level']);
					majorTag.append(info['major']);
					sNumberTag.append(info['sNumber']);
					pNumberTag.append(info['phoneNumber']);
					emailTag.append(info['email']);
					introTag.append(info['introduction']);
					$(".allowBtn").attr('value', info['idx']);
					$('#requestModal').modal("show");
				}else alert("Error! Code : "+data.code);
			}
		})
		
	});
	$('.allowBtn').click(function(){
		if(confirm("승인 하시겠습니까?") > 0){
			var idx = $(this).attr("value");
			$.ajax({
				url : '/manage/allowMember/'+idx,
				dataType : "json",
				success : function(data){
					if(data.code == 200){
						$('#newMember_'+idx).remove();
						$('#requestModal').modal("hide");
					}else alert("Fail! Error Code : "+data.code);
				}
			})
		}
	});
	$('.newMemberBtn').click(function(){
		
		// $("#newMemberDiv").addClass('animated fadeInDown');
		// $("#newMemberDiv").show();
		$("#newMemberDiv").toggleClass('myClose');
	});
</script>