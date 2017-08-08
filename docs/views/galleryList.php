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
	@media (max-width: 768px){
		.navbar-collapse{
			z-index: 9999999;
	    	position: absolute;
	    	width: 100%;
		}
	}
</style>

<div class='img-circle imgUpload'>
	<a href='/gallery/write' class='glyphicon glyphicon-cloud-upload img-circle'></a>
</div>
<section class="container-fluid">
	<strong><h3>갤러리</h3></strong>
	<hr>
</section>
<section class="container-fluid">
	<article id="gallery" style="display:none;">
		<?php foreach($list as $i => $row) : ?>
			<a href="/gallery/view/<?=$row['idx']?>">
			<img alt="<?=$row['name']?>"
			     src="<?=$row['thumbPath']?>"
			     data-image="<?=$row['thumbPath']?>"
			     data-description="<?=$row['name']?>"
			     style="display:none">
			</a>
		<?php endforeach;?>
	</article>
</section>

<script type="text/javascript">
	$(document).ready(function(){
		$("#gallery").unitegallery({
			tile_border_color:"#7a7a7a",
			tile_outline_color:"#8B8B8B",
			tile_enable_shadow:true,
			tile_shadow_color:"#8B8B8B",
			tile_overlay_opacity:0.3,
			tile_show_link_icon:true,
			tile_image_effect_type:"sepia",
			tile_image_effect_reverse:true,
			tile_enable_textpanel:true,
			lightbox_textpanel_title_color:"e5e5e5",
			tiles_col_width:230,
			tiles_space_between_cols:20,
			tile_link_newpage: false,			//open the tile link in new page
			tile_enable_action:	false			//enable tile action on click like lightbox
					
		});
	});

</script>