<?
$infid = $_GET['id'];


// Check all info
$check_user_inf = $db->selects("users","id = ?",[1=>$infid]);

$check_inform = $check_user_inf;
//


// Check refer

//
$check_refer_inf = $db->column("users", "ref = ?",[1=>$infid]);

if ($check_inform['permission'] == '1')
	$perm_info = 'Красный алмаз';

else if ($check_inform['permission'] == '2') 
	$perm_info = 'Желтый алмаз';

else if($check_inform['permission'] == '3')
	$perm_info = 'Синий алмаз';

else $perm_info = 'Неизвестное звание';

?>


<?if(!empty($check_inform)):?>
<div class="blolckscenters">
	
	<div class="alls_blocks_uer_al fff">
		<div class="blocks_left_w bots">
			<div class="block_tems">
				<div class="block_tems_is">
					<img src="system/mane/img/user.png" alt="">
					<div class="pod_blocks_prof">
						<small>Бонусов: <?=checkprob($check_inform['bonus'])?></small>
						<br>
						<small>Серфинга: <?=checkprob($check_inform['count_serf'])?></small>
						<br>
						<br>
						<?=countdat($check_inform['date_auth'])?>
					</div>
				</div>
			</div>
		</div>
		<div class="blocks_contents_in bots">

			<div class="contnts_all_bloks_hist">
				<div class="blocksinf_blockss_user bots">
					<h4 class="names_pod_raz_us"><i class="fa fa-list" aria-hidden="true"></i> Информация о пользователе</h4>
					<div class="content_pod_bl_user">
						<table>
							<tr>
								<td>ID:</td>
								<td><b><?=$check_inform['id']?></b></td>
							</tr>
							<tr>
								<td>Логин:</td>
								<td><b><?=$check_inform['login']?></b></td>
							</tr>
							<tr>
								<td>E-mail:</td>
								<td><b><?=checkprob($check_inform['email'])?></b></td>
							</tr>

							<tr>
								<td>Payeer:</td>
								<td><b><?=checkprob($check_inform['purse_pay'])?></b></td>
							</tr>
						</table>
						<table style="margin-top: 15px;">
							<tr>
								<td>IP пользователя:</td>
								<td><b><?=checkprob($check_inform['ip'])?></b></td>
							</tr>
							<tr>
								<td>Пришел с сайта:</td>
								<td><b><?=checkprob($check_inform['urL_P'])?></b></td>
							</tr>						
						</table>
						<table style="margin-top: 15px;">
							<tr>
								<td>Дата регистрации:</td>
								<td><b><?=checkprob($check_inform['date_reg'])?></b></td>
							</tr>
							<tr>
								<td>Дата авторизации:</td>
								<td><b><?=checkprob(date('d.m.Y H:i',$check_inform['date_auth']))?></b></td>
							</tr>						
						</table>
						<table style="margin-top: 15px;">
							<tr>
								<td>Привилегия:</td>
								<td><b><?=$perm_info?></b> <span id="rel_permission" style="font-size: 12px; color: #54BC5B;"><i class="fa fa-pencil" aria-hidden="true"></i> Изменить</span></td>
							</tr>
							<?if($check_inform['permission'] > '1'):?>
							<tr>
								<td>Действует до:</td>
								<td><b><?=checkprob($check_inform['time_perm'])?></b></td>
							</tr>
							<?endif;?>
						</table>
					</div>
				</div>

				<div class="blocksinf_blockss_user bots">
					<h4 class="names_pod_raz_us"><i class="fa fa-area-chart" aria-hidden="true"></i> Статистика</h4>
					<div class="content_pod_bl_user">
						<table>
							<tr>
								<td>Рефералов:</td>
								<td><b><?=$check_refer_inf?></b></td>
							</tr>
							<tr>
								<td>Зараб. на рефералах:</td>
								<td><b><?=$check_inform['ref_balanc']?> руб</b></td>
							</tr>
						</table>
						<table style="margin-top: 15px;">
							<tr>
								<td>Баланс:</td>
								<td><b><?=$check_inform['balance']?> руб</b> <span id="blocks_add_money" title="Добавить" style="color: #2e9e9d;">+</span> <span id="blocks_reload_money" title="Убрать" style="color: #DB5C5C;">-</span></td>
							</tr>
							<tr>
								<td>Рекламный баланс:</td>
								<td><b><?=$check_inform['reple_balance']?> руб</b> <span id="blocks_add_money_r" title="Добавить" style="color: #2e9e9d;">+</span> <span id="blocks_reload_money_r" title="Убрать" style="color: #DB5C5C;">-</span></td>
							</tr>
						</table>
						<table style="margin-top: 15px;">
							<tr>
								<td>Выведено:</td>
								<td><b><?=$check_inform['wea_balance']?> руб</b></td>
							</tr>
							<tr>
								<td>Пополнено:</td>
								<td><b><?=$check_inform['reple_balance_all']?> руб</b></td>
							</tr>
						</table>
					</div>
				</div>


				<div class="blocksinf_blockss_user bots">
					<h4 class="names_pod_raz_us"><i class="fa fa-ban" aria-hidden="true"></i> Информация о бане</h4>
					<div class="content_pod_bl_user">
						<table>
							<tr>
								<td>Всего банов:</td>
								<td><b><?=$check_inform['all_ban']?></b></td>
							</tr>
							<tr>
								<td>Бан:</td>
								<td><?=$check_inform['ban'] > 0 ? '<b style="color: #4FC074;">Есть</b>' : '<b style="color: #C35757;">Нет</b>' ?></td>
							</tr>
						</table>
						<table style="margin-top: 15px;">
							<tr>
								<td>Время бана:</td>
								<td><b><?=checkprob($check_inform['ban_time'])?></b></td>
							</tr>
							<tr>
								<td>Окончание бана:</td>
								<td><b><?=checkprob($check_inform['ban_time_z'])?></b></td>
							</tr>
							<tr>
								<td>Причина:</td>
								<td><b><?=checkprob($check_inform['ban_reason'])?></b></td>
							</tr>
						</table>
					</div>
				</div>

<?
/*ORDER BY id DESC LIMIT 10*/
$list_perm_us = $db->row("permis_list","login_u = ? ORDER BY id DESC LIMIT 10",[1=>$check_inform['login']]);
$list_wea_us = $db->row("withdrawal_list","name_w = ? ORDER BY id DESC LIMIT 10",[1=>$check_inform['login']]);
$list_rep_us = $db->row("pay_rep_l","log_user = ? ORDER BY id DESC LIMIT 10",[1=>$check_inform['login']]);
?>


				<div class="blocksinf_blockss_user bots">
					<h4 class="names_pod_raz_us"><i class="fa fa-history" aria-hidden="true"></i> История аккаунта | Последние 10-ть действий</h4>
					<div class="content_pod_bl_user">
						<div class="head_menu_history_blo">
							<ul>
								<li><a asc="permis" class="active">Привилегия</a></li>
								<li><a asc="wea">Выплаты</a></li>
								<li><a asc="repl">Пополнение</a></li>
							</ul>
						</div>
						<div class="blocks_history_all">
							<div class="pod_inf_bl_h good_active" id="permis">
								
								<?
								if (count($list_perm_us) == 0) {
									echo '<div style="    text-align: center;
    font-size: 12px;"><p>Нет данных</p></div>';
								} else {

									foreach ($list_perm_us as $listhisperm) {

										echo ' 

											<div><p><span>'.$listhisperm['date'].'</span>
									Привилегия: 

										 ';

										switch ($listhisperm['permission']) {
											case '1': echo 'Красный алмаз';
											break;

											case '2': echo 'Желтый алмаз';
											break;
											case '3': echo 'Синий алмаз';
											break;	
										}

										echo '<br>Цена: '.$listhisperm['sum_p'].' руб
										</p></div>
										 ';
									}
								}
								?>	

							</div>
							<div class="pod_inf_bl_h" id="wea">
								<?
								if (count($list_wea_us) == 0) {
									echo '<div style="    text-align: center;
    font-size: 12px;"><p>Нет данных</p></div>';
								} else {
									foreach ($list_wea_us as $listhiswea) {

										echo ' 

											<div><p><span>'.$listhiswea['date'].' '.$listhiswea['date_t'].'</span>
									Сумма: 

										 ';

										echo ' '.$listhiswea['sum_w'].' руб.<br>Кошелек: P131313
										</p></div>
										 ';
									}
								}
								?>	
							</div>
							<div class="pod_inf_bl_h" id="repl">
								<?
								if (count($list_rep_us) == 0) {
									echo '<div style="    text-align: center;
    font-size: 12px;"><p>Нет данных</p></div>';
								} else {
									foreach ($list_rep_us as $listhiswrep) {

										echo ' 

											<div><p><span>'.$listhiswrep['date_p'].'</span>
									Пополнил аккаунт на 

										 ';

										echo $listhiswrep['sum_p'].' руб. <br>Статус: ';

										switch ($listhiswrep['status']) {
											case '0': echo 'Отменен';
											break;

											case '1': echo 'Ожидает';
											break;
											case '2': echo 'Зачислено';
											break;	
										}

										echo ' <br>Номер заявки: '.$listhiswrep['pay_id_p'].'</p></div>
										 ';
									}
								}
								?>	
							</div>				
						</div>
					</div>
				</div>


<script>
$(function() {
    $(".head_menu_history_blo a").on('click', function() {
        $(".head_menu_history_blo a").removeClass("active");
        $(this).toggleClass("active");

        var content_s = $(this).attr("asc");

        $(".blocks_history_all div").removeClass("good_active");
        $("#"+content_s).toggleClass("good_active");
    });
});
</script>
				<div class="blocksinf_blockss_user bots">
					<h4 class="names_pod_raz_us"><i class="fa fa-flag-o" aria-hidden="true"></i> Действие</h4>
					<div class="content_pod_bl_user">
						<button class="button_deqc del" id="showHideContent_del">Удалить аккаунт</button>
						<button class="button_deqc bans" id="showHideContent_ban">Бан</button>
					</div>
				</div>


			</div>
			<div style="clear: both;"></div>
		</div>
		<div style="clear: both;"></div>
	</div>

</div>
<!--||-->
<input type="hidden" class="id_users" value="<?=$_GET['id']?>">

<div class="blocks_info_podtverd">
	<div class="blocks_headers_podtverd_bl">
		<h4>Подтверждение действия</h4>
	</div>
	<div class="blocks_content_podtverd_bl">
		<p>Вы действительно хотите удалить аккаунт?<br>Восстановить его будет невозможно.</p>
	</div>
	<div class="blocks_bottom_podtverd_bl">
		<button onclick="delsacc();">Подтвердить</button> <button style="background: #9c5c79;" id="dont_sh">Отменить</button>
	</div>

</div>
<!--{|  |}-->


<div class="block_inf_vibor mobal_name_b bans_lit_inf">
	<div class="mobal_degi">
		<div class="content_vibor_in">
			<div class="headers_blocks_mob">
				<h4 class="title_bobl">Редактирование бана</h4>
			</div>
			<div class="body_content_mob ">
				<?if($check_inform['ban'] == '0'):?>
				<div class="bots form_input_lab_inf">
					<label>Время бана:</label>
					<div><input type="text" id="ban_times_new" placeholder="В минутах, пример: 1 - это 1 мин., 60 - это 1 час"></div>
				</div>
				<div  class="bots form_input_lab_inf">
					<label>Причина бана</label>
					<div><input type="text" id="comment_ban_new" placeholder="Описать коротко причину"></div>
				</div>
				<?else:?>
					<div>
						<p style="text-align: center; font-size: 13px; color: #5F5F5F;">У игрока уже есть бан! <br>Доступна только функция разбан</p>
					</div>
				<?endif;?>
			</div>
			<div class="bottom_block_mod no_top_m">
				<?if($check_inform['ban'] == '0'):?><button class="gres" onclick="godbans();">Готово</button><?else:?> <button class="gres" onclick="unban();">Разбанить</button> <?endif;?> <button id="off_blocks_n" class="rezs">Отмена</button>
			</div>
		</div>
	</div>
</div>





<div class="block_inf_vibor mobal_name_b blocks_add_monet">
	<div class="mobal_degi">
		<div class="content_vibor_in">
			<div class="headers_blocks_mob">
				<h4 class="title_bobl">Основной баланс</h4>
			</div>
			<div class="body_content_mob ">
				<div class="bots form_input_lab_inf">
					<label>Сумму добавления:</label>
					<div><input type="text" id="money_add_b" placeholder="В рублях, пример: 0.20 руб или 100 руб"></div>
				</div>
			</div>
			<div class="bottom_block_mod no_top_m">
				<button class="gres" onclick="addbalance();">Готово</button> <button id="offs_block_money" class="rezs">Отмена</button>
			</div>
		</div>
	</div>
</div>

<div class="block_inf_vibor mobal_name_b blocks_del_monet">
	<div class="mobal_degi">
		<div class="content_vibor_in">
			<div class="headers_blocks_mob">
				<h4 class="title_bobl">Основной баланс</h4>
			</div>
			<div class="body_content_mob ">
				<div class="bots form_input_lab_inf">
					<label>Сумма удаления:</label>
					<div><input type="text" id="money_del_b" placeholder="В рублях, пример: 0.20 руб или 100 руб"></div>
				</div>
			</div>
			<div class="bottom_block_mod no_top_m">
				<button class="gres" onclick="delbalance();">Готово</button> <button id="offsd_block_money" class="rezs">Отмена</button>
			</div>
		</div>
	</div>
</div>




<div class="block_inf_vibor mobal_name_b blocks_add_monet_r">
	<div class="mobal_degi">
		<div class="content_vibor_in">
			<div class="headers_blocks_mob">
				<h4 class="title_bobl">Рекламный баланс</h4>
			</div>
			<div class="body_content_mob ">
				<div class="bots form_input_lab_inf">
					<label>Сумму добавления:</label>
					<div><input type="text" id="money_add_b_r" placeholder="В рублях, пример: 0.20 руб или 100 руб"></div>
				</div>
			</div>
			<div class="bottom_block_mod no_top_m">
				<button class="gres" onclick="addbalance_r();">Готово</button> <button id="offs_block_money_r" class="rezs">Отмена</button>
			</div>
		</div>
	</div>
</div>

<div class="block_inf_vibor mobal_name_b blocks_del_monet_r">
	<div class="mobal_degi">
		<div class="content_vibor_in">
			<div class="headers_blocks_mob">
				<h4 class="title_bobl">Рекламный баланс</h4>
			</div>
			<div class="body_content_mob ">
				<div class="bots form_input_lab_inf">
					<label>Сумма удаления:</label>
					<div><input type="text" id="money_del_b_r" placeholder="В рублях, пример: 0.20 руб или 100 руб"></div>
				</div>
			</div>
			<div class="bottom_block_mod no_top_m">
				<button class="gres" onclick="delbalance_r();">Готово</button> <button id="offsd_block_money_" class="rezs">Отмена</button>
			</div>
		</div>
	</div>
</div>






<div class="block_inf_vibor mobal_name_b blocks_rel_per">
	<div class="mobal_degi">
		<div class="content_vibor_in">
			<div class="headers_blocks_mob">
				<h4 class="title_bobl">Настройка привилегии</h4>
			</div>
			<div class="body_content_mob ">
				<div class="bots form_input_lab_inf">
					<label>Привилегия</label>
					<div><select id="permission_name_d">
						<option value="1" <?= $check_inform['permission'] == '1' ? 'selected' : '' ?>>Красный алмаз</option>
						<option value="2" <?= $check_inform['permission'] == '2' ? 'selected' : '' ?>>Желтый алмаз</option>
						<option value="3" <?= $check_inform['permission'] == '3' ? 'selected' : '' ?>>Синий алмаз</option>
					</select></div>
				</div>
				<div class="bots form_input_lab_inf">
					<label>Время привилегии</label>
					<div><input type="text" id="perm_date_f" placeholder="В формате дд.мм.гггг ч:м" value="<?=$check_inform['time_perm']?>"></div>
				</div>
			</div>
			<div class="bottom_block_mod no_top_m">
				<button class="gres" onclick="rel_perm_us();">Готово</button> <button id="rel_permission_bott" class="rezs">Отмена</button>
			</div>
		</div>
	</div>
</div>





<?else:?>
	<p style="font-size: 13px; color: #4A4A4A; text-align: center;">Пользователь не найден, <a href="admins?sez=user&stat=list">вернутся к списку</a></p>
<?endif;?>