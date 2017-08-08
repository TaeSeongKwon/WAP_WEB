OK = 200;
FAIL = 400;

var app = angular.module("myApp", ["ui.bootstrap"]);
app.controller("mainController", function($scope, $http, $uibModal){
	$scope.bookList = [];
	$scope.policyFlag = false;
	$scope.policy = {
		"lent_day" 				: 			null,
		"extend_cnt" 			: 			null,
		"extend_day" 			: 			null,
		"reg_date" 				: 			null
	};

	$scope.getAllBook = function() {
		$http.get("/library/getAllBook").then(
			(res) => {
				if(res.status == 200){
					$scope.bookList = res.data["books"];
					
				}else{
					alert("Server ERROR! : "+res.status);
				}
			},
			(error) => {
				alert("불러오지 못했습니다. 관리자에게 문의하세요");
			}
		);
	}
	$scope.getPolicy = function(){
		$http.get("/library/getPolicy").then(
			(res) => {
				if(res.data.statusCode == OK){	
					$scope.policy["extend_day"] = Number(res.data["policy"]["extend_day"]);
					$scope.policy["extend_cnt"] = Number(res.data["policy"]["extend_cnt"]);
					$scope.policy["lent_day"] = Number(res.data["policy"]["lent_day"]);
					$scope.policy["reg_date"] = Number(res.data["policy"]["reg_date"]);
				}
			},
			(err) => {
				alert("불러오지 못했습니다. 관리자에게 문의하세요");
			}
		);
	}

	$scope.init = function(){
		console.log("list");
		$scope.getAllBook();
		$scope.getPolicy();
	}

	$scope.editBook = function(idx){
		$uibModal.open({
			"templateUrl"		: 		"eidtModal.html",
			"controller"		: 		"editController",
			"resolve"			: {
				"book"	: 	function(){
					return $scope.bookList[idx];
				}
			}
		});
		//alert("index : "+idx);
	}
	$scope.savePolicy = function(){
		var lendDay = angular.element("#lendDay");
		var extendDay = angular.element("#extendDay");
		var extendCnt = angular.element("#extendCnt");
		$scope.policy["reg_date"] = new Date().getTime();
		$http.post("/library/updatePolicy", $scope.policy).then(
			(res) => {
				if(res.data.statusCode == OK){
					alert("변경에 성공했습니다!");
				}else {
					$scope.getPolicy();
					alert("변경하지 못했습니다. 관리자에게 문의하세요");
				}
			},
			(err) => {
				alert("변경하지 못했습니다. 관리자에게 문의하세요");
			}
		);
		lendDay[0].readOnly = true;
		extendDay[0].readOnly = true;
		extendCnt[0].readOnly = true;
		$scope.cancelEditPolicy();
	}
	$scope.cancelEditPolicy = function(){
		var lendDay = angular.element("#lendDay");
		var extendDay = angular.element("#extendDay");
		var extendCnt = angular.element("#extendCnt");
		lendDay[0].readOnly = true;
		extendDay[0].readOnly = true;
		extendCnt[0].readOnly = true;
		$scope.policyFlag = false;
	}
	$scope.openModal = function(){
		$uibModal.open({
			"templateUrl"		: "regModal.html",
			"controller"		: "regController"
		});
	}
	$scope.unuseBook = function(idx){
		console.log("IDX : ", idx);
		var num = $scope.bookList[idx].num;
		$http.get("/library/disableBook?num="+num).then(
			(res) => {
				if(res.status == 200){
					if(res.data.isSuccess){
						$scope.bookList[idx].is_use = 0;				
					}else{
						alert("변경하는데 실패하였습니다..");
					}
				}else alert("변경하는데 실패했습니다.");
			},
			(error) => {
				alert("요청에 응답할 수 없습니다. 관리자에게 문의하십시요.");
			}
			);
	}

	$scope.useBook = function(idx){
		console.log("IDX : ", idx);
		
		var num = $scope.bookList[idx].num;
		$http.get("/library/usableBook?num="+num).then(
			(res) => {
				if(res.status == 200){
					if(res.data.isSuccess){
						$scope.bookList[idx].is_use = 1;				
					}else{
						alert("변경하는데 실패하였습니다..");
					}
				}else alert("변경하는데 실패했습니다.");
			},
			(error) => {
				alert("요청에 응답할 수 없습니다. 관리자에게 문의하십시요.");
			}
			);
	}

	$scope.editPolicy = function(){
		var lendDay = angular.element("#lendDay");
		var extendDay = angular.element("#extendDay");
		var extendCnt = angular.element("#extendCnt");

		lendDay[0].readOnly = false;
		extendDay[0].readOnly = false;
		extendCnt[0].readOnly = false;
		console.log(lendDay);
		$scope.policyFlag = true;

	}
	
});
app.controller("editController", function($scope, $uibModalInstance, $http, book){
	$scope.bookInfo = book;
	$scope.init = function(){
		console.log("bookInfo : ", $scope.bookInfo);
	}
	$scope.saveCode = function(){
		var canvas = document.createElement("canvas");
		var ctx = canvas.getContext("2d");
		var imageTag = document.getElementById("codeImgNot");
		canvas.width = imageTag.width;
		canvas.height = imageTag.height;
		ctx.drawImage(imageTag, 0, 0);
		console.log(canvas.toDataURL());
		var reqData = {
			"code"		: 		canvas.toDataURL(),
			"num"		: 		$scope.bookInfo.num
		};
		$http.post("/library/saveCode", reqData).then(
				(res) => {
					if(res.status == 200){
						if(res.data.isSuccess){
							$scope.bookInfo.barcode = canvas.toDataURL();
						}else{
							alert("코드를 저장하지 못했습니다.");
						}
					}else alert("코드를 저장하는데 실패했습니다.");
				},
				(err) => {
					alert("코드를 저장하는데 문제가 발생했습니다. 관리자에게 문의바랍니다.");
				}
			);
	}
	$scope.saveInfo = function(){
		var reqData = {
			"bookNum"			: 		$scope.bookInfo.num,
			"bookName"			: 		$scope.bookInfo.name,
			"bookAuthor"		: 		$scope.bookInfo.author,
			"bookPublish"		: 		$scope.bookInfo.publish,
		};

		$http.post("/library/editBook", reqData).then(
			(res) => {
				if(res.status == 200){	
					if(res.data.isSuccess){
						alert("정보를 업데이트했습니다.");
						$scope.bookInfo.name = reqData.bookName;
						$scope.bookInfo.author = reqData.bookAuthor;
						$scope.bookInfo.bookPublish = reqData.bookPublish;
						$uibModalInstance.close();
					}else{
						alert("정보를 업데이트하는데 실패했습니다.");
					}
				}else alert("정보를 업데이트하는데 실패했습니다. 관리자에게 문의하세요.");
			},
			(err) => {
				alert("정보를 업데이트할 수 없습니다. 관리자에게 문의하세요.");
			}
		)
	}
	$scope.cancelInfo = function(){
		$uibModalInstance.close();
	}
	console.log("BOOK : ", book);
});
app.controller("regController", function($scope,$uibModalInstance, $http){
	$scope.list = [];
	$scope.category = "";
	$scope.serialStr = "";
	console.log("$scope : ", $scope);
	$scope.modalInit = function(){
		console.log("init! : ", $scope.list);
		console.log("HTTP : ", $http);
		$http.get("/library/getCategorys").then(
			(res) => {
				console.log("RES : ", res);
				if(res.status == 200){
					$scope.list = res.data;
					console.log("Data : ", res.data);
				}
			},
			(err) => {
				alert("등록에 필요한 것을 구성하지 못했습니다! 관리자에게 문의하세요");
			});
	}
	$scope.cancelReg = function(){
		$uibModalInstance.close();
	}
	$scope.reqRegist = function(){
		console.log("data : ", $scope.category);
		console.log($uibModalInstance);
		var imageTag = document.getElementById("barcodeImage");
		var canvas = document.createElement("canvas");
		var ctx = canvas.getContext("2d");
		canvas.width = imageTag.width;
		canvas.height = imageTag.height;
		ctx.drawImage(imageTag, 0, 0);
		var base64Image = canvas.toDataURL();
		console.log("data : ", base64Image);
		var num = angular.element("#serialNum");
		console.log("num : ", num);
		// if(!$scope.serialNum.$vaild){
		// 	alert("도서번호를 입력하세요");
		// 	return ;
		// }
		// if(!$scope.bookName.$vaild){
		// 	alert("도서이름을 입력하세요");
		// 	return ;
		// }
		// if(!$scope.authorName.$vaild){
		// 	alert("저자이름 입력하세요");
		// 	return ;
		// }
		// if(!$scope.publishCorp.$vaild){
		// 	alert("출판사를 입력하세요");
		// 	return ;
		// }
		
		var pushData = {
			"bookSerial"	: $scope.list[$scope.category-1].initial+$scope.serialNum, 
			"categoryIdx"	: $scope.category,
			"bookName"		: $scope.bookName,
			"bookAuthor"	: $scope.authorName,
			"publishCorp"	: $scope.publishCorp,
			"base64Image"	: base64Image
		};
		$http.post("/library/insertBook", pushData).then(
			(res) => {
				if(res.status ==200){
					if(res.data.isSuccess){
						alert("도서등록에 성공하였습니다.");
						window.location.reload();
					}else{
						alert("도서등록에 실패하였습니다.");
					}
				}else{
					alert("도서등록에 실패하였습니다. 관리자에게 문의하세요.");
				}
			},
			(error) => {
				alert("도서등록을 할 수 없습니다. 관리자에게 문의하세요.");
			}
		);
		// $uibModalInstance.close();
	}
	$scope.selectCategory = function(){
		console.log("select Data : ", $scope.category);
		if($scope.category > 0){
			$http.get("/library/getCurrentSerialNum?category="+$scope.category).then(
				(res) => {
					console.log("res : ", res);
					if(res.status == 200){
						var data = res.data;
						var cName = $scope.list[$scope.category-1].name;
						if(data.size > 0){
							$scope.serialStr = "최근 "+cName+"에 등록된 도서번호 : "+data.book["num"];
						}else{
							$scope.serialStr = "현재 "+cName+"에 등록된 도서가 없습니다.";
						}
					}else{
						alert("에러가 발생하였습니다. 관리자에게 문의하세요.");
					}
				},
				(err) => {
					alert("에러가 발생하였습니다. 관리자에게 문의하세요. - 1");
				});
		}
	}
});
