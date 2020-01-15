<?

/*$testprov = json_decode(json_encode($config), true);*/


?>

<div class="blolckscenters">
	<div class="blocks_settrings_alls fff" style="padding: 15px;">
		<div class="pod_blocks_name_set">
			<form method="POST">
				<h4><i class="fa fa-cog" aria-hidden="true"></i> Основные настройки пополнения Payeer</h4>
				<div class="bloks_inp_set bots">
					<div class="form_blocks_s">
						<label>Минимальная сумма</label>
						<input type="text" id="payer_popol_sum" placeholder="Минимально 1 руб." value="<?=$config_p_r['min_sum_weap']?>">
					</div>
					<div style="clear: both;"></div>
				</div>
				<h4><i class="fa fa-cog" aria-hidden="true"></i> Настройки платежной системы Payeer | API</h4>
				<div class="bloks_inp_set bots">
					<div class="form_blocks_s">
						<label>Номер магазина</label>
						<input type="text" id="payer_popol_markt" value="<?=$config_p_r['m_shop']?>">
					</div>
					<div class="form_blocks_s">
						<label>Секретный ключ магазина</label>
						<input type="text" id="payeer_id_form_w" value="<?=$config_p_r['m_key'];?>">
					</div>
					<div style="clear: both;"></div>
				</div>
				<div class="bloks_inp_set bots">
					<div class="form_blocks_s">
						<label>Комментарий</label>
						<input id="payer_popol_messeg" type="text" value="<?=$config_p_r['name_infs_r'];?>">
					</div>
					<div style="clear: both;"></div>
				</div>
				<h4><i class="fa fa-lightbulb-o" aria-hidden="true"></i> Статус пополнений</h4>

					<div class="bloks_inp_set bots">
						<div class="blockknops">
							<input  class="checkswit__input" type="checkbox" id="payer_popol_checks" <?= $config_p_r['tex_sup']=='true' ? "checked" : ''; ?>>
							<label class="checkswit__label" for="payer_popol_checks" >
								<span class="godscheck__check"><i class="fa fa-check" aria-hidden="true"></i></span>
								<span class="errcheck__check"><i class="fa fa-times" aria-hidden="true"></i></span>
							</label>
						</div>
					</div>

				<div class="blocks_bottoms_set">
					<center><button onclick="funcr['save_s_plats_pop'](); return false;">Сохранить</button></center>
				</div>
			</form>
		</div>
	</div>
</div