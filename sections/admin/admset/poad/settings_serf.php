<?
@include DIR_BLOCK."/config/serf.php";
?>
<div class="blolckscenters">
	<div class="blocks_settrings_alls fff" style="padding: 15px;">
		<div class="pod_blocks_name_set">
			<form method="POST">
				<h4><i class="fa fa-cog" aria-hidden="true"></i> Основные настройки</h4>
				<div class="bloks_inp_set bots">
					<div class="form_blocks_s">
						<label>Время повторного просмотра (в минутах)</label>
						<input type="text" id="time_view" value="<?=$serf['times']?>">
					</div>
					<div class="form_blocks_s">
						<label>Стоимость уникальной (1 просмотр - 1 аккаунт)</label>
						<input type="text" id="unic_view" value="<?=$serf['unic_sum']?>">
					</div>
					<div style="clear: both;"></div>
				</div>
				<br>
				<div class="bloks_inp_set bots">
					<div class="form_blocks_s">
						<label>Максимальный лимит ссылок</label>
						<input type="text" id="limit_web" value="<?=$serf['limits']?>">
					</div>
					<div class="form_blocks_s">
						<label>Процент для админа</label>
						<input type="text" id="adm_pr" value="<?=$serf['sum_wea_adm']?>">
					</div>
					<div style="clear: both;"></div>
				</div>
				<br>
				<h4><i class="fa fa-cog" aria-hidden="true"></i> Время серфинга</h4>
				<div class="bloks_inp_set bots">
					<div class="form_blocks_s">
						<label>#1</label>
						<input type="text" id="time_dp_serf" value="<?=$serf['times_1']?>">
					</div>
					<div class="form_blocks_s">
						<label>#2</label>
						<input type="text" id="time_dp_serf_2" value="<?=$serf['times_2']?>">
					</div>
					<div style="clear: both;"></div>
				</div>
				<br>
				<div class="bloks_inp_set bots">
					<div class="form_blocks_s">
						<label>#3</label>
						<input type="text" id="time_dp_serf_3" value="<?=$serf['times_3']?>">
					</div>
					<div class="form_blocks_s">
						<label>#4</label>
						<input type="text" id="time_dp_serf_4" value="<?=$serf['times_4']?>">
					</div>
					<div style="clear: both;"></div>
				</div>
				<br>
				<div class="bloks_inp_set bots">
					<div class="form_blocks_s">
						<label>#5</label>
						<input type="text" id="time_dp_serf_5" value="<?=$serf['times_5']?>">
					</div>
					<div class="form_blocks_s">
						<label>#6</label>
						<input type="text" id="time_dp_serf_6" value="<?=$serf['times_6']?>">
					</div>
					<div style="clear: both;"></div>
				</div>
				<div class="bloks_inp_set bots">
					<div class="form_blocks_s">
						<label>#7</label>
						<input type="text" id="time_dp_serf_7" value="<?=$serf['times_7']?>">
					</div>
					<div style="clear: both;"></div>
				</div>
				<br>
				<br>
				<h4><i class="fa fa-cog" aria-hidden="true"></i> Обычный серфинг</h4>
				<div class="bloks_inp_set bots">
					<div class="form_blocks_s">
						<label>Минимальная стоимость серфинга</label>
						<input type="text" id="min_sum" value="<?=$serf['mis_sum']?>">
					</div>
					<div style="clear: both;"></div>
				</div>
				<br>
				<div class="bloks_inp_set bots">
					<div class="form_blocks_s">
						<label>ДП стоимость за <?=$serf['times_2']?> сек</label>
						<input type="text" id="dp_sum_1" value="<?=$serf['sum_2']?>">
					</div>
					<div class="form_blocks_s">
						<label>ДП стоимость за <?=$serf['times_3']?> сек</label>
						<input type="text" id="dp_sum_2" value="<?=$serf['sum_3']?>">
					</div>
					<div style="clear: both;"></div>
				</div>
				<br>
				<div class="bloks_inp_set bots">
					<div class="form_blocks_s">
						<label>ДП стоимость за <?=$serf['times_4']?> сек</label>
						<input type="text" id="dp_sum_3" value="<?=$serf['sum_4']?>">
					</div>
					<div class="form_blocks_s">
						<label>ДП стоимость за <?=$serf['times_5']?> сек</label>
						<input type="text" id="dp_sum_4" value="<?=$serf['sum_5']?>">
					</div>
					<div style="clear: both;"></div>
				</div>
				<br>
				<div class="bloks_inp_set bots">
					<div class="form_blocks_s">
						<label>ДП стоимость за <?=$serf['times_6']?> сек</label>
						<input type="text" id="dp_sum_5" value="<?=$serf['sum_6']?>">
					</div>
					<div class="form_blocks_s">
						<label>ДП стоимость за <?=$serf['times_7']?> сек</label>
						<input type="text" id="dp_sum_6" value="<?=$serf['sum_7']?>">
					</div>
					<div style="clear: both;"></div>
				</div>
				<br>
				<h4><i class="fa fa-cog" aria-hidden="true"></i> Баннерный серфинг</h4>
				<div class="bloks_inp_set bots">
					<div class="form_blocks_s">
						<label>Минимальная стоимость серфинга</label>
						<input type="text" id="min_sum_b" value="<?=$serf['mis_sum_ban']?>">
					</div>
					<div style="clear: both;"></div>
				</div>
				<br>
				<div class="bloks_inp_set bots">
					<div class="form_blocks_s">
						<label>ДП стоимость за <?=$serf['times_2']?> сек</label>
						<input type="text" id="dp_sum_1_b" value="<?=$serf['sum_ban_2']?>">
					</div>
					<div class="form_blocks_s">
						<label>ДП стоимость за <?=$serf['times_3']?> сек</label>
						<input type="text" id="dp_sum_2_b" value="<?=$serf['sum_ban_3']?>">
					</div>
					<div style="clear: both;"></div>
				</div>
				<br>
				<div class="bloks_inp_set bots">
					<div class="form_blocks_s">
						<label>ДП стоимость за <?=$serf['times_4']?> сек</label>
						<input type="text" id="dp_sum_3_b" value="<?=$serf['sum_ban_4']?>">
					</div>
					<div class="form_blocks_s">
						<label>ДП стоимость за <?=$serf['times_5']?> сек</label>
						<input type="text" id="dp_sum_4_b" value="<?=$serf['sum_ban_5']?>">
					</div>
					<div style="clear: both;"></div>
				</div>
				<br>
				<div class="bloks_inp_set bots">
					<div class="form_blocks_s">
						<label>ДП стоимость за <?=$serf['times_6']?> сек</label>
						<input type="text" id="dp_sum_5_b" value="<?=$serf['sum_ban_6']?>">
					</div>
					<div class="form_blocks_s">
						<label>ДП стоимость за <?=$serf['times_7']?> сек</label>
						<input type="text" id="dp_sum_6_b" value="<?=$serf['sum_ban_7']?>">
					</div>
					<div style="clear: both;"></div>
				</div>
				<div class="blocks_bottoms_set">
					<center><button onclick="funcr['save_s_serf_set'](); return false;">Сохранить</button></center>
				</div>
			</form>
		</div>
	</div>
</div