<?
	$dataPoints = [];
	for ($i=0; $i < 14; $i++) { 
		$datesi = Dates((($i == 0) ? '' : $i), '1');
		$staticw = $db->selects("pay_rep_l","`dates_st` = ? && status = 2",[1=>$datesi],"sum(sum_p) as `sum_p`");

		$dataPoints[] = ['y'=>numbers($staticw['sum_p']), "label" =>$datesi];

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
				<h4><i class="fa fa-pied-piper" aria-hidden="true"></i> Статистика пополнений за последние 14 дней</h4>
			</div>
			<div class="staticsblocks">
				<div id="chartContainer" style="position: relative; height: 300px; width: 990px; margin: 0 auto; clear: both;"></div>
			</div>
	</div>
	<div class="blockslist_wi fff bots">
		<div class="blocks_right_statics">
			<p><span>Пополнено за все время: <b><?re_pay_m();?> руб.</b></span></p>
			<p><span>Пополнено вчера: <b><?=numbers($dataPoints[1]['y'])?> руб.</b></span></p>
			<p><span>Пополнено сегодня: <b><?=numbers($dataPoints[0]['y'])?> руб.</b></span></p>
		</div>
		<div class="blocks_left_static">
			<table class="inf_lists_table">
				<thead>
					<tr>
						<th>Время</th>
						<th>Ник</th>
						<th>Сумма</th>
					</tr>
				</thead>
				<tbody>

<?

$list_w_user = $db->row("pay_rep_l", "status = 2 ORDER BY id DESC LIMIT 6");

$count = count($list_w_user);
if ($count > 0) {
	foreach ($list_w_user as $list_w) {

		$mysql_l_we = $db->selects("users", "login = ? ORDER BY date_reg DESC",[1=>$list_w['name_w']]);
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
					<td>'.$list_w['date_p_m'].'</td>
					<td>'.$list_w['log_user'].'</td>
					<td>'.$list_w['sum_p'].' <i class="fa fa-rub" aria-hidden="true"></i></td>
				</tr>

		 ';
	}
} else {
	echo '<tr><td colspan="3">Пополнений нет</td></tr>';
}

?>

				</tbody>
			</table>
		</div>
	</div>
</div>
