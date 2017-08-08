<style type='text/css'>
	.boardItem a, .tItem a{
		color : #595959;
		text-decoration: none;
	}
	.boardItem:hover{
		background-color:rgba(192,192,192,0.12);
		text-decoration: none;
	}
	.mbTitle{
		font-size: x-small;
	}
	html,body{
		height: 100%;
	}
	.main_section{
		height: calc( 100% - 300px );
	}
</style>
<section class="container-fluid">
	<strong><h3>모든 프로젝트</h3></strong>
	<hr>
</section>
<section class="container-fluid main_section">
	<table class="table table-striped">
		<thead>
			<th class="text-center">번호</th>
			<th class="text-center">프로젝트명</th>
			<th class="text-center hidden-sm hidden-xs">등록일</th>
			<th class="text-center hidden-sm hidden-xs">상태</th>
		</thead>
		<tbody>
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
			<tr class="boardItem">
				<td class="text-center"><?=$num?></td>
				<td>
					<div><a href='/project/view/<?=$row["idx"]?>'><?=$row['name']?></a></div>
					<div class='visible-xs visible-sm mbTitle'><?=$row['regDate']?> | <?=$stat?></div>
				</td>
				<td class="hidden-sm hidden-xs text-center"><?=$row['regDate']?></td>
				<td class="hidden-sm hidden-xs text-center"><?=$stat?></td>
			</tr>
		<?php $num--;
				endforeach; ?>
		</tbody>
		<tfoot></tfoot>
	</table>
</section>
