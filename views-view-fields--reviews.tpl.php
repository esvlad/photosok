<div class="block_grid_50 block_grid_md_50 block_grid_mobile_100 view_recall">
	<div class="view_recall_block">
		<img src="/sites/default/files/reviews/<?=$row->field_field_image[0]['raw']['filename'];?>">
		<div class="recall_block_caption">
			<h2><?=$row->node_title;?></h2>
			<p><?=$row->field_field_whence[0]['raw']['value'];?></p>
		</div>
		<div class="recall_block_view">
			<div class="recall_block_block">
				<?
				$myBody = review_body($row->field_body[0]['raw']['value'], $row->nid);
				echo $myBody[0];
				echo isset($myBody[1]) ? $myBody[1] : '';
				?>
			</div>
		</div>
	</div>
</div>