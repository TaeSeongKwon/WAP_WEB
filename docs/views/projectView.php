<style>
	.prHead, .prBody{

	}
	.prBody{
		padding:0px 5%;
	}
	#prDetail{
		min-height: 100px;
	}
	.contentItem{
		margin-bottom: 5%;
	}
	.removeBtn{
		display: none;
		cursor: pointer;
	}
	.members{
		margin-bottom: 5px;
	}
	.subTitle{
		margin-bottom: 10px;
		display: block;
	}
	.memberListSec{
		/*display: block;*/
		float:none;
		margin : 0px auto;
	}
	.fileUp{
		display: none !important;
	}
	.removeStart, .removeMiddle, .removeEnd{
		cursor: pointer;
	}
	.callModalBtn{
		position: relative;
		z-index: 10;
	}
	.txtUnderLn{
		border-bottom: 3px solid skyblue;
		padding-bottom: 1px;
	}
	.mainBody *{
		z-index: -1;
	}
</style>

<?php
	$startDate = strtotime($prInfo['startDate']);
	$endDate = strtotime($prInfo['endDate']);
	$crrDate = time();
	$calc = $endDate - $startDate;
	$day = $calc / (60*60*24);
	$month = round(($day / 30), 1);
	$realStart = explode(" ", $prInfo['startDate'])[0];
	$realEnd = explode(" ", $prInfo['endDate'])[0];
	$isEnd = false;
//	$membersIdx = array_column($members, 'idx');
	$membersIdx = array();
	$p = 0;
	foreach($members as $i => $row)
		$membersIdx[$p++] = $row['idx'];

	if($crrDate > $endDate)
		$isEnd = true;
?>
<section class='container mainBody'>
	<article class='row prHead'>
		<div class='col-xs-12'>
			<h3>프로젝트 > <?=$prInfo['name']?> 
			<?php if($isEnd) : ?>
				<a class='btn btn-info'>완료</a>
			<?php else : ?>
				<a class='btn btn-warning'>진행중</a>
			<?php endif;?>
			</h3>
		</div>
	</article>
	<hr>
	<article class='row prBody'>
		<div class='col-xs-12 contentItem'>
			
			<h4 ><span class='txtUnderLn'>기간</span></h4>
			<span><?=$realStart?> ~ <?=$realEnd?> 약 <?=$month?> 개월</span>
		</div>

		<div class='col-xs-12 contentItem'>
			<strong class='subTitle'><span class='txtUnderLn'>프로젝트 설명</span></strong>
			<textarea readonly="true" class='form-control' name='prDetail' id='prDetail'><?=$prInfo['main']?></textarea>
		</div>

		<div class='col-xs-12 contentItem'>
			<strong class='subTitle'>팀 구성원 
			<?php if($viewerIdx == $prInfo['regIdx']) :?>
				<a class='btn btn-warning callModalBtn'>팀원추가</a>
			<?php endif;?>
			</strong>
			<?php foreach($members as $i => $row) : ?>
				<?php if($row['idx'] == $prInfo['regIdx']) : ?>
					<div class='prLeader' >
						<span ><?=$row['name']?></span>(PL)
					</div>
				<?php else : ?>
					<div class='members' >
						<form class='memberForm'>
							<input type='hidden' name='prIdx' value="<?=$prInfo['idx']?>">
							<input type='hidden' name='userIdx' value='<?=$row['idx']?>'>
						</form>
						<span ><?=$row['name']?></span>
						<?php if($prInfo['regIdx'] == $viewerIdx) : ?>
							<span class='glyphicon glyphicon-remove removeBtn'></span>
						<?php endif ?>
					</div>
				<?php endif ;?>
			<?php endforeach;?>
		</div>

		<div class='col-sm-4 contentItem'>
			<label class='txtUnderLn'>시작문서</label>
			<div >
				<?php if(empty($startDoc)) : ?>
					파일이 없습니다. 
					<?php if((!$isEnd) && array_search($viewerIdx, $membersIdx) !== false) : ?>
						<a class='btn btn-default startUp'>업로드</a>
						<input type='file' class='fileUp' id='startInput' name='startInput'>
					<?php endif ?>
				<?php else: ?>
					<a class='btn btn-info' href='/project/getStartFile/<?=$startDoc["idx"]?>' target='blink'>다운로드</a>
					<?php if((!$isEnd) && array_search($viewerIdx, $membersIdx) !== false) : ?>
					 | <span class='glyphicon glyphicon-remove removeStart' value='<?=$startDoc["idx"]?>'></span>
					<?php endif;?>
				<?php endif;?>
			</div>
		</div>
		<?php if($day >= 40) : ?>
			<div class='col-sm-4 contentItem'>
				<label class='txtUnderLn'>중간문서</label>
				<div >
					<?php if(empty($middleDoc)) : ?>
						파일이 없습니다. 
						<?php if((!$isEnd) && array_search($viewerIdx, $membersIdx) !== false) : ?>
							<a class='btn btn-default middleUp'>업로드</a>
							<input type='file' class='fileUp' id='middleInput' name='middleInput'>
						<?php endif;?>
					<?php else: ?>
						<a class='btn btn-info' href='/project/getMiddleFile/<?=$middleDoc["idx"]?>' target='blink'>다운로드</a>
						<?php if((!$isEnd) && array_search($viewerIdx, $membersIdx) !== false) : ?>
						 | <span class='glyphicon glyphicon-remove removeMiddle' value='<?=$middleDoc["idx"]?>'></span>
						<?php endif; ?>
					<?php endif;?>
				</div>
			</div>
		<?php endif;?>
		<div class='col-sm-4 contentItem'>
			<label class='txtUnderLn'>완료문서</label>
			<div >
				<?php if(empty($endDoc)) : ?>
					파일이 없습니다. 
					<?php if((!$isEnd) && array_search($viewerIdx, $membersIdx) !== false) : ?>
						<a class='btn btn-default endUp'>업로드</a>
						<input type='file' class='fileUp' id='endInput' name='endInput'>
					<?php endif;?>
				<?php else: ?>
					<a class='btn btn-info' href='/project/getEndFile/<?=$endDoc["idx"]?>' target='blink'>다운로드</a>
					<?php if((!$isEnd) && array_search($viewerIdx, $membersIdx) !== false) : ?>
					 | <span class='glyphicon glyphicon-remove removeEnd' value='<?=$endDoc["idx"]?>'></span>
					<?php endif;?>
				<?php endif;?>
			</div>
		</div>
		<?php if((!$isEnd) && array_search($viewerIdx, $membersIdx) !== false) : ?>
		<div class='col-xs-12'>
			<p>파일은 1개 밖에 업로드 안됩니다. 여러 개 일 경우 압축하여 올리세요. [최대 8MB]</p>
		</div>
		<?php endif; ?>
	</article>
</section>
<section class='modal fade' id="addMemberModal">
	<section class='modal-dialog'>
		<article class='modal-content'>
			<div class='modal-header'>
				<h3>팀원 추가</h3>
			</div>
			<div class='modal-body'>
				<div class='container-fluid'>
					<div class='col-md-8 col-xs-12 memberListSec'>
						<label>회원리스트</label>
						<form id='addForm'>
						<select class='form-control' id='members' name='members[]' size='10'  multiple="">
							
						</select>
						</form>
					</div>

				</div>
			</div>
			<div class='modal-footer'>
				<a class='btn btn-primary addMemberBtn'>등록</a>
				<a class='btn btn-danger' data-dismiss='modal'>취소</a> 
			</div>
		</article>
	</section>
</section>
<script>

	$('.startUp').click(function(){
		$('#startInput').click();
	});
	$('.middleUp').click(function(){
		$('#middleInput').click();
	});
	$('.endUp').click(function(){
		$('#endInput').click();
	});
	$('#startInput').change(function(){
		var file = this.files;
		uploadAjax("/project/uploadStart",file[0]);
	});
	$('#middleInput').change(function(){
		var file = this.files;
		uploadAjax("/project/uploadMiddle",file[0]);
	});
	$('#endInput').change(function(){
		var file = this.files;
		uploadAjax("/project/uploadEnd", file[0]);
	});
	function uploadAjax(urlStr, file){
		console.log("file : ", file);
		var formObj = new FormData();
		formObj.append("file", file);
		formObj.append("proIdx", <?=$prInfo['idx']?>);
		$.ajax({
			url : urlStr,
			dataType : "json",
			type : 'post',
			contentType :false,
			processData: false, 
			data : formObj,
			success : function(data){
				if(data.code == 200){
					alert("파일을 업로드하였습니다!");
					document.location.reload();
				}else alert("Fail! ErrorCode : "+data.code);
			}
		})
	}
	$('.removeStart').click(function(){
		var idx = $(this).attr('value');
		removeAjax("/project/removeStart/"+idx);
	});
	$('.removeMiddle').click(function(){
		var idx = $(this).attr('value');
		removeAjax("/project/removeMiddle/"+idx);
	});
	$('.removeEnd').click(function(){
		var idx = $(this).attr('value');
		removeAjax("/project/removeEnd/"+idx);
	});
	function removeAjax(urlStr){
		$.ajax({
			url : urlStr,
			dataType : "json",
			success :function(data){
				if(data.code == 200){
					document.location.reload();
				}else alert("Fail ErrorCode : "+data.code);
			}
		});
	}
	$('.removeBtn').click(function(){
		var thisObj = $(this);
		var itemObj = thisObj.parent();
		var formObj = itemObj.find(".memberForm");

		$.ajax({
			url : '/project/removeMember',
			type : 'post',
			dataType : 'json',
			data : formObj.serialize(),
			success : function(data){
				if(data.code == 200){
					itemObj.remove();
				}else alert("Fail! ErrorCode : "+data.code);
			}
		});
	});

	$('.callModalBtn').click(function(){ $('#addMemberModal').modal('show');});
	$('#addMemberModal').on("show.bs.modal", function(){
		//alert("Call");
		$.ajax({
			url: "/project/getMember",
			type : 'post',
			dataType : 'json',
			success : function(data){
				if(data.code == 200){
					var target = $('#members');
					var list = data.list;
					var tag;
					for(var idx = 0; idx<list.length; idx++){
						var row = list[idx];
						tag = "<option value='"+row.idx+"'>"+row.name+"</option>";
						target.append(tag);
					}
				}else alert("Can't load Member! err Code : "+data.code);
			}
		});
	});
	$('#addMemberModal').on("hide.bs.modal", function(){
		$('#members').empty();
	});
	$('.addMemberBtn').click(function(){
		$.ajax({
			url : '/project/addMembers',
			type : 'post',
			dataType : 'json',
			data : $('#addForm').serialize()+"&prIdx="+<?=$prInfo['idx']?>,
			success : function(data){
				if(data.code == 200){
					alert("팀원 추가를 성공하였습니다!");
					$('#addMemberModal').modal("hide");
					document.location.reload();
				}
			}
		});
	});
	$('.members').on("mouseenter", function(){
		var target = $(this).find(".removeBtn");
		target.show();
	});
	$('.members').on("mouseleave", function(){
		var target = $(this).find(".removeBtn");
		target.hide();
	});

</script>