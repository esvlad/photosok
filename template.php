<?php

/*function photosok_menu_tree__main_menu(&$variables) {
  return '<div class="menu_main__links"><ul>' . $variables['tree'] . '</ul></div>';
}*/

function experience_year(&$data){
	$birthday_timestamp = strtotime($data);
	$date = date('Y') - date('Y', $birthday_timestamp);
	if (date('md', $birthday_timestamp) > date('md')) {
		$date--;
	}

	$m = substr($date,-1,1);
    $l = substr($date,-2,2);
    return $date. ' ' .((($m==1)&&($l!=11))?'год':((($m==2)&&($l!=12)||($m==3)&&($l!=13)||($m==4)&&($l!=14))?'года':'лет'));
}

function date_creat(&$data){
	
	$monthes = array(
	    1 => 'Января', 2 => 'Февраля', 3 => 'Марта', 4 => 'Апреля',
	    5 => 'Мая', 6 => 'Июня', 7 => 'Июля', 8 => 'Августа',
	    9 => 'Сентября', 10 => 'Октября', 11 => 'Ноября', 12 => 'Декабря'
	);

	return date('d ', $data) . $monthes[date('n', $data)] . date(' Y', $data);
}

function date_creat_normal(&$data){
	return date('d.m.Y', $data);
}

function review_body(&$data, &$url){
	$count_paragraph = substr_count($data, '</p>');
	$text = array();

	if($count_paragraph > 1){
		$body = strstr($data, '</p>', true);

		$text[0] = $body . '</p><span id="recall_node" data-node="'.$url.'">Читать полностью</span>';
		$text[1] = '<div class="recall_full_text">' . $data . '</div>';

		return $text;
	} else {
		$text[0] = strstr($data, '</p>', true);

		return $text;
	}
}

function menu_inspection_active($data, $type){
	if(isset($_GET[$type])){
		if($_GET[$type] == $data){
			echo 'class="active"';
		} else return false;
	} else return false;
}

function vkPhotoAlbums($groupID, $albumID, $token){
	$params = array(
		'owner_id' => $groupID,
		'album_id' => $albumID,
		'count' => 1000,
		'access_token' => $token,
	);

	$json = file_get_contents('https://api.vk.com/method/photos.get?' . http_build_query($params));
    return json_decode($json);
}

function vkPhoto($groupID, $photoID, $token){
	$phID = array();
	foreach($photoID as $key=>$value){
		$phID[] = $groupID.'_'.$value;
	}

	/*$vkPhID = array();
	for($i = 0; $i < count($phID); $i++){
		$vkPhID[] = $phID
	}
	$code = '
	var result = ['.$phID.'];
    var j = 0;
    var offset = 0;
    while (j < 25) {
        var posts = API.photos.getById({"photos": '.$groupID.', "album_id": '.$albumID.', "count": 1000});
        result.push(posts);
        offset = offset + 100;
        j = j + 1;
    } return result;
    ';*/

	$phID = implode(',', $phID);

	$params = array(
		'photos' => $phID,
		'access_token' => $token,
	);
	$json = file_get_contents('https://api.vk.com/method/photos.getById?photos='.$phID.'&access_token='.$token);
	//$json = file_get_contents('https://api.vk.com/method/execute?code='.$phID.'&access_token='.$token);
    return json_decode($json);
}