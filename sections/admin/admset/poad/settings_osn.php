<?

/*$testprov = json_decode(json_encode($config), true);*/


?>

<div class="blolckscenters">
	<div class="blocks_settrings_alls fff" style="padding: 15px;">
		<div class="pod_blocks_name_set">
			<form method="POST">
				<h4><i class="fa fa-cog" aria-hidden="true"></i> Основные настройки</h4>
				<div class="bloks_inp_set bots">
					<div class="form_blocks_s">
						<label>Название проекта</label>
						<input type="text" id="name_project" value="<?=$config['name_proj']?>">
					</div>
					<div class="form_blocks_s">
						<label>Под название</label>
						<input type="text" id="pod_name_project" value="<?=$config['pod_name_bl']?>">
					</div>
					<div style="clear: both;"></div>
				</div>
				<div class="bloks_inp_set bots">
					<div class="form_blocks_s">
						<label>Дата старта проекта</label>
						<input placeholder="В формате дд.мм.гггг" type="text" id="date_s_project" value="<?=$config['date_start_web'];?>">
					</div>					
					<div class="form_blocks_s">
						<label>Почта Support</label>
						<input id="support_project" type="text" value="<?=$config['mail_s'];?>">
					</div>
					<div style="clear: both;"></div>
				</div>
				<div class="bloks_inp_set bots">
					<div class="form_blocks_s">
						<label>Вид капчи:</label>
						<select id="captchavid" class="controlspan">
							<option value="1" <?if($config['captcha'] == '1') echo "selected";?>>Обычная капча (Цифры)</option>
							<option value="2" <?if($config['captcha'] == '2') echo "selected";?>>Средняя капча (Цифры+буквы)</option>
							<option value="3" <?if($config['captcha'] == '3') echo "selected";?>>ReCaptcha (Гугл капча)</option>
						</select>
					</div>
					<div style="clear: both;"></div>
				</div>

				<? if ($config['captcha'] == '3'): ?>
				<div class="blocks_vaz botst bots">
					<h4><i class="fa fa-lock" aria-hidden="true"></i>  Настройка ReCaptcha</h4>
					<div class="bloks_inp_set bots">
						<div class="form_blocks_s">
							<label>Html ключ</label>
							<input autocomplete="off" type="text" id="htmlinp_capts" value="<?=$config['ReCapthca_key_html']?>">
						</div>
						<div class="form_blocks_s">
							<label>Секретный ключ</label>
							<input autocomplete="off" type="text" id="secrinp_capts" value="<?=$config['ReCapthca_key_secret']?>">
						</div>
						<div style="clear: both;"></div>
					</div>
				</div>
				<?endif;?>
				<h4><i class="fa fa-lightbulb-o" aria-hidden="true"></i> Тех. работы</h4>
				<div class="bloks_inp_set bots">
					<div class="blockknops">
						<input  class="checkswit__input" type="checkbox" id="project_off" <?if($config['tex_sup']=='true') echo "checked"?>>
					<label class="checkswit__label" for="project_off">
							<span class="godscheck__check"><i class="fa fa-check" aria-hidden="true"></i></span>
							<span class="errcheck__check"><i class="fa fa-times" aria-hidden="true"></i></span>
						</label>
					</div>

				</div>
				<div class="blocks_bottoms_set">
					<center><button onclick="funcr['save_s_os'](); return false;">Сохранить</button></center>
				</div>
			</form>
		</div>
	</div>
</div