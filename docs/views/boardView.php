<style type='text/css'>

	.textHeader, .textBody{
		margin-bottom : 20px;
	}
</style>

<section class='container mainBody'>
	<article class='row'>
		<div class='col-xs-12'>
			<strong><h3><?=$boardMain['title']?></h3></strong>
			<h5><?=$boardMain['boardName']?></h5>
		</div>
	</article>
	<hr>
	<article class='row container'>
		<div class='col-xs-12 row' style='height:100%;'>
			<div class="col-xs-12 textHeader">
				<span style='float:left;'><?=$boardMain['name']?></span>
				<span style='float:right;'><?=$boardMain['regDate']?></span>
			</div>
			<div class='col-xs-12 text-right' >
				<DIV><label>File<span class='caret'></span></label></DIV>
				<?php foreach($fileList as $i => $row) : ?>
				<div><a href='/board/file/<?=$row["idxOf"]?>/<?=$row["idx"]?>' target='blink'><?=$row['fileName']?></a></div>
				<?php endforeach; ?>

			</div>
			<div class='col-xs-12 textBody'>
				<?=$boardMain['main']?>

			</div>
			
			<div class='textFooter text-right'>
				<form name='boardMenuForm' id=''>
					<input type='hidden' name='idx' value='<?=$boardmain["idx"]?>'>
					<input type='hidden' name='boardType' value='<?=$boardmain["boardType"]?>'>
					<input type='hidden' name='page' value='<?=$boardmain["idx"]?>'>
					<a class='btn btn-info' href='/board/lists/<?=$type?>/'>목록</a>
				<?php if($boardMain['regIdx'] == $info['idx'] || $info['levelIdx'] == 1 ) : ?>
					<a class='btn btn-warning' href='/board/edit/<?=$type?>/<?=$idx?>'>수정</a>
					<a class='btn btn-danger' href='javascript:myConfirm();'>삭제</a>
				<?php endif;?>
				</form>
			</div>
		</div>
	
	</article>
	<hr>
	<article class='row container'>
		<div class='col-xs-12'>
			<form name='upCmtForm'  id='upCmtForm' >
				<input type='hidden' name='idxOf' value='<?=$boardMain['idx']?>'>
				<input type='hidden' name='typeOf' value='<?=$boardMain['boardType']?>'>

				<div class='form-group'>
					<input type='text' class='form-control' name='cmtMain' id='cmtMain' placeholder='댓글을 입력하세요'>
				</div>
				<a class='btn btn-primary' id='cmtBtn'>댓글 달기</a>
			</form>
		</div>
	</article>
	<hr>
	<article class='row container commentSec'>
		<?php foreach($cmtList as $i => $row) : ?>
			<div class='col-xs-12' style="border-bottom : 1px solid silver;">
				<p> <?=$row['name']?> | <?=$row['regDate']?></p>
				<p><?=$row['main']?></p>
			</div>
		<?php endforeach; ?>
	</article>
</section>

<script>
	function myConfirm(){
		if(confirm("해당 게시물을 삭제하시겠습니까?") != 0){
			document.location.href='/board/delete/<?=$type?>/<?=$idx?>';
		}
	}
	$('#cmtMain').keydown(function(e){
		
		if(e.which == 13){
			e.preventDefault();
			cmtUpEvent();
		}
	});
	$('#cmtBtn').click(function(){
		cmtUpEvent();
	});
	function cmtUpEvent(){
		var main = document.upCmtForm.cmtMain.value;
		main = main.trim();
		if(main == ""){
			alert("댓글을 입력하세요");
			return ;
		}
		$("body").faLoading();
		$.ajax({
			url : '/board/upComment',
			type : 'post',
			dataType : 'json',
			data : $('#upCmtForm').serialize(),
			success : function(data){
				if(data.code == 200){
					var result = data.result;
					var tag = "";
					tag += "<div class='col-xs-12' style='border-bottom : 1px solid silver;'>";
					tag +=	"<p>"+result.name+" | "+result.regDate+"</p>";
					tag +=	"<p>"+result.main+"</p>";
					tag += "</div>";
					$('.commentSec').prepend(tag);
					$('#cmtMain').val("");
				}else alert("Fail! ErrorCode : "+data.code);
				$("body").faLoading(false);
			}

		});
	}
</script>
