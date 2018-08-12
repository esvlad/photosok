<ul id="left_menu" data-request-uri="<?=$_SERVER['REQUEST_URI'];?>">
<? foreach($variables['elements']['menu_block_1']['#content'] as $key => $value): ?>
	<? if($key != '#sorted' && $key != '#theme_wrappers'): ?>
	<? $isset_category = !empty($value['#below']) ? 'class="isset_category"' : ''; ?>
		<li <?=$isset_category;?>>
			<a href="/<?=$value['#href'];?>">
				<span><?=$value['#title'];?></span>
			</a>
			<i class="isset_category__icon"></i>
			<? if(!empty($isset_category)) : ?>
				<div class="menu_category">
					<ul>
					<? foreach ($value['#below'] as $k => $val) : ?>
						<? if($k != '#sorted' && $k != '#theme_wrappers'): ?>
							<li>
								<a href="/<?=$val['#href'] . '?category=' .$val['#localized_options']['query']['category'];?>">
									<span><?=$val['#title'];?></span>
								</a>
								<? if(!empty($val['#below'])) : ?>
									<div class="menu_category_subcategory">
										<ul>
											<? foreach($val['#below'] as $subkey => $subvalue) : ?>
												<? if($subkey != '#sorted' && $subkey != '#theme_wrappers'): ?>
													<li>
														<a href="/<?=$subvalue['#href'] . '?category=' . $subvalue['#localized_options']['query']['category'] . '&subcategory=' .$subvalue['#localized_options']['query']['subcategory']; ?>">
															<span><?=$subvalue['#title'];?></span>
														</a>
													</li>
												<? endif; ?>
											<? endforeach; ?>
										</ul>
									</div>
								<? endif; ?>
							</li>
						<? endif; ?>
					<? endforeach; ?>
					</ul>
				</div>
			<? endif; ?>
		</li>
	<? endif; ?>
<? endforeach; ?>
<li>
	<div class="contact_form"><span>Напишите нам</span></div>
	<div class="view_contact_form">
		<div class="contact_form_close"></div>
		<? $block = module_invoke('webform', 'block_view', 'client-block-81');
                  print render($block['content']); ?>
	</div>
</li>