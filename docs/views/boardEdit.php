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
	<strong><h3>게시글 수</h3></strong>
	<hr>	
</section>
<section class="container">
	<form name='editForm' id='editForm'>
		<!-- <input type='file' mutiple name='userFile' id='userFile' style='display:none;'> -->
		<input type='hidden' name='main' id='main'>
		<input type='hidden' name='type' id='type' value='<?=$type?>'>
		<input type='hidden' name='idx' id='idx' value='<?=$idx?>'>
		<div class="input-group">
			<span class="input-group-addon">제목</span>
			<input type='text' name='title' class='form-control' placeholder='제목을 입력하세요' value='<?=$mainData["title"]?>'>
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
		<a class='btn btn-primary editBtn'>수정</a>
		<a class='btn btn-danger' href='/board/view/<?=$type?>/<?=$idx?>'>취소</a>
	</article>
</section>

<script>
	$("#contents").summernote({
		"height"	: 	400,
		"lang"		: 	"ko-KR"
	});
	$("#contents").summernote("code", "<?=$mainData['main']?>");
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
	$('.editBtn').click(function(){
		var title = document.editForm.title.value;
		var realTitle = document.editForm.title.value;
		var boardType = document.editForm.type.value;
		var idx = document.editForm.idx.value;
		var fileList = $("#fileInput")[0].files;
		

		title = title.trim();
		
		if(title == ""){
			alert("Please Input Title");
			return ;
		}

		// main = main.replace(/<(\/)?([a-zA-Z]*)(\\s[a-zA-Z]*=[^>]*)?(\\s)*(\/)?>/gi, "");
		// main = main.trim();
		// main = main.replace(/&nbsp;/gi, "");
		// main = main.replace(/ /gi, "");
		console.log("text : ", main);
		
		if($("#contents").summernote("isEmpty")){
			alert("내용을 입력하세요");
			return ;
		}

		var formData = new FormData();
		formData.append('title', realTitle);
		formData.append('main', $("#contents").summernote("code"));
		if(fileList != null){
			formData.append('fileCnt', fileList.length);
			for(var fileIdx = 1; fileIdx<=fileList.length; fileIdx++)
				formData.append('file_'+fileIdx, fileList[fileIdx-1]);
		}

		$.ajax({
			url : '/board/editBoard/'+boardType+'/'+idx, 
			dataType : 'json', 
			type : 'post', 
			data : formData, 
			processData: false, 
	    	contentType: false, 
			success : function(data){ 
				console.log("data : ", data["code"]);
				if(Number(data.code) == 200 && (data.fileCode == undefined || Number(data.fileCode) <= 201))
					document.location.href = data.redirect;
				else alert("Fail! ErrorCode -> C : "+data.code+" / F : "+data.fileCode);
			}
		});
	})
</script>
