<div class="news_block">
	<div class="news_block_view">
		<div class="news_block_block" onclick="location.href = ('news/<?=$row->nid;?>')">
			<img src="/sites/default/files/news/<?=$row->field_field_image[0]['raw']['filename'];?>">
			<div class="news_block_text">
				<p class="news_block_date"><?=date_creat_normal($row->node_created);?></p>
				<h2 class="news_block_title"><?=$row->node_title;?></h2>
				<p class="news_block_caption"><?=$row->field_body[0]['raw']['summary'];?></p>
				<a class="news_block_link" href="news/<?=$row->nid;?>">Читать</a>
			</div>
		</div>
	</div>
</div>