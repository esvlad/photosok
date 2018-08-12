(function ($) {
	var docWidth;
	var winHeight;
	var winWidth;

	$('[href="/node/7"]').attr('href','/contact_us');

	//$('#cboxPrevious').trigger('click');

	$('.contact_form_close').click(function(){
		$('.contact_form').trigger('click');
	});

	function setLocation(curLoc){
	    try {
	      history.pushState(null, null, curLoc);
	      return;
	    } catch(e) {}
	    location.hash = '/' + curLoc;
	}

	var news_count = 0; //Глобальная переменная, не переопределять!!!

	function viewBlockNews() {
		$('.news_block').each(function(){

			$(this).unwrap();

			if(news_count == 0 || news_count == 5){
				$(this).addClass('news_block_large');

				if(news_count == 0){
					$('.news_column_left').append($(this));
				} else {
					$('.news_column_right').append($(this));
				}
			} else {
				$(this).addClass('news_block_small');

				if(news_count == 1 || news_count == 2){
					$('.news_column_right').append($(this));
				} else if(news_count == 3 || news_count == 4) {
					$('.news_column_left').append($(this));
				}
			}

			if(news_count == 5){
				news_count = 0;
			} else {
				news_count++;
			}
			
		});
	}

	var left_menu_link = $('#left_menu').attr('data-request-uri');
	function menu_active_link(element){
		$(element).each(function(){
			link_element = $(this).children('a').attr('href');
			//link_element = link_element.replace('?', '\\?', link_element);
			is_link_element = new RegExp(link_element, 'g');
			
			if(is_link_element.test(left_menu_link)){
				$(this).addClass('active');
				//console.log(link_element);
			}
		});
	}

	function modalRecallClose(){
		//console.log(123);
		$('#modal_recall').fadeOut(200);
		setTimeout(function(){$('#modal_recall').detach();},200);
	}

	$(document).mouseup(function (e) {
		if($('#modal_recall').is('div')){
			var container = $("#modal_recall > #modal_modal");
		    if (container.has(e.target).length === 0){
		        modalRecallClose();
		    }
		}
	});

	$(document).ready(function(){
		//console.log($.support);
		
		docWidth = $(document).width();
		winHeight = $(window).height();
		winWidth = $(window).width();
		console.log('w = '+docWidth+'; h = '+winHeight+';');
		//alert(docWidth+'x'+winHeight);

		if(winWidth > 768){
			if($('body').hasClass('front')){
				$('body').css('overflow','hidden');
			}
			//$('.page-node-1 > .wrapper > #main_video').attr('height',winHeight).attr('width',(winWidth - 295));

			var drop_active;

			$('.contact_form').click(function(){
				if($(this).hasClass('active')){
					$(this).removeClass('active');
					$('.view_contact_form, .view_contact_form .form-actions').removeClass('active');
				} else {
					$(this).addClass('active');
					$('.view_contact_form, .view_contact_form .form-actions').addClass('active');
				}
			});

			$('.menu_category').hover(
		    function(){
		      	drop_active = 1;
		      //console.log('Ховер на подменю получен');
		    },
		    function(){
		      	//console.log('Ховер на подменю потерян');
		      	//$(this).css('display','none');
		      	$(this).removeClass('-active');
		      	
		      	drop_active = 0;
		    }
		  );

			var data_link;
			$('.isset_category').hover(
				function(){
				  	drop_active = 1;
				  	//$('.menu_category').css('display','block');
				  	$('.menu_category').addClass('-active');
				    //console.log('Ховер активен!');
				},
				function(){
					drop_active = 0;
				    setTimeout(function(){
					    if(drop_active != 1){
					    	//$('.menu_category').css('display','none');
					    	$('.menu_category').removeClass('-active');
					      	//console.log('Ховер не на подменю!');
					    }
				    }, 500);
				}
			);
		}

		if(winWidth < 992 && winWidth > 768){
			$('.menu_category').prependTo('body').addClass('menu_category_block_off');

			$('#left_menu > .isset_category').click(
				function(){
					$('.menu_category').toggleClass('menu_category_block_on menu_category_block_off');
				}
			);
		} else if(winWidth <= 768){
			$('#main_video').detach();
			$('#main_vid').detach();

			$('.view_contact_form').prependTo('body');

			$('.contact_form').click(function(){
				if($(this).hasClass('active')){
					$('.view_contact_form, .view_contact_form .form-actions').removeClass('active');
					//$('.left_block.height90').removeClass('gray');
				} else {
					$('.view_contact_form, .view_contact_form .form-actions').addClass('active');
					//$('.left_block.height90').css('background','#b5b5b5');
					//$('.left_block.height90').addClass('gray');
				}
			});

			$(document).mouseup(function (e) {
				if($('.view_contact_form').is('.active')){
					var container = $(".view_contact_form");
				    if (container.has(e.target).length === 0){
				        $('.view_contact_form, .view_contact_form .form-actions').removeClass('active');
				       // $('.left_block.height90').css('background','#f3f3f3');
				    }
				}
			});

			if(winHeight > 490){
				$('.menu_main__links > ul > li').css({'font-size':'28px','margin-bottom':'10px'});
			}
			//$('.left_block').addClass('height90');
			$('.left_block > .menu_main > .site_logo').after('<div class="menu_gamburger"></div>');
			//$('.isset_category').addClass('deg90');
			//console.log(1231321);
			$('.menu_gamburger').on('click', function(){
				var element_menu = $(".left_block");
				var left_block_height = element_menu.css('height');
				//element_menu.toggleClass('height90 autoheight');

				if(parseInt(left_block_height) == 90){
					element_menu.animate({height: '732px'}, 200);
					$('.menu_main').css({'position':'fixed','height':'100%','overflow':'overlay'});
				} else {
					element_menu.animate({height: '90px'}, 200);
					$('.menu_main').css({'position':'relative','height':'100%','overflow':'initial'});
				}
			});

			$('.contact_form_close').click(function(){
				$('.view_contact_form').removeClass('active');
				//$('.left_block.height90').removeClass('gray');
			});

			$('.menu_category').detach();
			//$('.menu_category').addClass('display_block_on');
			//$('.isset_category').css('height', '711px');
			/*$('.isset_category').on('click', function(){
				var left_block_hh = $('.left_block').css('height');

				if(parseInt($(this).css('height')) == 55){
					$(this).animate({height: '432px'}, 200);
					$('.left_block').css('height','1000px');
				} else {
					$(this).animate({height: '55px'}, 200);
					$('.left_block').css('height','568px');
					//$(this).removeClass('autoheight');
				}
				$(this).toggleClass('deg90 deg180');
				$('.menu_category').toggleClass('display_block_off display_block_on');
				
			});*/

			$('.copyright').appendTo('.footer');

			var navbar = $('.navbar > li > a[href="?category=photoshoot"]');
			navbar = navbar.parent()
			$('.navbar_subcategory').appendTo(navbar);

			if($('.navbar > li > a').is('.active')){
				$('.navbar > li').eq(4).addClass('clear');
			}

			$('.recall_block_caption').each(function(){
				var trbc = $(this).children('p').text();
				if(trbc != ''){
					var hrbcp = $(this).children('p').height();
					var newheightrbch = (55 - (hrbcp / 2));
					$(this).children('h2').css('margin-top',newheightrbch+'px');
				}
			});

			/*if($('.recall_block_caption').is('p')){
				console.log(3212121);
				$('.recall_block_caption > h2').css('margin-top','25px');
			}*/
		}

		
		
		$('.page-node-1 > .wrapper').css('height',winHeight);
		//console.log(winHeight);

		$('.view_photo_album, .view_video_album').parent().unwrap();

		var photo_alt_text = $('.node-type-photo .content_titles > h1').clone();
		var photo_alt_data = $('.node-type-photo .content_titles > p').text();
			photo_alt_text.children('span').detach();
			photo_alt_text = photo_alt_text.text();
			//console.log(photo_alt_text);
			$('.node-type-photo .content_wrapper > .view_photo_albums a').attr('title',$.trim(photo_alt_text)+'<br>'+$.trim(photo_alt_data));

		$('img').attr('alt','Фотографы СОК');

		var expr = new RegExp('photo/', 'ig');
		if(expr.test(location.pathname)){
			$('.field-label').detach();
			$('.field-item').unwrap().unwrap()
				.removeClass('odd even')
				.addClass('block_grid_33 block_grid_md_50 block_grid_mobile_100')
				.children('a').wrap('<div class="view_photo"></div>');

			var count_photo = $('.view_photo');
			count_photo = count_photo.length;
			$('.count_photo').text(count_photo);
		}

		var expr = new RegExp('commands/', 'ig');
		$('.view_command_block').parent().unwrap();
		if(expr.test(location.pathname)){
			var text_field_photo = $('.view_photo_albums').text();
			var text_field_video = $('.view_video_albums').text();
			if($.trim(text_field_photo) != '') $('.view_photo_albums').prev().css('display','block');
			if($.trim(text_field_video) != '') $('.view_video_albums').prev().css('display','block');
		}

		if(location.pathname == '/news'){
			$('.content_wrapper > div').prepend('<div class="news_column news_column_left"></div><div class="news_column news_column_right"></div>');
			
			if(docWidth >= 1240){
				viewBlockNews();
			} else if(docWidth < 1240 && docWidth > 768) {
				$('.news_block').addClass('block_grid_100 block_grid_mobile_100');
				$('.views-row-odd').prependTo('.news_column_left');
				$('.views-row-even').prependTo('.news_column_right');
				$('.news_block').unwrap();
			} else {
				$('.news_block').addClass('block_grid_100 block_grid_mobile_100').unwrap();
			}
		}

		if(location.pathname == '/reviews'){
			$('.view_recall').unwrap();

			$('.recall_block_block > span').click(function(){
				console.log(123);
				$('.page-reviews').prepend('<div id="modal_recall"></div>');
				$('#modal_recall').prepend('<div id="modal_modal"></div>');

				element = $(this).parents('.view_recall').clone();
				element.removeClass('block_grid_50 block_grid_md_50')
				element_full_text = element.find('.recall_full_text').html();

				element.find('.recall_block_block > p, .recall_block_block > span, .recall_full_text').detach();
				element.find('.recall_block_block').prepend(element_full_text);

				$('#modal_modal').prepend(element);
				$('#modal_modal > .view_recall').prepend('<div class="modal_close">x</div>');
				
				if(docWidth <= 768){
					var newRecalHeight = (winHeight-358);
					$('#modal_recall > #modal_modal > .view_recall > .view_recall_block > .recall_block_view > .recall_block_block').css('max-height',newRecalHeight);
				}
				
				$('#modal_recall').fadeIn(200);

				$('.modal_close').on('click', function(){
					modalRecallClose();
				});
			});

		}

		//console.log(location);
		//setLocation(123);
		
		$('.navbar_subcategory > li').each(function(){
			var data_link = $(this).attr('data-link');
			var parent_link = $(this).parent().attr('data-link');
			$(this).children('a').attr('href', parent_link + data_link);
		});

		menu_active_link('#left_menu > li');
		menu_active_link('.menu_category > ul > li');
		menu_active_link('.menu_category_subcategory > ul > li');
	});

	window.onload = function(){
		//alert(docWidth+'x'+winHeight);
		if(docWidth > 1020){

			$('.news_block_large > .news_block_view').each(function(){
				var blockHeight = $(this).height();
				//console.log(blockHeight);
				$(this)
				.children("div")
				.children('img')
				.css('height',blockHeight)
				.wrap('<div class="news_img_block"></div>');
			});

			var news_block_num = 0;
			$('.news_block_small').each(function(){
				blockHeight = $(this).innerHeight();
				//console.log(blockHeight);
				if(news_block_num == 0){
					$(this).children('.news_block_view').children('.news_block_block').css('height', (blockHeight - 28)+'px');
					news_block_num++;
				} else {
					$(this).children('.news_block_view').children('.news_block_block').css('height', (blockHeight - 32)+'px');
					news_block_num = 0;
				}
				
			});

			$('.menu_category').each(function(){
				var menu_category = $(this);
				var parent_elem_position = menu_category.prevAll('a').children('span').offset().top;
				//console.log('parent_elem_position = '+parent_elem_position);

				//menu_category.css('opacity', 0).css('display', 'block');
				var menu_category_height = menu_category.children('ul').first().outerHeight();
				var margin_menu_category_top = (winHeight - menu_category_height)/2;
				//console.log('menu_category_height = '+menu_category_height);
				//console.log('margin_menu_category_top = '+margin_menu_category_top);

				menu_category.children('ul').first().css('margin-top',parent_elem_position);
			});
		}
	}



})(jQuery);