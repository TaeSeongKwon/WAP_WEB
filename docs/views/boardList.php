<style type='text/css'>
	
	.boardFrame, .tFrame{
		/*width : 100%;*/
		float: none;
		/*border : 1px solid silver;*/
		min-height: 490px;
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
		min-height : 464px;
	}
	.tfooter{
		border-top : 1px silver solid;
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
</style>

<section class='container mainBody'>
	<article class='row'>
		<div class='col-xs-12'>
			<strong><h3><?=$boardInfo['name']?></h3></strong>
		</div>
	</article>
	<hr>
	<article class='row container'>
		<div class='col-sm-10 container text-right writeBtnSec'>
			<?php if($boardInfo['accessLevel'] >= $info['levelIdx']) :?>
				<a class='btn btn-info' href='/board/write/<?=$type?>'>글 쓰기</a>
			<?php endif;?>
		</div>
		
		<div class='col-sm-10 container text-center boardFrame'>
			<div class='row boardHead'>
				<div class='col-md-1 col-xs-2'>번호</div>
				<div class='col-md-6 col-xs-10'>제목</div>
				<div class='col-md-2 hidden-sm hidden-xs'>글쓴이</div>
				<div class='col-md-3 hidden-sm hidden-xs'>등록일</div>
			</div>
			<div class='tbody'>
				<?php $num = $rowNum;
					foreach($list as $i => $row) : ?>
				<div class='row boardItem'>
					<div class='col-md-1 col-xs-2'><?=$num?></div>
					<div class='col-md-6 col-sm-10 boardTitle'>
						<?php  $regDate = explode(" ", $row['regDate'])[0]; ?>
						<div><a href='/board/view/<?=$row["boardType"]?>/<?=$row["idx"]?>'><?=$row['title']?> [<?=$row['numOfCmt']?>]</a></div>
						<div class='visible-xs visible-sm mbTitle'><?=$row['name']?> | <?=$regDate?></div>
					</div>
					<div class='col-md-2 hidden-sm hidden-xs'><?=$row['name']?></div>
					<div class='col-md-3 hidden-sm hidden-xs'><?=$regDate?></div>
				</div>
				<?php $num--;
					endforeach; ?>
			</div>
			<div class='tfooter row'>
				<div class='col-xs-12' style='height:80px;'>
					<?=$pagination?>
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
				<div class='col-xs-12'>
					<form class='form-inline' name='searchForm' action='/board/search/<?=$row["boardType"]?>' method='post'>
						<div class='form-group' >
							<input type='text' class='form-control' name='keyword' placeholder='검색을 통하여 원하시는 게시물을 찾으세요'>
						</div>
						<button type='submit' class='btn btn-primary'>검색</button>
					</form>
				</div>
			</div>
		</div>

	</article>
</section>
