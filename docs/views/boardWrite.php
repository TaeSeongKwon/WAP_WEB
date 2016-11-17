
<!-- style="position : relative;" -->
<style type='text/css'>
	
	.mainBody{
		border-left  : 1px solid silver;
		border-right  : 1px solid silver;
		padding-bottom:10%;
		min-height:100%;
		/*height:100%;*/
		background-color: #ffffff;
		/*box-shadow: 1px 1px 5px silver;*/
	}
	.mainSec{
		min-height :100%;

	}
	#editor{
		height : 550px;
	}
	.mainSecCenter{
		float : none;
		min-height :inherit;
	}
	.btnSec{
		margin : 10px 0px;
	}
</style>

<section class='container mainBody'>
	<article class='row titleSec'>
		<div class='col-xs-12'>
			<strong><h3>글 쓰기</h3></strong>
		</div>
	</article>
	<hr>
	<article class='row mainSec'>
		<div class='col-sm-11 container mainSecCenter' >
			<label>제목</label>
			<form name='writeForm' id='writeForm'>
				<!-- <input type='file' mutiple name='userFile' id='userFile' style='display:none;'> -->
				<input type='hidden' name='main' id='main'>
				<input type='hidden' name='type' id='type' value='<?=$type?>'>
				<div class='form-group'>
					<input type='text' name='title' class='form-control' placeholder='제목을 입력하세요'>
				</div>
			</form>
			<div id='editor'>
				
			</div>
			<div class='text-right btnSec'>
				<a class='btn btn-primary writeBtn'>등록</a>
				<a class='btn btn-danger' href='/board/lists/<?=$type?>'>취소</a>
			</div>
		</div>
		
	</article>
	
</section>

<script>
	var data = {
		targetId : "editor"
	};
	var obj = new initTSEditor(data);

	$('.writeBtn').click(function(){
		var title = document.writeForm.title.value;
		var main = obj.getNormalText();
		var realMain = obj.getHtmlText();
		var realTitle = document.writeForm.title.value;
		var boardType = document.writeForm.type.value;
		var fileList = obj.getUploadFile();
		title = title.trim();
		
		if(title == ""){
			alert("제목을 입력하세요");
			return ;
		}

		// main = main.replace(/<(\/)?([a-zA-Z]*)(\\s[a-zA-Z]*=[^>]*)?(\\s)*(\/)?>/gi, "");
		// main = main.trim();
		// main = main.replace(/&nbsp;/gi, "");
		// main = main.replace(/ /gi, "");
		console.log("text : ", main);
		
		if(main == ""){
			alert("내용을 입력하세요");
			return ;
		}
		var formData = new FormData();
		formData.append('title', realTitle);
		formData.append('main', realMain);
		formData.append('type', boardType);
		if(fileList != null){
			formData.append('fileCnt', fileList.length);
			for(var idx = 1; idx<=fileList.length; idx++)
				formData.append('file_'+idx, fileList[idx-1]);
		}
		// $("#group").faLoading();
		$("body").faLoading();
		$.ajax({
			url : '/board/uploadBoard', 
			dataType : 'json', 
			type : 'post', 
			data : formData, 
			processData: false, 
	    	contentType: false, 
			success : function(data){ 
				if(data.code == 200 && data.fileCode <= 201){
					document.location.href = data.redirect;
				}
				else alert("Fail! ErrorCode -> C : "+data.code+" / F : "+data.fileCode);
				$("body").faLoading(false);
			}
		});
	})
</script>
