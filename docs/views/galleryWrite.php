<style type='text/css'>
	
	.mainSec{
		min-height :100%;

	}
	/*#editor{
		height : 550px;
	}*/
	.mainSecCenter{
		float : none;
		min-height :inherit;
	}
	.btnSec{
		margin : 10px 0px;
	}
	#main{
		height:200px;
	}
	#main.drag{
		border : 5px dotted silver;

	}
	.upImage {
		height:200px;
	}
	.upImage img{
		width:100%;
		height:100%;
	}
	.upCancel{
		position: absolute;
		right: 7px;
		top: 7px;
		font-size: large;
		text-decoration: none;
	}
	.upCancel:hover{
		text-decoration: none;	
	}
</style>

<section class='container mainBody'>
	<article class='row titleSec'>
		<div class='col-xs-12'>
			<strong><h3>갤러리 등록</h3></strong>
		</div>
	</article>
	<hr>
	<article class='row mainSec'>
		<div class='col-sm-11 container mainSecCenter' >
			<label>제목</label>
			<form name='writeForm' id='writeForm'>
				<!-- <input type='file' mutiple name='userFile' id='userFile' style='display:none;'> -->
				
				<input type='hidden' name='type' id='type' value='<?=$type?>'>
				<div class='form-group'>
					<input type='text' name='title' class='form-control' placeholder='제목을 입력하여 주세요'>
				</div>
				<div style='margin-bottom:15px;'>
					<label>이미지를 드래그하거나 선택하여 주세요</label>
					<a class='btn btn-warning findBtn' style='float:right;'>사진 찾기</a>
				</div>
				<div id='editor' class='form-group'>
					<input type='file' multiple class='hiddenUp' name='imgFind' style="display:none;">
					<textarea name='main' id='main' class='form-control' placeholder='여기에 이미지를 드래그하거나 내용을 입력하여 주세요'></textarea>
				</div>
			</form>
			<div class='text-right btnSec'>
				<a class='btn btn-primary uploadBtn'>업로드</a>
				<a class='btn btn-danger' href='/gallery'>취소</a>
			</div>
			<div class="">
				<div class='upSecHead'>
					<label>이미지 업로드</label>
				</div>
				<div class='imageViewSec row'>
						
				</div>
			</div>
		</div>
		
	</article>
	
</section>

<script>
	$('#main').on('dragenter', function(e){
		e.preventDefault();
		e.stopPropagation();
		$(this).addClass('drag');
		$(this).attr('placeholder', '여기에 이미지를 놓으세요');
	});
	$('#main').on('dragover', function(e){
		e.preventDefault();
		e.stopPropagation();
	});
	var fileList = [];
	var idxList = [];
	var totalCnt = 0;
	$('#main').on('drop', function(e){
		e.preventDefault();
		e.stopPropagation();
		$(this).removeClass('drag');
		$(this).attr('placeholder', '여기에 이미지를 드래그하거나 내용을 입력하여 주세요');
		var files =e.originalEvent.dataTransfer.files;
		imgFileProccess(files);
			
	});
	$('.findBtn').click(function(){
		$('.hiddenUp').click();
	});
	$('.hiddenUp').on('change', function(e){
		// e.preventDefault();
		// e.stopPropagation();
		// var files = e.originalEvent.dataTransfer.files;
		var files = document.writeForm.imgFind.files;
		imgFileProccess(files);
	});
	function imgFileProccess(files){
		console.log('data', files);
		var target = $('.imageViewSec');
		for(var idx = 0; idx < files.length; idx++){
			var file = files[idx];
			var point = file.name.lastIndexOf(".");
			var ext  = file.name.substring(point+1,files[idx].length); 
			console.log("ext : ", ext);
			ext = ext.toLowerCase();
			if(ext != "jpg" && ext !='jpeg'&& ext != 'png' && ext != 'gif' && ext != 'bmp'){
				alert("Can't Upload file!");
				return;
			}

		}
		
		for(var idx = 0; idx < files.length; idx++){
			var reader = new FileReader();
			var base64 = "";
			var cnt = fileList.length;

			fileList[cnt] =files[idx];
			

			reader.onload  = function(e){
				var idxCnt = idxList.length;
				idxList[idxCnt] = totalCnt++;	
				base64 = e.target.result;
				var divTag = $("<div class='col-md-4 col-sm-6 thumbnail upImage'></div>");
				var idxTag = $("<input type='hidden' class='upImageIdx' value='"+(totalCnt-1)+"'>");
				var cancel = $("<a class='glyphicon glyphicon-remove upCancel' href='javascript:;'></a>");
				var imgTag = $("<img src='"+base64+"' >");
				cancel.click(upCancelEvent);
				divTag.append(idxTag);
				divTag.append(cancel);
				divTag.append(imgTag);
				target.append(divTag);

			}
			reader.readAsDataURL( files[idx] );
		}
	}
	function upCancelEvent(){
		var target = $(this).parent();
		var idx = target.find(".upImageIdx").val();
		console.log("idx : ", idx);
		var realIdx = idxList.indexOf(Number(idx));
		console.log("reaIdx : ", realIdx);
		fileList.splice(realIdx, 1);
		idxList.splice(realIdx, 1);
		target.remove();
	}


	$('.uploadBtn').click(function(){
		var title = document.writeForm.title.value;
		var main = document.writeForm.main.value;
		title = title.trim();
		main = main.trim();
		if(title == ""){
			alert("제목을 입력하세요");
			return;
		}
		if(main == ""){
			alert("내용을 입력하세요");
			return;
		}
		if(fileList.length == 0 || idxList.length == 0 || idxList.length != fileList.length){
			alert("이미지를 업로드 하시지 않았습니다!");
			return ;
		}
		var realTitle = document.writeForm.title.value;
		var realMain = document.writeForm.main.value;

		var formData = new FormData();
		formData.append("title", realTitle);
		formData.append("main", realMain);
		formData.append("fileCnt", fileList.length);
		for(var idx = 0; idx<fileList.length; idx++)
			formData.append("file_"+idx, fileList[idx]);

		$("body").faLoading();
		$.ajax({
			url : '/gallery/upload',
			dataType : 'json',
			type : 'post',
			contentType :false,
			processData: false, 
			data : formData,
			success : function(data){
				if(data.code == 200){
					document.location.href='/gallery';
				}else alert("Fail! Error Code : "+data.code);
				$("body").faLoading();
			}
		})
	});
</script>
