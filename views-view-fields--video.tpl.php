<div class="block_grid_33 block_grid_md_50 block_grid_mobile_100">
	<div class="view_video_album">
		<div class="view_video_block">
			<?=$fields['field_video']->content;?>
			<div class="album_block_caption">
				<h2><?=$fields['title']->raw;?></h2>
				<p><?=strip_tags($fields['body']->content);?></p>
			</div>
		</div>
	</div>
</div>
