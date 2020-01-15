<?

/*$testprov = json_decode(json_encode($config), true);*/


?>

<div class="blolckscenters">
	<div class="blocks_settrings_alls fff" style="padding: 15px;">
		<div class="pod_blocks_name_set">
			<form method="POST">
				<h4><i class="fa fa-cog" aria-hidden="true"></i> Основные настройки выплат <b><?statuspayer()?></b></h4>
				<div class="bloks_inp_set bots">
					<div class="form_blocks_s">
						<label>Минимальная сумма</label>
						<input type="text" id="payeer_min_form_w" placeholder="Минимально 1 руб." value="<?=$config_p['min_sum_weap']?>">
					</div>
					<div style="clear: both;"></div>
				</div>
				<h4><i class="fa fa-money" aria-hidden="true"></i> Настройки платежной системы Payeer | API</h4>
				<div class="bloks_inp_set bots">
					<div class="form_blocks_s">
						<label>Номер кошелька</label>
						<input type="text" id="payeer_form_w" placeholder="В формате P11111111" value="<?=$config_p['Payeer']?>">
					</div>
					<div class="form_blocks_s">
						<label>API ID</label>
						<input type="text" id="payeer_id_form_w" value="<?=$config_p['api_id'];?>">
					</div>
					<div style="clear: both;"></div>
				</div>
				<div class="bloks_inp_set bots">
					<div class="form_blocks_s">
						<label>Секретный ключ</label>
						<input id="payeer_secr_form_w" type="text" value="<?=$config_p['secret_api'];?>">
					</div>
					<div style="clear: both;"></div>
				</div>
				<h4><i class="fa fa-lightbulb-o" aria-hidden="true"></i> Статус выплат</h4>
					<div class="bloks_inp_set bots">
						<div class="blockknops">
							<input  class="checkswit__input" type="checkbox" id="payeer_off_form_w_ok_p" <?= $config_p['stat_wea_f'] == 'true' ? "checked" : ''; ?>>
							<label class="checkswit__label" for="payeer_off_form_w_ok_p" >
								<span class="godscheck__check"><i class="fa fa-check" aria-hidden="true"></i></span>
								<span class="errcheck__check"><i class="fa fa-times" aria-hidden="true"></i></span>
							</label>
						</div>
					</div>
				<h4><i class="fa fa-lightbulb-o" aria-hidden="true"></i> Ручные выплаты</h4>
					<div class="bloks_inp_set bots">
						<div class="blockknops">
							<input  class="checkswit__input" type="checkbox" id="payeer_manu_form_w_ok_p" <?= $config_p['manual_wea_f'] == 'true' ? "checked" : ''; ?>>
							<label class="checkswit__label" for="payeer_manu_form_w_ok_p" >
								<span class="godscheck__check"><i class="fa fa-check" aria-hidden="true"></i></span>
								<span class="errcheck__check"><i class="fa fa-times" aria-hidden="true"></i></span>
							</label>
						</div>
					</div>

				<div class="blocks_bottoms_set">
					<center><button onclick="funcr['save_s_plats'](); return false;">Сохранить</button></center>
				</div>
			</form>
		</div>
	</div>
</div