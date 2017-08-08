
<!-- style="position : relative;" -->

<style type='text/css'>
	
	.mainBody{
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
<section id="test"></section>
<script src="/lang/summernote-ko-KR.js"></script>
<section class='container'>
	<strong><h3>글 쓰기</h3></strong>
	<hr>	
</section>
<section class="container">
	<form name='writeForm' id='writeForm'>
		<!-- <input type='file' mutiple name='userFile' id='userFile' style='display:none;'> -->
		<input type='hidden' name='main' id='main'>
		<input type='hidden' name='type' id='type' value='<?=$type?>'>
		<div class="input-group">
			<span class="input-group-addon">제목</span>
			<input type='text' name='title' class='form-control' placeholder='제목을 입력하세요'>
		</div>
	</form>
</section>
<br>
<section class="container">
	<article>
		<a class="btn btn-warning btn-sm" id="fileSelectBtn">파일선택</a>
	</article>
	<input type="file" id="fileInput" multiple style="display:none;">
	<table class="table">
		<thead>
			<th>번호</th>
			<th>이름</th>
			<th>사이즈</th>
		</thead>
		<tbody id="fileInfoSec">
			
		</tbody>
	</table>
</section>
<br>
<section class="container">
	<article id="contents">
		
	</article>
</section>

<section class="container">
	<article class="text-right">
		<a class='btn btn-primary writeBtn'>등록</a>
		<a class='btn btn-danger' href='/board/lists/<?=$type?>'>취소</a>
	</article>
</section>


<script>
	$("#contents").summernote({
		"height"	: 	400,
		"lang"		: 	"ko-KR"
	});
	$("#contents").summernote("code", "<p><br></p>");
	
	$("#fileSelectBtn").click(() => {
		$("#fileInput").click();
	});
	$("#fileInput").change((e) => {
		var openTr = "<tr>";
		var closeTr = "</tr>";
		var openTd = "<td>";
		var closeTd = "</td>";

		var fileList = e.target.files;
		console.log("files : ", fileList);
		$("#fileInfoSec").empty();
		for(var idx = 0; idx<fileList.length; idx++){
			var fileName = fileList[idx]["name"];
			var fileSize = (fileList[idx]["size"] / (1024*1024)).toFixed(2);
			$("#fileInfoSec").append(openTr +openTd+(idx+1)+closeTd+openTd+fileName+closeTd+openTd+fileSize+" MB"+closeTd+closeTr );
		}
	});
	
	$('.writeBtn').click(function(){
		var title = document.writeForm.title.value;
		var realTitle = document.writeForm.title.value;
		var boardType = document.writeForm.type.value;
		var fileList = $("#fileInput")[0].files;
		title = title.trim();
		
		if(title == ""){
			alert("제목을 입력하세요");
			return ;
		}
		
		if($("#contents").summernote("isEmpty")){
			alert("내용을 입력하세요");
			return ;
		}

		var formData = new FormData();
		formData.append('title', realTitle);
		formData.append('main', $("#contents").summernote("code"));
		formData.append('type', boardType);

		if(fileList != null){
			formData.append('fileCnt', fileList.length);
			for(var idx = 1; idx<=fileList.length; idx++){
				console.log("file_"+idx, fileList[idx-1]);
				formData.append('file_'+idx, fileList[idx-1]);
			}
		}
		
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

