<?

/*$testprov = json_decode(json_encode($config), true);*/


?>

<div class="blolckscenters">
	<div class="blocks_settrings_alls fff" style="padding: 15px;">
		<div class="pod_blocks_name_set">
			<form method="POST">
				<h4><i class="fa fa-cog" aria-hidden="true"></i> Расположение проверок</h4>
				<div class="bloks_inp_set bots">
					<div class="form_blocks_s">
						<label>Дополнительный % к сумме</label>
						<input type="text" id="ex_pr_start" placeholder="0 - нет %" value="<?=$chekinex['pr_opl']?>">
					</div>
					<div style="clear: both;"></div>
				</div>
				<br>
				<h4><i class="fa fa-lightbulb-o" aria-hidden="true"></i> Статус обменника</h4>

					<div class="bloks_inp_set bots">
						<div class="blockknops">
							<input  class="checkswit__input" type="checkbox" id="ex_stat_off" <?=$chekinex['st_pr'] == 'true' ? "checked" : ''; ?>>
							<label class="checkswit__label" for="ex_stat_off" >
								<span class="godscheck__check"><i class="fa fa-check" aria-hidden="true"></i></span>
								<span class="errcheck__check"><i class="fa fa-times" aria-hidden="true"></i></span>
							</label>
						</div>
					</div>

				<div class="blocks_bottoms_set">
					<center><button onclick="funcr['save_s_ex_set'](); return false;">Сохранить</button></center>
				</div>
			</form>
		</div>
	</div>
</div