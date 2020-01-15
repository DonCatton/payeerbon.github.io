<div class="blolckscenters">
	<div class="all_block_banners fff bots" style="padding: 15px;">
		<div class="pod_blocks_name_set">
			<div class="head_menu_history_blo">
				<ul>
					<li><a asc="banners" class="active">Верхний блок баннера</a></li>
					
				</ul>
			</div>	
			<br>		
			<form method="POST">
			
			<div class="alls_blocks_info_banners">
				<div class="pod_inf_bl_h good_active" id="banners">

					<h4><i class="fa fa-cog" aria-hidden="true"></i> Настройка верхних баннеров</h4>
					<?if($banner['status_top_ban'] == 'true'):?>
					<div class="bloks_inp_set bots">
						<div class="form_blocks_s">
							<label>1-я л. Левый</label>
							<input type="text" placeholder="Номер баннера" id="banners_1_l_l" value="<?=$banner['l_1_banner']?>">
						</div>
						<div class="form_blocks_s">
							<label>1-я л.  Правый</label>
							<input type="text" id="banners_1_l_r" placeholder="Номер баннера" value="<?=$banner['r_1_banner']?>">
						</div>
						<div style="clear: both;"></div>
					</div>
					<div class="bloks_inp_set bots">
						<div class="form_blocks_s">
							<label>2-я л. Левый</label>
							<input type="text" placeholder="Номер баннера" id="banners_2_l_l" value="<?=$banner['l_2_banner']?>">
						</div>
						<div class="form_blocks_s">
							<label>2-я л.  Правый</label>
							<input type="text" id="banners_2_l_r" placeholder="Номер баннера" value="<?=$banner['r_2_banner']?>">
						</div>
						<div style="clear: both;"></div>
					</div>
					<?else:?>
					<div class="blocks_vaz botst bots">
						<h4><i class="fa fa-lock" aria-hidden="true"></i>  Настройка кода блока</h4>
						<div class="bloks_inp_set bots">
							<div class="form_blocks_s">
								<label>Html код</label>
								<textarea id="html_key_top_banner" cols="30" rows="10"><?include DIR_BLOCK."/banners/banner_bl_top_key.php";?></textarea>
							</div>
							<div style="clear: both;"></div>
						</div>
					</div>
					<?endif;?>

					<br>
					<h4><i class="fa fa-lightbulb-o" aria-hidden="true"></i> Видимость верхнего блока</h4>
					<div class="bloks_inp_set bots">
						<div class="blockknops">
							<input  class="checkswit__input" type="checkbox" placeholder="Номер баннера" id="banner_top_in" <?= $banner['status_top_ban']=='true' ? "checked" : ''; ?>>
							<label class="checkswit__label" for="banner_top_in" >
								<span class="godscheck__check"><i class="fa fa-check" aria-hidden="true"></i></span>
								<span class="errcheck__check"><i class="fa fa-times" aria-hidden="true"></i></span>
							</label>
						</div>
					</div>

				</div>


				<div class="pod_inf_bl_h" id="text_banners">
					<h4><i class="fa fa-cog" aria-hidden="true"></i> Настройка текстовый баннеров</h4>
	<?if($banner['status_text_ban'] == 'true'):?>

					<div class="bloks_inp_set bots">
						<div class="form_blocks_s">
							<label>Правый тех. баннер</label>
							<input type="text" id="banner_r_text" value="<?=$banner['r_1_banner_tex']?>">
						</div>
						<div style="clear: both;"></div>
					</div>
	<?else:?>
					<div class="blocks_vaz botst bots">
						<h4><i class="fa fa-lock" aria-hidden="true"></i>  Настройка кода блока</h4>
						<div class="bloks_inp_set bots">
							<div class="form_blocks_s">
								<label>Html код</label>
								<textarea id="html_key_text_banner" cols="30" rows="10"><?include DIR_BLOCK."/banners/tex_baners_key.php";?></textarea>
							</div>
							<div style="clear: both;"></div>
						</div>
					</div>
	<?endif;?>
					<br>
					<h4><i class="fa fa-lightbulb-o" aria-hidden="true"></i> Видимость текстового баннера</h4>
					<div class="bloks_inp_set bots">
						<div class="blockknops">
							<input  class="checkswit__input" type="checkbox" id="banner_top_in_tex" <?= $banner['status_text_ban']=='true' ? "checked" : ''; ?>>
							<label class="checkswit__label" for="banner_top_in_tex" >
								<span class="godscheck__check"><i class="fa fa-check" aria-hidden="true"></i></span>
								<span class="errcheck__check"><i class="fa fa-times" aria-hidden="true"></i></span>
							</label>
						</div>
					</div>
				</div>
			</div>

				<div class="blocks_bottoms_set">
					<center><button onclick="funcr['save_s_banners'](); return false;">Сохранить</button></center>
				</div>

			</form>
<script>
$(function() {
    $(".head_menu_history_blo a").on('click', function() {
        $(".head_menu_history_blo a").removeClass("active");
        $(this).toggleClass("active");

        var content_s = $(this).attr("asc");

        $(".alls_blocks_info_banners div").removeClass("good_active");
        $("#"+content_s).toggleClass("good_active");
    });
});
</script>		
		</div>
	</div>
	<div class="fff pod_blocks_name_set information_pod_blocks" style="padding: 15px;">
		<h4>Информация</h4>
		<div>
			<lable>Скрипт использует баннеры, от проетка: linkslot.ru <img src="https://linkslot.ru/favicon.ico" alt=""></lable>
			<h3>Где взять номер баннера?</h3>
			<p>- После создания баннера, вам дают его код и именно в нем хранится тот самый номер. </p>
<br>
			<div class="pod_categ_info"><p>Текстовый пример<br><img class="num_prim_img" src="system/mane/img/admin/banner_num.jpg" alt=""></p>
			<p>Баннерный пример<br><img class="num_prim_img" src="system/mane/img/admin/banner_num_2.jpg" alt=""></p></div>
		</div>
	</div>
</div>