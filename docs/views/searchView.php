
<style type='text/css'>
	
	.boardFrame{
		width : 100%;
		border : 1px solid silver;
	}
	.boardHead{
		background-color: burlywood;
		color: white;
		font-weight: bold;
		font-size: medium;
		height:30px;
	}
	.boardItem{
		height:25px;
	}
	.item{
		/*border-bottom: silver 1px solid;*/
	}
</style>


<section class='container mainBody'>
	<article class='row'> 
		<div class='col-xs-12'>
			<strong><h3>"<?=$keyword?>" Search Result</h3></strong>
		</div>
	</article>
	<hr>
	<article class='row listSec'>
		<?php if($list == null ) : ?>
			<div class='col-xs-12'>
				<h3>Not Found!</h3>
			</div>
		<?php else :?>
			<?php foreach($list as $i => $row) : ?>
				<div class='col-xs-12 item'>
					<h4>[<?=$row['name']?>] <a href='/board/view/<?=$row['idxOf']?>/<?=$row['idx']?>'><?=$row['title']?> (<?=$row['cnt']?>)</a></h4>
					<h5><?=$row['userName']?> | <?=$row['regDate']?></h5>
					<p>
						<?php if(strlen($row['main']) > 30) 
							echo mb_substr($row['main'], 0, 30, "UTF-8")."...";
						else echo $row['main']; ?>
					</p>
					<hr>
				</div>
			<?php endforeach;?>
		<?php endif?>
	</article>
</section>
