<style type='text/css'>
	#brWriteBtn{
		float : right;
	}
	.mbTitle{
		font-size: x-small;
	}
	tbody tr:hover{
		background-color:rgba(192,192,192,0.12);
	}
	tbody tr td{
		vertical-align: middle !important; 
	}
	.board_title{
		color : #595959;
		text-decoration: none;
	}
	.board_title:hover{
		text-decoration: none;	
	}
</style>
<section class="container-fluid">
	<strong><h3><?=$boardInfo['name']?></h3></strong>
	<hr>
</section>
<section class="container-fluid">
	<?php if($boardInfo['accessLevel'] >= $info['levelIdx']) :?>
		<a class='btn btn-info' id="brWriteBtn" href='/board/write/<?=$type?>'>글 쓰기</a>
	<?php endif;?>
	<table class="table table-striped">
		<thead>
			<th class="text-center">번호</th>
			<th class="text-center">제목</th>
			<th class="text-center hidden-sm hidden-xs">등록자</th>
			<th class="text-center hidden-sm hidden-xs">등록일</th>
		</thead>
		<tbody>
			<?php $num = $rowNum;
					foreach($list as $i => $row) : ?>
			<?php  $regDate = explode(" ", $row['regDate'])[0]; ?>
			<tr>
				<td class="text-center">
					<span style=""><?=$num?></span>
				</td>
				<td>
					<a class="board_title" href='/board/view/<?=$row["boardType"]?>/<?=$row["idx"]?>'>
						<?=$row['title']?> <span class="badge"><?=$row['numOfCmt']?></span>
					</a>
					<div class='visible-xs visible-sm mbTitle'><?=$row['name']?> | <?=$regDate?></div>
				</td>
				<td class="text-center hidden-sm hidden-xs"><?=$row['name']?></td>
				<td class="text-center hidden-sm hidden-xs"><?=$regDate?></td>
			</tr>
			<?php $num--;
					endforeach; ?>
		</tbody>
		<tfoot>
			<tr>
				<td colspan="4"><?=$pagination?></td>
			</tr>
			<tr>
				<td colspan="4" class="text-center">
					<form class='form-inline' name='searchForm' action='/board/search/<?=$row["boardType"]?>' method='post'>
						<div class='form-group' >
							<input type='text' class='form-control' name='keyword' placeholder='검색을 통하여 원하시는 게시물을 찾으세요'>
						</div>
						<button type='submit' class='btn btn-primary'>검색</button>
					</form>
				</td>
			</tr>
		</tfoot>
	</table>
</section>


