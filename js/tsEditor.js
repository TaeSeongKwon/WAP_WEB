function initTSEditor(obj){
	if(obj.useUpload == null){
		obj.useUpload = true; 
	}
	var targetObj = $('#'+obj.targetId);
	var editorObj = $("<div id='tsEditor'></div>");
	var formObj	 = 		$("<form name='tsForm'></form>")
	var	inputObj = 			$("<input type='hidden' name='tsText' id='tsText'>");

	var	menuBar = 		$("<div id='tsMenuBar'></div>");
	var toolBox = 			$("<div class='tsToolBox'></div>");
	var boldBtn = 				$("<button id='boldBtn' class='tsMenuItem'>B</button>");
	var fileBtn	= 				$("<button id='fileUpBtn' class='tsMenuItem'>file</button>");
			
	var mainObj = 		$("<div id='tsMain' contenteditable></div>");

	var fileUpObj =		$("<div id='tsFileUp'></div>");
	var fileUpHead = 		$("<div id='tsFileUpHead'></div>");
	var	fuheadTitle = 			$("<label>File Upload</label>");
			
	var fuMain = 			$("<div id='tsFileUpMain'></div>");
	var fuDragSec =				$("<div id='tsFileDragSec'></div>");
	
	fuMain.append(fuDragSec);
	fileUpHead.append(fuheadTitle);
	fileUpObj.append(fileUpHead);
	fileUpObj.append(fuMain);

	toolBox.append(boldBtn);
	menuBar.append(toolBox);
	formObj.append(inputObj);
	editorObj.append(formObj);
	editorObj.append(menuBar);
	editorObj.append(mainObj);

	if(obj.useUpload == true){
		toolBox.append(fileBtn);
		editorObj.append(fileUpObj);
		fileBtn.click(fuBtnEvent);
		fuDragSec.on('dragenter', dragEnterEvent);
		fuDragSec.on('dragover', dragOverEvent);
		fuDragSec.on('drop', fileDropEvent);
	}

	boldBtn.click(boldBtnEvent);

	function fuBtnEvent(){
		$('#tsMain').toggleClass('upMode');
		$('#tsFileUp').toggleClass('show');
	};
	function boldBtnEvent(){
		sFormmat("bold");
	};

	function dragEnterEvent(e){
		e.preventDefault();
		e.stopPropagation();
		$(this).css('border','silver dotted 3px');
	};
	function dragOverEvent(e){
		e.preventDefault();
		e.stopPropagation();
	};

	function fileDropEvent(e){
		e.stopPropagation();
			e.preventDefault();
		$(this).css('border','silver 2px solid');
		var files = e.originalEvent.dataTransfer.files;
		realFiles = files;
		 for(var idx = 0; idx<files.length; idx++){

		 	var file = files[idx];
		 	var fileList = $("<div class='fileList'></div>");
			var fileName = ("<div class='fileName fileElement' >"+file.name+"</div>");
			var fileSize = ("<div class='fileSize fileElement'>"+file.size+" Byte</div>");
			var fileButton = ("<div class='fileButton fileElement'><a></a></div>");
			fileList.append(fileName);
			fileList.append(fileSize);
			fileList.append(fileButton);
			$(this).append(fileList);
		}	
	};

	targetObj.append(editorObj);
	var realFiles;
	function getText(){
		var txt = $('#tsMain').html();
		$('#tsText').val(txt);

		return document.tsForm.tsText.value;
	}
	
	function sFormmat(str){document.execCommand(str);}
	this.setText = function(str){
		mainObj.append(str);
	}
	this.getNormalText = function(){
		var main = getText();
		main = main.replace(/<(\/)?([a-zA-Z]*)(\\s[a-zA-Z]*=[^>]*)?(\\s)*(\/)?>/gi, "");
		main = main.trim();
		main = main.replace(/&nbsp;/gi, "");
		main = main.replace(/ /gi, "");
		return main;
	}
	this.getHtmlText =function(){
		return getText();
	}
	this.getUploadFile = function(){
		return realFiles;
	}	
}