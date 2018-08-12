<div class="block_grid_33 block_grid_md_50 block_grid_mobile_100">
	<div class="view_photo_album">
		<a class="view_album_block" href="/photo/<?=$fields['view_node']->raw; ?>">
			<div class="album_block_prev_photo"><?=strip_tags($fields['field_image_cover']->content,'<img>');?></div>
			<div class="album_block_caption">
				<h2><?=$fields['title']->raw;?></h2>
			</div>
		</a>
	</div>
</div>
