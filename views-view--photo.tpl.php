<div class="content_titles">
	<h1><?=$view->human_name;?></h1>
</div>

<!-- Меню категории -->
		<ul class="navbar">
		<? foreach($view->field['field_category']->field_info['settings']['allowed_values'] as $key => $value): ?>
			<li>
				<a <? menu_inspection_active($key, 'category'); ?> href="?category=<?=$key;?>"><?=$value;?></a>
			</li>
		<? endforeach; ?>
		</ul>
		<? if(isset($_GET['category']) && $_GET['category'] == 'photoshoot') : ?>
		<ul class="navbar_subcategory" data-link="photo?category=photoshoot">
			<? foreach($view->field['field_sub_category']->field_info['settings']['allowed_values'] as $key => $value): ?>
			<li data-link="&subcategory=<?=$key;?>">
				<a <? menu_inspection_active($key, 'subcategory'); ?> href=""><?=$value;?></a>
			</li>
			<? endforeach; ?>
		</ul>
		<? endif; ?>

<section class="content_wrapper">
	<div class="view_photo_albums">
		<?= $rows; ?>
	</div>
</section>