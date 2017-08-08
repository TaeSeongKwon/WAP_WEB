		<style>
		
			#mainSection{
				margin-top: 30px;
				margin-bottom: 50px;
			}
			#resultSection{
				margin-top: 10px;
			}
			
			tbody tr:hover{
				background-color: rgba(192,192,192,0.3);
			}
			
			.tab-item-section{
				padding : 15px;
				background-color: white;
				/*border : 1px solid #ddd;*/
				border-top : none !important;
			}
			#codeInput{
				position: absolute;;
				top : -1000px;

			}
			#lent-main-sec{
				height: 400px;
			}
			#lent-main-sec p{
				line-height: 400px;
			}
			.nav.nav-tabs *{
				position: static !important;
			}
			.input-group, .input-group *{
				position: static !important;
			}
		</style>
		<section id="mainSection" ng-app="libraryApp" ng-controller="appController">
			<article class="container-fluid">
				<ul class='nav nav-tabs'>
					<li role="presentation" ng-class="{active : menuSelect == 1}" ng-click="menuSelect=1"><a href="#">도서검색</a></li>
					<li role="presentation" ng-class="{active : menuSelect == 2}" ng-click="menuSelect=2"><a href="#">도서대여</a></li>
					<li role="presentation" ng-class="{active : menuSelect == 3}" ng-click="menuSelect=3"><a href="#">도서반납</a></li>
					<li role="presentation" ng-class="{active : menuSelect == 4}" ng-click="menuSelect=4"><a href="#">나의 대여현황</a></li>
				</ul>
			</article>
			
			<div class=" tab-item-section" ng-if="menuSelect == 1" ng-controller="searchController" ng-init="init()">
				<div class="container-fluid">
					<article class='input-group'>
						<span class="input-group-btn">
							<a class='btn btn-danger' ng-click="all()">
								모든목록	
							</a>
						</span>
						<input type="text" class='form-control' placeholder="도서를 검색하세요" ng-model="keyword" ng-keypress="searchEvent($event)">
						<span class="input-group-btn">
							<a class='btn btn-primary' ng-click="clickSearch()">검색</a>
						</span>
					</article>
				</div>

				<article class="container-fluid">
					<h3>도서목록</h3>
					<div id="resultSection">
						<table class="table table-striped">
							<thead>
								<th class="text-center">도서번호</th>
								<th class="text-center">이름</th>
								<th class="text-center hidden-xs">저자</th>
							</thead>
							<tbody>
								<tr ng-repeat="(idx, tuple) in resultList">
									<td class="text-center">{{tuple.num}}</td>
									<td>{{tuple.name}}</td>
									<td class="text-center hidden-xs">{{tuple.author}}</td>
								</tr>
							</tbody>
						</table>
					</div>
				</article>
			</div>

			<div class=" tab-item-section" ng-if="menuSelect == 2" ng-controller="lentController" ng-init="init();">
				<input type="text" id="codeInput" ng-keypress="codeInputEvent($event)" ng-blur="blurEvent()">
				<article class="container-fluid">
					<div id="lent-main-sec">
						<p class="lead text-center">대여할 도서의 바코드를 스캔하세요 : {{bookCode}}</p>
					</div>
				</article>
			</div>

			<div class=" tab-item-section" ng-if="menuSelect == 3" ng-controller="returnController" ng-init="init();">
				<input type="text" id="codeInput" ng-keypress="codeInputEvent($event)" ng-blur="blurEvent()">
				<article class="container-fluid">
					<div id="lent-main-sec">
						<p class="lead text-center">반납할 도서의 바코드를 스캔하세요 : {{bookCode}}</p>
					</div>
				</article>
			</div>

			<div class=" tab-item-section" ng-if="menuSelect == 4" ng-controller="infoController" ng-init="init();">
				<h3>나의 도서대여 현황</h3>
				<table class="table table-striped">
					<thead>
						<th class="text-center">번호</th>
						<th class="text-center">도서이름</th>
						<th class="text-center">대여일</th>
						<th class="text-center">대여기간</th>
					</thead>
					<tbody>
						<tr ng-if="lentList.length > 0" ng-repeat="(idx, tuple) in lentList">
							<td class="text-center">{{tuple.book_code}}</td>
							<td class="text-left">
								<strong>{{tuple.name}}</strong> ({{tuple.author}} | {{tuple.publish}})
							</td>
							<td class="text-center">
								{{tuple.lent_date| date:"yyyy-MM-dd"}}
							</td>
							<td class="text-center">
								{{tuple.expect_return_date | date:"yyyy-MM-dd"}}
							</td>
						</tr>
						<tr ng-if="lentList.length == 0 || lentList == null">
							<td colspan="4">
								<p class="text-center">대여하신 도서가 없습니다.</p>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</section>
	</body>
</html>