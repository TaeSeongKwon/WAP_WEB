OK = 200;
FAIL = 400;

var app = angular.module("libraryApp", []);
app.controller("appController", function($scope, $http){
	$scope.menuSelect = 1;
});
app.controller("lentController", function($scope, $http){
	$scope.bookCode = "";

	$scope.blurEvent = function(){
		console.log("blurEvent");
		var codeInput = document.getElementById("codeInput");
		codeInput.focus(true);
	}
	$scope.codeInputEvent = function(e){
		console.log("event : ", );
		if(e.key=="Enter"){
			$scope.bookCode = korTypeToEng(e.target.value);
			$scope.bookCode = $scope.bookCode.toUpperCase();
			console.log("code : ", $scope.bookCode);
			e.target.value = "";
			$scope.submitLent();
		}
	}
	$scope.submitLent = function(){
		var requestData = {
			"bookCode" 		: 		$scope.bookCode,
			"lentDate"		: 		new Date().getTime()
		}
		$http.post("/library/lentBook", requestData).then(
			(res) => {
				var resData = res.data;
				if(resData["statusCode"] == OK){
					alert(resData["statusText"]);
				}else {
					alert(resData["statusText"]);
				}
			},
			(err) => {

			}
		);
	}
	$scope.init = function(){
		console.log("init");
		var codeInput = document.getElementById("codeInput");
		codeInput.focus(true);
	}

});

app.controller("returnController", function($scope, $http){
	$scope.bookCode = "";

	$scope.blurEvent = function(){
		console.log("blurEvent");
		var codeInput = document.getElementById("codeInput");
		codeInput.focus(true);
	}
	$scope.codeInputEvent = function(e){
		console.log("event : ", );
		if(e.key=="Enter"){
			$scope.bookCode = korTypeToEng(e.target.value);
			$scope.bookCode = $scope.bookCode.toUpperCase();
			console.log("code : ", $scope.bookCode);
			e.target.value = "";
			$scope.submitReturn();
		}
	}
	$scope.submitReturn = function(){
		var requestData = {
			"bookCode" 			: 		$scope.bookCode,
			"returnDate"		: 		new Date().getTime()
		}
		$http.post("/library/returnBook", requestData).then(
			(res) => {
				var resData = res.data;
				if(resData["statusCode"] == OK){
					alert(resData["statusText"]);
				}else {
					alert(resData["statusText"]);
				}
			},
			(err) => {

			}
		);
	}
	$scope.init = function(){
		console.log("returnInit");
		var codeInput = document.getElementById("codeInput");
		codeInput.focus(true);
	}

});
app.controller("infoController", function($scope, $http){
	$scope.lentList = [];
	$scope.init = function(){
		console.log("MyInfoController");
		$http.get("/library/getMyInfo").then(
			(res) => {
				var response = res.data;
				if(response.statusCode == OK){
					$scope.lentList = response.lentList;
				}else{
					alert(response.statusText);
				}
			},
			(err) => {
				alert("회원님의 정보를 불러오지 못했습니다. 관리자에게 문의하세요.");
			}	
		);
	}
});
app.controller("searchController", function($scope, $http){
	$scope.resultList = [];
	$scope.init = function(){
		$scope.all();

	}
	$scope.searchEvent = function(e){
		if(e.key == "Enter"){
			$scope.clickSearch();
		}
	}
	$scope.clickSearch = function(){
		console.log($scope.keyword);	
		var req = $http.get("/library/search?keyword="+$scope.keyword).then(
				(res) => {
					console.log("res : ", res);
					if(res.status == 200){
						$scope.resultList = res.data;
					//	$scope.$apply();
					}
				},
				(error) => {
					alert("검색 중 오류가 발생하였습니다. 관리자에게 문의하세요");
				}
			);
	}
	$scope.all = function(){
		var keyword = "";
		$http.get("/library/search?keyword="+keyword).then(
			(res) => {
				console.log("res : ", res);
				if(res.status == 200){
					$scope.resultList = res.data;
				//	$scope.$apply();
				}
			},
			(error) => {

			}
		);
	}
});