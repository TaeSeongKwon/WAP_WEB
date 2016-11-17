<style type='text/css'>

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
			<strong><h3>BoardEdit</h3></strong>
		</div>
	</article>
	<hr>
	<article class='row mainSec'>
		<div class='col-sm-11 container mainSecCenter' >
			<label>Subject</label>
			<form name='editForm' id='editForm'>
				<!-- <input type='file' mutiple name='userFile' id='userFile' style='display:none;'> -->
				<input type='hidden' name='main' id='main'>
				<input type='hidden' name='type' id='type' value='<?=$type?>'>
				<input type='hidden' name='idx' id='idx' value='<?=$idx?>'>
				<div class='form-group'>
					<input type='text' name='title' class='form-control' placeholder='Please Input Title' value='<?=$mainData["title"]?>'>
				</div>
			</form>
			<div id='editor'>
				
			</div>
			<div class='text-right btnSec'>
				<a class='btn btn-primary editBtn'>Edit</a>
				<a class='btn btn-danger' href='/board/view/<?=$type?>/<?=$idx?>'>Cancel</a>
			</div>
		</div>
		
	</article>
	
</section>

<script>
	var data = {
		targetId : "editor"
	};
	var obj = new initTSEditor(data);
	obj.setText("<?=$mainData['main']?>");
	$('.editBtn').click(function(){
		var title = document.editForm.title.value;
		var main = obj.getNormalText();
		var realMain = obj.getHtmlText();
		var realTitle = document.editForm.title.value;
		var boardType = document.editForm.type.value;
		var fileList = obj.getUploadFile();
		var idx = document.editForm.idx.value;
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
		
		if(main == ""){
			alert("Please Input Main");
			return ;
		}
		var formData = new FormData();
		formData.append('title', realTitle);
		formData.append('main', realMain);
		if(fileList != null){
			formData.append('fileCnt', fileList.length);
			for(var idx = 1; idx<=fileList.length; idx++)
				formData.append('file_'+idx, fileList[idx-1]);
		}

		$.ajax({
			url : '/board/editBoard/'+boardType+'/'+idx, 
			dataType : 'json', 
			type : 'post', 
			data : formData, 
			processData: false, 
	    			contentType: false, 
			success : function(data){ 
				if(data.code == 200 && data.fileCode <= 201)
					document.location.href = data.redirect;
				else alert("Fail! ErrorCode -> C : "+data.code+" / F : "+data.fileCode);
			}
		});
	})
</script>
