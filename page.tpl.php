<? if($node->vid == 1): ?>
	<video id="main_video" loop="loop" preload="metadata" poster="/sites/default/files/video_screen.JPG" muted="muted">
        <source src="/sites/default/files/main_home.mp4" type="video/mp4">
    </video>
	<iframe id="main_vid" width="100%" height="100%" style="position: absolute; z-index: -1; left: 115px;" src="https://www.youtube.com/embed/A4kLWelQ55Q?rel=0&amp;controls=0&amp;showinfo=0&amp;autoplay=1&amp;loop=1&amp;playlist=A4kLWelQ55Q&amp;vq=hd1080" frameborder="0" allowfullscreen></iframe>
<? endif; ?>
<!-- Меню -->
<div class="left_block height90">
	<div class="menu_main">
		<div class="site_logo">
			<a href="/" target="_self">
				<img src="/sites/all/themes/photosok/img/site_logo.png" alt="Фотографы СОК" title="Фотографы СОК">
			</a>
		</div>

		<div class="menu_main__links">
			<? print render($page['left_menu']); ?>
		</div>
	</div>
	<div class="copyright">
		<p>2016&nbsp;&laquo;СОК&raquo;</p>
		<p>&copy;&nbsp;Все права защищены</p>
		<p class="promolink">Сделано&nbsp;в&nbsp;<a href="http://promolink.su/" target="_blank">Promolink</a></p>
	</div>
</div>

<!-- Основной контент -->
<div id="main_wrapper" class="wrapper">
	<div class="content">

		<? print render($page['content']); ?>

	</div>
</div>


<footer class="footer">
	
</footer>