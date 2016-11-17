<style type='text/css'>
	
	#elastic_grid{
		min-height: 700px;
	}
	.imgUpload{
		width: 50px;
		height: 50px;
		position: fixed;
		right: 20px;
		bottom: 20px;
		background: none repeat scroll 0% 0% rgba(0, 0, 255, 0.7);
		z-index: 9;
		box-shadow: 2px 3px 8px 0px #C0C0C0;
		font-size: 25px;
		text-align: center;
		display: flex;
		display:-webkit-flex;
		align-items: center;
		justify-content: center;
		color: white;
		cursor: pointer;

	}
	.imgUpload a{
		color: white;
		width:50px;
		padding : 12px 0px;
	}
	.imgUpload a, .imgUpload a:hover{
		text-decoration: none;
	}

</style>

<div class='img-circle imgUpload'>
	<a href='/gallery/write' class='glyphicon glyphicon-cloud-upload img-circle'></a>
</div>
<section class='container mainBody'>
	<article class='row'>
		<div class='col-xs-12'>
			<strong><h3>갤러리</h3></strong>
		</div>
	</article>
	<hr>
	<article class='row container'>
		<div id="gallery">
			<?php foreach($list as $i => $row) : ?>
				<a href="/gallery/view/<?=$row['idx']?>"><figure class="picture" data-title="<?=$row['name']?>" data-url="<?=$row['thumbPath']?>"></figure></a>
			<?php endforeach;?>
			<!-- <a href="#"><figure class="picture" data-title="Image Caption 2" data-url="/pictures/img_3.jpg"></figure></a>
			<a href="#"><figure class="picture" data-title="Image Caption 4" data-url="/pictures/img_4.jpg"></figure></a>
			<a href="#"><figure class="picture" data-title="Image Caption 5" data-url="/pictures/img_5.jpg"></figure></a>
			<a href="#"><figure class="picture" data-title="Image Caption 6" data-url="/pictures/img_6.jpg"></figure></a>
			<a href="#"><figure class="picture" data-title="Image Caption 7" data-url="/pictures/img_7.jpg"></figure></a>
			<a href="#"><figure class="picture" data-title="Image Caption 8" data-url="/pictures/img_8.jpg"></figure></a>
			<a href="#"><figure class="picture" data-title="Image Caption 9" data-url="/pictures/img_9.jpg"></figure></a>
			<a href="#"><figure class="picture" data-title="Image Caption 10" data-url="/pictures/img_10.jpg"></figure></a> -->
		</div>
	</article>
</section>



<script type="text/javascript">
	var kts ;
	$(document).ready(function(){
	  kts =  $("#gallery").latae({
	        loader : '/img/loader.gif',
	        init : function() { console.log('bonjour'); },
	        loadPicture : function(event, img) { console.log($(img)); },
	        resize : function(event, gallery) { console.log(gallery); },
	        displayTitle: true
	    });
	});

</script>