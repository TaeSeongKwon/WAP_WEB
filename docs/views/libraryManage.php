		<style>
		
			#mainSection{
				/*margin-top: 30px;*/
				margin-bottom: 50px;
				padding: 10px;
				background-color: white;
			}
			#resultSection{
				margin-top: 10px;
			}
			.table_header{
				background-color: #3ABDCC;
				text-align: center;
				border-top-left-radius: 5px;
    			border-top-right-radius: 5px;
    			margin: 0px !important;
			}
			.table_header *{
				height: 30px;
    			line-height: 30px;
    			font-size: medium;
			}
			.table_row{
				background-color: white;
				border-bottom : silver 1px solid;
				cursor : pointer;
				margin: 0px !important;
			}
			.table_row div{
				height : 40px;
				line-height: 40px;
				text-align: center;
			}
			.table_row:hover{
				background-color: rgba(192,192,192,0.3);
			}
			.reverse{
				background-color: rgba(220,220,220,0.3);
			}
			.input-row{
				margin-bottom: 10px;
			}
			#pInputSec input{
				text-align: center;
			}
			.main_div *{
				position: static !important;
			}
			tbody>tr>td{
				vertical-align: middle !important;
			}
		</style>
		<section id="mainSection" ng-app="myApp" ng-controller="mainController" ng-init="init()">
			<article class="container-fluid main_div">
				<h3>도서대여 정책
					<a class="glyphicon glyphicon-cog btn btn-link text-right" style="float:right;" ng-if="!policyFlag" ng-click="editPolicy()"></a>
					<a class="glyphicon glyphicon-remove btn btn-link text-right" style="float:right;" ng-if="policyFlag" ng-click="cancelEditPolicy()"></a>
					<a class="glyphicon glyphicon-ok btn btn-link text-right" style="float:right;" ng-if="policyFlag" ng-click="savePolicy()"></a>
				</h3>
				<p><mark style="margin-bottom:5px;" ng-if="policy.lent_day==null">대여에 관한 정책이 없습니다. 설정하세요.</mark></p>
				
				<article class="row" id="pInputSec">
					<div class="col-sm-4">
						<div class="input-group ">
							<span class="input-group-addon">대여일수</span>
							<input type="number" id="lendDay" min="1" ng-model="policy.lent_day" readonly class="form-control">
						</div>
					</div>
					<div class="col-sm-4">
						<div class="input-group">
							<span class="input-group-addon">연장일수</span>
							<input type="number" id="extendDay" min="0" ng-model="policy.extend_day" readonly class="form-control">
						</div>
					</div>
					<div class="col-sm-4">
						<div class="input-group">
							<span class="input-group-addon">연장횟수</span>
							<input type="number" id="extendCnt" min="0" ng-model="policy.extend_cnt" readonly class="form-control">
						</div>
					</div>
				</article>
				<hr>
			</article>
			<article class="container-fluid main_div">
				<h3>도서목록<a class='btn btn-info' style='float:right;' ng-click="openModal()">도서등록</a></h3>

				<div id="resultSection">
					<table class="table table-striped">
						<thead>
							<th class="text-center">도서번호</th>
							<th class="text-center">이름</th>
							<th class="hidden-xs text-center">저자</th>
							<th class="text-center"></th>
						</thead>
						<tbody>
							<tr ng-repeat="(idx, tuple) in bookList" >
								<td class="text-center">{{tuple.num}}</td>
								<td ng-click="editBook(idx)">
									<a href="#">{{tuple.name}}</a>   <span class="label label-info" ng-if="!tuple.barcode">코드X</span>
								</td>
								<td class="text-center">{{tuple.author}}</td>
								<td class="text-center">
									<a class="btn btn-success" ng-if="tuple.is_use==1" ng-click="unuseBook(idx)">사용</a>
									<a class="btn btn-danger" ng-if="tuple.is_use==0" ng-click="useBook(idx)">폐기</a>
								</td>
							</tr>
						</tbody>
					</table>
					<!-- <div class='table_header row'>
						<div class='table_cell col-sm-1 col-xs-3'>
							도서번호
						</div>
						<div class='table_cell col-xs-8'>
							이름
						</div>
						<div class='table_cell col-sm-2 hidden-xs'>
							저자
						</div>
						<div class='table_cell col-xs-1'>
							
						</div>
					</div>
					<div ng-repeat="(idx, tuple) in bookList" class="table_row row" ng-class-odd="'reverse'" >
						<div class='table_cell col-sm-1 col-xs-3'>
							{{tuple.num}}
						</div>
						<div class='table_cell col-sm-8 col-xs-8' ng-click="editBook(idx)" style="text-align:left;">
							<p ><a>{{tuple.name}}</a>   <span class="label label-info" ng-if="!tuple.barcode">코드X</span><p>
						</div>
						<div class='table_cell col-sm-2 hidden-xs'>
							{{tuple.author}}
						</div>
						<div class="table_cell col-xs-1">
							<a class="btn btn-success" ng-if="tuple.is_use==1" ng-click="unuseBook(idx)">사용</a>
							<a class="btn btn-danger" ng-if="tuple.is_use==0" ng-click="useBook(idx)">폐기</a>
						</div>
					</div> -->
				</div>
			</article>
			<script type="text/ng-template" id="eidtModal.html">
				<section class="modal-header" ng-init="init()">
					<h3>도서정보</h3>
				</section>
				<section class="modal-body">
					<article class="container-fluid">
						<div class="input-group input-row">
							<span class="input-group-addon ">도서번호</span>
							<input type="text" ng-model="bookInfo.num" class="form-control" readonly >
						</div>
						<div class="input-group input-row">
							<span class="input-group-addon">도서이름</span>
							<input type="text" ng-model="bookInfo.name" class="form-control">
						</div>
						<div class="input-group input-row">
							<span class="input-group-addon">저자이름</span>
							<input type="text" ng-model="bookInfo.author" class="form-control">
						</div>
						<div class="input-group input-row">
							<span class="input-group-addon">출판회사</span>
							<input type="text" ng-model="bookInfo.publish" class="form-control">
						</div>
						<div class="row">
							<div class="col-xs-12">
								<div class="caption">
									<h3>바코드 이미지</h3>
									<p><mark ng-if="bookInfo.barcode==''" >현재 바코드가 저장되지 않았습니다. 저장바랍니다.</mark></p>
								</div>
								<a class="thumbnail" >
									<img id="codeImgNot" ng-if="bookInfo.barcode==''" src="/library/set_barcode/{{bookInfo.num}}">
									<img id="codeImgExt" ng-if="bookInfo.barcode"	src="{{bookInfo.barcode}}">
								</a>
							</div>
						</div>
					</article>
				</section>
				<section class="modal-footer">
					<div ng-if="bookInfo.barcode==''">
						<a class="btn btn-info" ng-click="saveCode()">저장하기</a>
					</div>
					<div ng-if="bookInfo.barcode">
						<a class="btn btn-primary" ng-click="saveInfo()">저장</a>
						<a class="btn btn-danger" ng-click="cancelInfo()">취소</a>
					</div>
				</section>
			</script>
				
			<script type="text/ng-template" id="regModal.html">
				<section class="modal-header" ng-init="modalInit()">
					<h3 id="modal-title">도서등록</h3>
				</section>
				<section class="modal-body" id="modal-body">
					<article class="container-fluid">
						<form name="insertForm">
						<div class="input-group input-row">
							<span class="input-group-addon">분류 선택</span>
							<select ng-model="category" class="form-control" ng-change="selectCategory()">
								<option ng-repeat="(idx, data) in list" value="{{data.idx}}">({{data.initial}}){{data.name}}</option>
							</select>
						</div>
						<p class="lead">{{serialStr}}</p>
						<div class="input-group input-row">
							<span class="input-group-addon">고유번호</span>
							<input type="text" name="serialNum" id="serialNum" ng-model="serialNum" ng-minlength="3" required class="form-control" placeholder="일련번호 입력 ex. 00X">
						</div>
						<div class="input-group input-row">
							<span class="input-group-addon">도서이름</span>
							<input type="text" ng-model="bookName" ng-minlength="1" required class="form-control" placeholder="도서이름을 입력하세요.">
						</div>
						<div class="input-group input-row">
							<span class="input-group-addon">저자이름</span>
							<input type="text" ng-model="authorName" ng-minlength="2" required class="form-control" placeholder="저자 이름을 입력하세요.">
						</div>
						<div class="input-group input-row">
							<span class="input-group-addon">출판회사</span>
							<input type="text" ng-model="publishCorp" ng-minlength="1" required class="form-control" placeholder="출판사를 입력하세요.">
						</div>
						</form>
						<div class="row">
							<div class="col-xs-12">
								<a class="thumbnail" >
									<img id="barcodeImage" src="/library/set_barcode/{{list[category-1].initial}}{{serialNum}}">
								</a>
								<div class="caption">
									<h3>바코드 이미지</h3>
								</div>
							</div>
						</div>
					</article>
				</section>
				<section class="modal-footer">
					<a class="btn btn-primary" ng-click="reqRegist()">등록</a>
					<a class="btn btn-danger" ng-click="cancelReg()">취소</a>
				</section>
			</script>
		</section>
		
	</body>
</html>