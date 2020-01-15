<?

/*$testprov = json_decode(json_encode($config), true);*/


?>

<div class="blolckscenters">
	<div class="blocks_settrings_alls fff" style="padding: 15px;">
		<div class="pod_blocks_name_set">
			<form method="POST">
				<h4><i class="fa fa-cog" aria-hidden="true"></i> Расположение проверок</h4>
				<small>Внимание! Если вы навярняка не знаете что означают эти настройки, то не меняйте их.<br> На работу скрипта это не влияет!</small><br><br>
				
				<div class="bloks_inp_set bots">
					<div class="form_blocks_s">
						<label>Перенаправляющая страница</label>
						<input type="text" id="web_size_start" value="<?=$bonus_s['name_b_1']?>">
					</div>
					<div class="form_blocks_s">
						<label>Награждающая страница</label>
						<input type="text" id="web_size_end" placeholder="В формате P11111111" value="<?=$bonus_s['name_b_2']?>">
					</div>
					<div style="clear: both;"></div>
				</div>
				<br>
				<h4>Таймер безопасности</h4>
				<div class="bloks_inp_set bots">
					<div class="form_blocks_s">
						<label>Минимальный (секунды)</label>
						<input type="text" id="min_s_set_b" placeholder="Если 0, возможен обход" value="<?=$bonus_s['min_timeb_b']?>">
					</div>
					<div class="form_blocks_s">
						<label>Максимальный (секунды)</label>
						<input type="text" id="max_s_set_b" value="<?=$bonus_s['max_timeb_b'];?>">
					</div>
					<div style="clear: both;"></div>
				</div>
				<br>
				<h4><i class="fa fa-lightbulb-o" aria-hidden="true"></i> Статус получения бонусов</h4>

					<div class="bloks_inp_set bots">
						<div class="blockknops">
							<input  class="checkswit__input" type="checkbox" id="bonus_stat_off" <?=$bonus_s['status_b'] == 'true' ? "checked" : ''; ?>>
							<label class="checkswit__label" for="bonus_stat_off" >
								<span class="godscheck__check"><i class="fa fa-check" aria-hidden="true"></i></span>
								<span class="errcheck__check"><i class="fa fa-times" aria-hidden="true"></i></span>
							</label>
						</div>
					</div>

				<div class="blocks_bottoms_set">
					<center><button onclick="funcr['save_s_bonus_set'](); return false;">Сохранить</button></center>
				</div>
			</form>
		</div>
	</div>
</div