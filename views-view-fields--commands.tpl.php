<div class="block_grid_33 block_grid_md_50 block_grid_mobile_100">
	<div class="view_command_block">
		<a href="/commands/<?=$fields['view_node']->raw; ?>" target="_self">
			<?=strip_tags($fields['field_image']->content,'<img>');?>
			<div class="command_block_caption">
				<h2><?=$fields['title']->raw;?></h2>
				<p><?=strip_tags($fields['field_position']->content);?></p>
				<p>Опыт работы: <span><?=experience_year(strip_tags($fields['field_experience']->content));?></span></p>
			</div>
		</a>
	</div>
</div>