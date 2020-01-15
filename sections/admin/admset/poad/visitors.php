<div class="blolckscenters">
	<div class="blocks_visitors fff bots" style="padding: 15px;">
		<div class="pod_blocks_name_set">
			<h4>Основные параметры</h4>
			<div class="bloks_inp_set bots">
				<div class="form_blocks_s">
					<label>Название раздела</label>
					<input type="text" id="name_project" value="<?=$view['name_proj']?>">
				</div>
				<div class="form_blocks_s">
					<label>Стоимость 1-го просмотра</label>
					<input type="text" id="sum_1_visit" placeholder="Сумма в рублях" value="<?=$view['min_s_views']?>">
				</div>
				<div style="clear: both;"></div>
			</div>
			<div class="bloks_inp_set bots">
				<div class="form_blocks_s">
					<label>Лимит на кол. заказов</label>
					<input type="number" id="limit_count_za" value="<?=$view['max_lims_v']?>">
				</div>
				<div style="clear: both;"></div>
			</div>
		</div>
		<div class="pod_blocks_name_set">
			<h4></h4>
			<table>
				<tr>
					<td><label>Статус работы: </label></td>
					<td>
						
						<div class="blockknops">
							<input  class="checkswit__input" type="checkbox" id="off_on_pluguns_jobs" <?= $view['status_jobs']=='true' ? "checked" : ''; ?>>
							<label class="checkswit__label" for="off_on_pluguns_jobs" >
								<span class="godscheck__check"><i class="fa fa-check" aria-hidden="true"></i></span>
								<span class="errcheck__check"><i class="fa fa-times" aria-hidden="true"></i></span>
							</label>
						</div>						

					</td>
				</tr>
			</table>
		</div>
				<div class="blocks_bottoms_set" style="margin-top: 20px;">
					<center><button onclick="funcr['save_visitor'](); return false;">Сохранить</button></center>
				</div>
</div>