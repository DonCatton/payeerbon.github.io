<?top('Список серфингов');?>
<link rel="stylesheet" href="/system/mane/css/serferc.css">
<div class="alert alert-info">
	<strong>Серфинг</strong>
	<br>
	Уникальные возможности по увеличению посещаемости вашего сайта. Тонкая настройка распределения посещений в течении дня.
</div>

<a href="/addserf" class="add_advert">Добавить ссылку</a>
<div class="alls_blocks_list_serf">
<?
$limssss = '7';

$Param1 = "SELECT * FROM `serf` WHERE users = '".clear(ULG)."' AND type = '1' ORDER BY `id` DESC LIMIT 0, ".$limssss;
$Param2 = "SELECT * FROM `serf` WHERE users = '".clear(ULG)."' AND type = '1' ORDER BY `id` DESC LIMIT START, ".$limssss;
$Param4 = 'serflist';


$Count = $db->column("serf","users = ? AND type = 1",[1=>ULG]);
if (!$_GET['page']) {
	$_GET['page'] = 1;
	$Result = $db->multi_query($Param1);
} else {
	$Start = ($_GET['page'] - 1) * $limssss;
	$Result = $db->multi_query(str_replace('START', $Start, $Param2));
}


$checkon2 = count($Result);
if ($checkon2 > 0) {
	if ($Count > 0) {
		foreach ($Result as $infserf) {
			$chnums = $infserf['balance']/$infserf['sum'];
			$checview = (int) ($chnums);	
			echo ' 

			<div class="blocks_serf_list_num">
				<table>
					<tbody>
						<tr>
							<td>';
							if ($infserf['status'] == '1') {
								echo '<i onclick="relstats('.$infserf['id'].');" class="fa fa-pause status_serf pause" aria-hidden="true" title="Приостановить показ"></i>';
							} else {
								echo '<i onclick="relstats('.$infserf['id'].');" class="fa fa-play status_serf play" aria-hidden="true" title="Запустить"></i>';
							}
							echo '</td>
							<td width="406">
								<div class="name_block_serf_header"><h4>'.$infserf['name_web'].' <span>№'.$infserf['id'].'</span></h4></div>
								<div class="po_headers_info_serf">
									<span>'.$infserf['pod_text'].'</span>
									<a href="'.$infserf['web'].'" target="_blank"><font color="#767676">'.$infserf['web'].'</font></a>
								</div>
								<div class="bottoms_bl_pod_h">
									<div class="lefts_bl">
										<span>Клик: '.$infserf['sum'].' руб. &nbsp</span>
										<span>Всего показов: '.$infserf['all_views'].' &nbsp</span>
										<span>Осталось: '.$checview.'</span>			
									</div>
									<div class="rights_bl">
										<span class="reloads_bl"><a href="/rel_serf?id='.$infserf['id'].'"><i title="Редактировать" class="fa fa-pencil" aria-hidden="true"></i></a></span>
										<span class="dels_bl"><i onclick="delsserf('.$infserf['id'].')" title="Удалить" class="fa fa-trash" aria-hidden="true"></i></span>
									</div>
									<div style="clear: both;"></div>
								</div>

							</td>
							<td>
								<div class="popols_serf">
									<h5>'.$infserf['balance'].' руб</h5>
									<span class="popols_ers" hsp="'.$infserf['id'].'">Пополнить</span>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
			</div>


			 ';
		}
	} else {
		echo '<span class="info_check_er">У вас нет сайтов, <a href="/addserf">добавить сайт</a></span>';
	}
} else {
	echo '<span class="info_check_er">У вас нет сайтов, <a href="/addserf">добавить сайт</a></span>';
}
PageSelector($Param4, $_GET['page'], $Count, $limssss, 'serflist?page=');	// Вывод страниц
//
?>
</div>




<div class="block_inf_vibor mobal_name_b blocks_popols_num" style="display: none;">
		<div class="mobal_degi">
			<div class="content_vibor_in">
				<div class="headers_blocks_mob">
					<h4 class="title_bobl">Пополнение ссылки №<span class="id_users_fre_popo_v"></span></h4>
				</div>
				<div class="body_content_mob ">
					<input type="hidden" id="numbers_hide_popols">
					<input type="hidden" id="id_users_l_v" value="<?=ULG?>">
					<div class="bots form_input_lab_inf">
						<label>Сумма пополнения</label>
						<div><input type="number" id="popol_adver_vie" placeholder="Сумма в рублях" value="1"></div>
						<div id="kol_sum_alls_popol_v"></div>
					</div>
				</div>
				<div class="bottom_block_mod no_top_m">
					<button class="gres" onclick="popol_balance_serf();">Готово</button> <button id="rel_permission_bott" class="rezs">Отмена</button>
				</div>
			</div>
		</div>
	</div>
	<script>

	$(document).ready(function() {
	    	$('.popols_ers').click(function() {

	             if ($(".blocks_popols_num").is(":hidden")) {

	                $(".blocks_popols_num").show("fast");

	            } else {

	                $(".blocks_popols_num").hide("fast");

	            }

	            $("#rel_permission_bott").click(function () {
					$(".blocks_popols_num").hide("fast");
					return false;
				});


	    	$inform_id = $(this).attr('hsp');
			$('.id_users_fre_popo_v').html($inform_id);
			$('#numbers_hide_popols').val($inform_id);
	    });
	});

	</script>





<?bottom();?>
