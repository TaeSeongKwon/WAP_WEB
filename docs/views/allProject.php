<style type='text/css'>
	.boardFrame, .tFrame{
		/*width : 100%;*/
		float: none;
		/*border : 1px solid silver;*/
		/*min-height: 490px;*/
		/*background-color: #ffffff;*/
	}
	.boardHead, .tHead{
		background-color: #CC6600;
		color: white;
		font-weight: bold;
		font-size: medium;
		padding:7px 0px;
	}
	.tbody{
		/*min-height : 464px;*/
	}
	.tfooter{
		/*border-top : 1px silver solid;*/
	}
	.boardItem, .tItem{
		padding : 5px 0px;
		border-bottom : solid 1px silver;
		color : #444444;

	}
	.boardItem a, .tItem a{
		color : #444444;
		text-decoration: none;
	}
	.boardItem:hover{
		background-color:rgba(192,192,192,0.12);
	}
	
	.boardTitle{
		text-align: left;
	}
	.mbTitle{
		font-size: x-small;
	}
	.writeBtnSec{
		float : none;
		margin-bottom : 5px;
	}
	#proDetail{
		height:100px;
		z-index: 10;
		position: relative;
	}
</style>

<section class='container mainBody'>
	<article class='row'>
		<div class='col-xs-12'>
			<strong><h3>모든 프로젝트</h3></strong>
		</div>
	</article>
	<hr>
	<article class='row container'>
		<div class='col-sm-10 container text-center boardFrame'>
			<div class='row boardHead'>
				<div class='col-md-1 col-xs-2'>번호</div>
				<div class='col-md-7 col-xs-10'>프로젝트 명</div>
				<div class='col-md-3 hidden-sm hidden-xs'>등록일</div>
				<div class='col-md-1 hidden-sm hidden-xs'>상태</div>
			</div>
			<div class='tbody'>
				<?php $num = $rowNum;
					foreach($list as $i => $row) : ?>
					<?php 
						$regDate = strtotime($row['endDate']);
						$crrDate = time();
						$stat ="";
						if($regDate < $crrDate)
							$stat="완료";
						else
							$stat = "진행중";
					?>
				<div class='row boardItem'>
					<div class='col-md-1 col-xs-2'><?=$num?></div>
					<div class='col-md-7 col-sm-10 boardTitle'>
						<div><a href='/project/view/<?=$row["idx"]?>'><?=$row['name']?></a></div>
						<div class='visible-xs visible-sm mbTitle'><?=$row['regDate']?> | <?=$stat?></div>
					</div>
					<div class='col-md-3 hidden-sm hidden-xs'><?=$row['regDate']?></div>
					<div class='col-md-1 hidden-sm hidden-xs'><?=$stat?></div>
					
				</div>
				<?php $num--;
					endforeach; ?>
			</div>
			<div class='tfooter row'>
				<div class='col-xs-12' style='height:80px;'>
					<?php /*$pagination*/?>
					<!-- <nav>
					  <ul class="pagination">
					    <li>
					      <a href="#" aria-label="Previous">
					        <span aria-hidden="true">&laquo;</span>
					      </a>
					    </li>
					    <li><a href="#">1</a></li>
					    <li><a href="#">2</a></li>
					    <li><a href="#">3</a></li>
					    <li><a href="#">4</a></li>
					    <li><a href="#">5</a></li>
					    <li>
					      <a href="#" aria-label="Next">
					        <span aria-hidden="true">&raquo;</span>
					      </a>
					    </li>
					  </ul>
					</nav> -->
				</div>
			</div>
		</div>

	</article>
</section>
