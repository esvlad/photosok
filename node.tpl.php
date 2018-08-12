<? if($node->vid == 1): ?>
		<? if($is_admin) : ?>
		<h3 class="edit_node">
			<a href="#overlay=node/<?=$node->nid;?>/edit">Редактировать</a>
		</h3>
		<? endif; ?>
		
	<?= $node->body['und'][0]['value']; ?>

<? elseif($node->vid == 7): ?>
		<? if($is_admin) : ?>
		<h3 class="edit_node">
			<a href="#overlay=node/<?=$node->nid;?>/edit">Редактировать</a>
		</h3>
		<? endif; ?>

		<div class="content_titles">
			<h1><?=$node->title;?></h1>
		</div>

		<section class="content_wrapper">
			<?= $node->body['und'][0]['value']; ?>
		</section>

		<div class="block_maps">
			<div id="yaMap"></div>
		</div>

		<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU"></script>
		<script src="/sites/all/themes/photosok/js/yaMaps.js"></script>
<? else : ?>

<? if($node->type == 'commands') : ?>
		<ol class="breadcrumb">
			<li>
				<a href="/" target="_self">Главная</a>
			</li>
			<li>
				<a href="/commands" target="_self">Команда</a>
			</li>
			<li class="active">
				<a><?=$node->title;?></a>
			</li>
		</ol>

		<? if($is_admin) : ?>
		<h3 class="edit_node">
			<a href="#overlay=node/<?=$node->nid;?>/edit">Редактировать</a>
		</h3>
		<? endif; ?>

		<div class="content_titles">
			<h1><?=$node->title;?></h1>
		</div>

		<section class="content_wrapper">
			<div class="block_grid_100 block_grid_mobile_100 profile">
				<img src="/sites/default/files/<?= $node->field_image['und'][0]['filename']; ?>">
				<div class="profile_block_caption">
					<p><?=$node->field_position['und'][0]['value']; ?></p>
					<p>Опыт работы: <span><?=experience_year($node->field_experience['und'][0]['value']); ?></span></p>
				</div>
				<div class="profile_block_body">
					<?=$node->body['und'][0]['value']; ?>
				</div>
			</div>

			<div class="view_works">
				
				<h2 style="display:none;">Фото <?=$node->field_to_name['und'][0]['value'];?></h2>
				<div class="view_photo_albums">
					<? $block = module_invoke('views', 'block_view', 'photo-block'); print render($block['content']); ?>
				</div>

				<h2 style="display:none;">Видео <?=$node->field_to_name['und'][0]['value'];?></h2>
				<div class="view_video_albums">
					<? $block = module_invoke('views', 'block_view', 'video-block'); print render($block['content']); ?>
				</div>
			</div>
		</section>
<? elseif($node->type == 'photo') : ?>
<?
$token = '2eb42889a4f373bd50e682e7be4c6a487d5323cc8f9efec43fcb672e01d056c3d94d96134016aa0833f1e'; //Токен доступа
$groupID = 123669096; // ID Группы в которой публикуются фото
$phid = $node->field_albim_id['und'][0]['value']; //ID альбома

$photos = vkPhotoAlbums(-$groupID, $phid, $token); //Получаю ID фотографий альбома

$photoID = array();
foreach($photos->response as $k=>$v){
	foreach($v as $key=>$val){
		//if($key == 'pid') $photoID[$k]=$val;
		if($key == 'src_big') $viewPhoto[$k]['src_big'] = $val;
		if($key == 'src_xxbig') $viewPhoto[$k]['src_xxbig'] = $val;
		//echo 'k= '.$k.' -> key= '.$key.' -> val= '.$val.'<br>';
	}
}

/*$photosID = vkPhoto(-$groupID, $photoID, $token); //Получаю информацию о фотографиях

$viewPhoto = array();
foreach($photosID->response as $k=>$v){
	foreach($v as $key=>$val){
		if($key == 'src_big') $viewPhoto[$k]['src_big'] = $val;
		if($key == 'src_xxbig') $viewPhoto[$k]['src_xxbig'] = $val;
	}
}*/
?>

<!-- Хлебные крошки -->
		<ol class="breadcrumb">
			<li>
				<a href="/" target="_self">Главная</a>
			</li>
			<li>
				<a href="/photo" target="_self">Фото</a>
			</li>
			<li>
				<a href="/photo?category=<?=$content['field_category']['#items']['0']['value'];?>" target="_self"><?=$content['field_category'][0]['#markup'];?></a>
			</li>
			<? if(isset($content['field_sub_category'][0]['#markup'])) : ?>
			<li>
				<a href="/photo?category=photoshoot&subcategory=<?=$content['field_category']['#object']->field_sub_category['und'][0]['value'];?>" target="_self">
					<?=$content['field_sub_category'][0]['#markup'];?>
				</a>
			</li>
			<? endif; ?>
		</ol>

		<? if($is_admin) : ?>
		<h3 class="edit_node">
			<a href="#overlay=node/<?=$node->nid;?>/edit">Редактировать</a>
		</h3>
		<? endif; ?>

		<!-- Заголовки -->
		<div class="content_titles">
			<h1><?=$node->title;?> <span><span class="count_photo"></span>&nbsp;фото</span></h1>
			<p><?=date_creat($node->created);?></p>
		</div>
		
		<section class="content_wrapper">
			<div class="view_photo_albums">
				<? foreach($viewPhoto as $key=>$value) : ?>
				<div class="field-item block_grid_33 block_grid_md_50 block_grid_mobile_100">
					<div class="view_photo">
						<a href="<?=$value['src_xxbig'];?>" title="Элина и Артем<br>16 Июня 2016" class="colorbox-load init-colorbox-processed cboxElement" data-colorbox-gallery="gallery-node-<?=$node->nid;?>">
							<img typeof="foaf:Image" src="<?=$value['src_big'];?>" alt="Фотографы СОК" title="">
						</a>
					</div>
				</div>
			<? endforeach; ?>
			</div>
		</section>

<? elseif($node->type == 'news') : ?>
<!-- Хлебные крошки -->
		<ol class="breadcrumb">
			<li>
				<a href="/" target="_self">Главная</a>
			</li>
			<li>
				<a href="/news" target="_self">Новости</a>
			</li>
			<li class="active">
				<a><?=$node->title;?></a>
			</li>
		</ol>
		<? if($is_admin) : ?>
		<h3 class="edit_node">
			<a href="#overlay=node/<?=$node->nid;?>/edit">Редактировать</a>
		</h3>
		<? endif; ?>

		<!-- Заголовки -->
		<div class="content_titles">
			<h1><?=$node->title;?></h1>
		</div>

		<section class="content_wrapper">
			<?=$node->body['und'][0]['value']; ?>
		</section>
<? else : ?>

<? endif; ?>

<? endif; ?>
