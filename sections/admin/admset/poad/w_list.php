<?
	// Вывод данных статистики
	$dataPoints = [];
	for ($i=0; $i < 14; $i++) { 
		$datesi = Dates((($i == 0) ? '' : $i), '1');
		$staticw = $db->selects("withdrawal_list","`date` = ? && status = 1",[1=>$datesi],"sum(sum_w) as `sum_w`");

		$dataPoints[] = ['y'=>numbers($staticw['sum_w']), "label" =>$datesi];

	}
?>

<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,  
    axisY: {
        valueFormatString: "#,##0.## руб."
    },
	data: [{
		type: "splineArea",
		color: "rgba(54,158,173,.7)",
		markerSize: 7,
		xValueFormatString: "YYYY",
		yValueFormatString: "#,##0.## руб.",
        type: "spline",
        dataPoints: <? echo json_encode(array_reverse($dataPoints), JSON_NUMERIC_CHECK); ?>
	}]
	});
chart.render();

}
</script>


<div class="blolckscenters">
	<div class="blocksstatics bots fff">
			<div class="headerblocka_all_b">
				<h4><i class="fa fa-pied-piper" aria-hidden="true"></i> Статистика выплат за последние 14 дней</h4>
			</div>
			<div class="staticsblocks">
				<div id="chartContainer" style="position: relative; height: 300px; width: 990px; margin: 0 auto; clear: both;"></div>
			</div>
	</div>
	<div class="blockslist_wi fff bots">

		<div class="blocks_right_statics">
			<p><span>Выплачено за все время: <b><?we_pay_m();?> руб.</b></span></p>
			<p><span>Выплачено вчера: <b><?=numbers($dataPoints[1]['y'])?> руб.</b></span></p>
			<p><span>Выплачено сегодня: <b><?=numbers($dataPoints[0]['y'])?> руб.</b></span></p>
		</div>
		<div class="blocks_left_static">
			<table class="inf_lists_table">
				<thead>
					<tr>
						<th>ID</th>
						<th>Ник</th>
						<th>Сумма</th>
						<th>Дата</th>
						<th style="width: 146px;">Действия</th>
					</tr>
				</thead>
				<tbody>

					<?
					if ($config_p['manual_wea_f'] == 'true') {
						$lims = '15';

						$Param1 = "SELECT * FROM `withdrawal_list` WHERE status = 2 ORDER BY id DESC LIMIT 0, ".$lims;
						$Param2 = "SELECT * FROM `withdrawal_list` WHERE status = 2 ORDER BY id DESC LIMIT START, ".$lims;
						$Param4 = 'admins';


						$Count = $db->column("withdrawal_list","status = 2 ORDER BY id DESC",[]);

						if (!$_GET['page']) {
							$_GET['page'] = 1;
							$Result = $db->multi_query($Param1);
						} else {
							$Start = ($_GET['page'] - 1) * $lims;
							$Result = $db->multi_query(str_replace('START', $Start, $Param2));
						}
						$coun = count($Result);
						if ($coun > 0) {
							foreach ($Result as $list_w) {

								$mysql_l_we = $db->selects("users","login = ? ORDER BY date_reg DESC",[1=>$list_w['name_w']]);
								if ($mysql_l_we['permission'] == '3') {
									$stat_per_re = 'blue_diamond';
									$stat_per_t_re = 'Синий алмаз';
								}
								else if($mysql_l_we['permission'] == '2') {
									$stat_per_re = 'yellow_diamond';
									$stat_per_t_re = 'Желтый алмаз';
								}
								else if($mysql_l_we['permission'] == '1') {
									$stat_per_re = 'red_diamond';
									$stat_per_t_re = 'Красный алмаз';
								}


								echo ' 

										<tr>
											<td>'.$list_w['id'].'</td>
											<td>'.$list_w['name_w'].'</td>
											<td>'.$list_w['sum_w'].' <i class="fa fa-rub" aria-hidden="true"></i></td>
											<td>'.$list_w['date'].' в '.$list_w['date_t'].'</td>
											<td><span onclick="ok_wea_us('.$list_w['id'].')" class="status_wea_ad_in" title="Выплатить"><i class="fa fa-check" aria-hidden="true"></i></span> <span onclick="del_wea_us('.$list_w['id'].')" title="Отказать" class="status_wea_ad_in" style="    color: #a51f1f;"><i class="fa fa-times" aria-hidden="true"></i></span></td>
										</tr>

								 ';
							}
						} else {
							echo '<tr><td colspan="5">Заявок на выплату нет</td></tr>';
						}
					} else {
						$list_b = $db->row("withdrawal_list","status = 1 ORDER BY id DESC LIMIT 14");
						$coun = count($list_b);
						if ($coun > 0) {
							foreach ($list_b as $key => $list_w) {
								echo ' 
										<tr>
											<td>'.$list_w['id'].'</td>
											<td>'.$list_w['name_w'].'</td>
											<td>'.$list_w['sum_w'].' <i class="fa fa-rub" aria-hidden="true"></i></td>
											<td>'.$list_w['date'].' в '.$list_w['date_t'].'</td>
											<td>---</td>
										</tr>

								 ';
							}
						}  else {
							echo '<tr><td colspan="5">Список выплат пуст</td></tr>';
						}
					}

					?>

				</tbody>
			</table>
			<?PageSelector($Param4, $_GET['page'], $Count, $lims, 'maks199091?sez=payments&stat=list&page=');?>
		</div>
	</div>
</div>
