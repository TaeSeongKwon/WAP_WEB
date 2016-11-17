<style type='text/css'>
	.boardFrame, .tFrame{
		/*width : 100%;*/
		float: none;
		/*border : 1px solid silver;*/
		/*min-height: 490px;*/
		/*background-color: #ffffff;*/
	}
	.boardHead, .tHead{
		background-color: #CC6600;
		color: white;
		font-weight: bold;
		font-size: medium;
		padding:7px 0px;
	}
	.tbody{
		/*min-height : 464px;*/
	}
	.tfooter{
		/*border-top : 1px silver solid;*/
	}
	.boardItem, .tItem{
		padding : 5px 0px;
		border-bottom : solid 1px silver;
	}
	.boardItem a, .tItem a{
		color : #444444;
		text-decoration: none;
	}
	.boardItem:hover{
		background-color: rgba(192,192,192,0.12);
	}
	
	.boardTitle{
		text-align: left;
	}
	.mbTitle{
		font-size: x-small;
	}
	.writeBtnSec{
		float : none;
		margin-bottom : 5px;
	}
	#proDetail{
		height:100px;
		z-index: 10;
		position: relative;
	}
	.txtUnderLn{
		border-bottom: 3px solid skyblue;
		padding-bottom: 1px;
	}
</style>

<section class='container mainBody'>
	<article class='row'>
		<div class='col-xs-12'>
			<strong><h3>나의 프로젝트</h3></strong>
		</div>
	</article>
	<hr>
	<article class='row container'>
		<div class='col-sm-10 container text-right writeBtnSec'>
			
			<a class='btn btn-info addBtn' href='javascript:;'>새 프로젝트</a>
			
		</div>
		
		<div class='col-sm-10 container text-center boardFrame'>
			<div class='row boardHead'>
				<div class='col-md-1 col-xs-2'>번호</div>
				<div class='col-md-7 col-xs-10'>프로젝트 명</div>
				<div class='col-md-3 hidden-sm hidden-xs'>등록일</div>
				<div class='col-md-1 hidden-sm hidden-xs'>상태</div>
			</div>
			<div class='tbody'>
				<?php $num = $rowNum;
					foreach($list as $i => $row) : ?>
					<?php 
						$regDate = strtotime($row['endDate']);
						$crrDate = time();
						$stat ="";
						if($regDate < $crrDate)
							$stat="완료";
						else
							$stat = "진행중";
					?>
				<div class='row boardItem'>
					<div class='col-md-1 col-xs-2'><?=$num?></div>
					<div class='col-md-7 col-sm-10 boardTitle'>
						<div><a href='/project/view/<?=$row["idx"]?>'><?=$row['name']?></a></div>
						<div class='visible-xs visible-sm mbTitle'><?=$row['regDate']?> | <?=$stat?></div>
					</div>
					<div class='col-md-3 hidden-sm hidden-xs'><?=$row['regDate']?></div>
					<div class='col-md-1 hidden-sm hidden-xs'><?=$stat?></div>
					
				</div>
				<?php $num--;
					endforeach; ?>
			</div>
			<div class='tfooter row'>
				<div class='col-xs-12' style='height:80px;'>
					<?php /*$pagination*/?>
					<!-- <nav>
					  <ul class="pagination">
					    <li>
					      <a href="#" aria-label="Previous">
					        <span aria-hidden="true">&laquo;</span>
					      </a>
					    </li>
					    <li><a href="#">1</a></li>
					    <li><a href="#">2</a></li>
					    <li><a href="#">3</a></li>
					    <li><a href="#">4</a></li>
					    <li><a href="#">5</a></li>
					    <li>
					      <a href="#" aria-label="Next">
					        <span aria-hidden="true">&raquo;</span>
					      </a>
					    </li>
					  </ul>
					</nav> -->
				</div>
			</div>
		</div>

	</article>
</section>

<section class='modal fade' id='newProModal'>
	<section class='modal-dialog modal-lg'>
		<article class='modal-content'>
			<div class='modal-header'>
				<h3>새 프로젝트</h3>
			</div>
			<div class='modal-body'>
				<div class='container-fluid'>
					<form id='regForm' name='regForm'>
					<div class='row title'>
						<div class='col-xs-12'>
							<input type='text' class='form-control' placeholder='프로젝트 명을 입력하세요' name='proName' id='proName'> 
						</div>
					</div>
					<hr>
					<div class='row detail'>
						<div class='col-sm-6'>
							<label class='txtUnderLn'>시작일</label>
							<input id="startDate" name='startDate' class='form-control'  type="text">
						</div>
						
						<div class='col-sm-6'>
							<label class='txtUnderLn'>종료일</label>
							<input id="endDate" name='endDate' class='form-control'  type="text">
						</div>
						<div class='col-xs-12'>
							<label class='txtUnderLn'>설명</label>
							<textarea name='proDetail' class='form-control' placeholder='이 프로젝트에 대하여 설명하세요' id='proDetail' col='50' row='20'></textarea>
						</div>
					</div>
					</form>
				</div>
			</div>
			<div class='modal-footer'>
				<a class='btn btn-primary regBtn'>등록</a>
				<a class='btn btn-danger' data-dismiss='modal'>취소</a>
			</div>
		</article>
	</section>
</section>


<script>
	// $("#proDetail").click(function(){
	// 	alert("1111"); 
	// 	$(this).focus();
	// });
	$('.regBtn').click(function(){
		var proName = document.regForm.proName.value;
		var proDetail = document.regForm.proDetail.value;
		var startDate = document.regForm.startDate.value;
		var endDate = document.regForm.endDate.value;
		var realStDate;
		var realEdDate;
		console.log("start : ",startDate);
		proName = proName.trim();
		proDetail = proDetail.trim();
		startDate = startDate.trim();
		endDate = endDate.trim();
		if(startDate != "")
			realStDate = new Date(document.regForm.startDate.value);
		else{
			alert("시작일을 등록하세요");
			return;
		}

		if(endDate != "")
			realEdDate = new Date(document.regForm.endDate.value);
		else{
			alert("종료일을 등록하세요");
			return;
		}

		if(proName == ""){
			alert("프로젝트 명을 입력하세요");
			return;
		}
		if(proDetail == ""){
			alert("프로젝트에 대하여 설명하세요");
			return;
		}
		if(realEdDate.getTime() < realStDate.getTime()){
			alert("종료일이 시작일보다 빠를 수 없습니다!");
			return;
		}

		$.ajax({
			url : '/project/newproject',
			dataType : 'json',
			type : 'post',
			data : $("#regForm").serialize(),
			success : function(data){
				if(data.code == 200){
					alert("등록 성공!");
					$('#newProModal').modal("hide");
					document.location.reload();
				}
			}
		});
	});
	$('.addBtn').click(function(){ $('#newProModal').modal("show");});
	 $('#newProModal').on("hide.bs.modal", function(){
	 	var proName = $('#proName');
	 	var proDetail = $('#proDetail');
	 	var startDate = $('#startDate');
	 	var endDate = $("#endDate");

	 	proName.val("");
	 	proDetail.val("");
	 	startDate.val("");
	 	endDate.val("");

	 });
	// 선언한 TextBox에 DateTimePicker 위젯을 적용한다.
	$('#startDate').datetimepicker({
		format : "YYYY-MM-DD"
	  // language : 'ko', // 화면에 출력될 언어를 한국어로 설정한다.
	  // pickTime : false, // 사용자로부터 시간 선택을 허용하려면 true를 설정하거나 pickTime 옵션을 생략한다.
	  // defalutDate : new Date() // 기본값으로 오늘 날짜를 입력한다. 기본값을 해제하려면 defaultDate 옵션을 생략한다.
	});

	// 선언한 TextBox에 DateTimePicker 위젯을 적용한다.
	$('#endDate').datetimepicker({
		
		format : "YYYY-MM-DD"
	  // language : 'ko', // 화면에 출력될 언어를 한국어로 설정한다.
	  // pickTime : false, // 사용자로부터 시간 선택을 허용하려면 true를 설정하거나 pickTime 옵션을 생략한다.
	  // defalutDate : new Date() // 기본값으로 오늘 날짜를 입력한다. 기본값을 해제하려면 defaultDate 옵션을 생략한다.
	});


</script>