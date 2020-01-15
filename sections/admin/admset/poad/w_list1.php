<?


	// Вывод данных статистики

	$datesi = Dates('', '1');
	$staticw = mysqli_fetch_assoc($db->query("SELECT sum(sum_w) as `sum_w` FROM `withdrawal_list` WHERE `date` = '$datesi'"));

	$datesi_1 = Dates('1', '1');
	$staticw_1 = mysqli_fetch_assoc($db->query("SELECT sum(sum_w) as `sum_w` FROM `withdrawal_list` WHERE `date` = '$datesi_1'"));

	$datesi_2 = Dates('2', '1');
	$staticw_2 = mysqli_fetch_assoc($db->query("SELECT sum(sum_w) as `sum_w` FROM `withdrawal_list` WHERE `date` = '$datesi_2'"));	

	$datesi_3 = Dates('3', '1');
	$staticw_3 = mysqli_fetch_assoc($db->query("SELECT sum(sum_w) as `sum_w` FROM `withdrawal_list` WHERE `date` = '$datesi_3'"));


	$datesi_4 = Dates('4', '1');
	$staticw_4 = mysqli_fetch_assoc($db->query("SELECT sum(sum_w) as `sum_w` FROM `withdrawal_list` WHERE `date` = '$datesi_4'"));


	$datesi_5 = Dates('5', '1');
	$staticw_5 = mysqli_fetch_assoc($db->query("SELECT sum(sum_w) as `sum_w` FROM `withdrawal_list` WHERE `date` = '$datesi_5'"));

	$datesi_6 = Dates('6', '1');
	$staticw_6 = mysqli_fetch_assoc($db->query("SELECT sum(sum_w) as `sum_w` FROM `withdrawal_list` WHERE `date` = '$datesi_6'"));

	$datesi_7 = Dates('7', '1');
	$staticw_7 = mysqli_fetch_assoc($db->query("SELECT sum(sum_w) as `sum_w` FROM `withdrawal_list` WHERE `date` = '$datesi_7'"));	

	$datesi_8 = Dates('8', '1');
	$staticw_8 = mysqli_fetch_assoc($db->query("SELECT sum(sum_w) as `sum_w` FROM `withdrawal_list` WHERE `date` = '$datesi_8'"));


	$datesi_9 = Dates('9', '1');
	$staticw_9 = mysqli_fetch_assoc($db->query("SELECT sum(sum_w) as `sum_w` FROM `withdrawal_list` WHERE `date` = '$datesi_9'"));


	$datesi_10 = Dates('10', '1');
	$staticw_10 = mysqli_fetch_assoc($db->query("SELECT sum(sum_w) as `sum_w` FROM `withdrawal_list` WHERE `date` = '$datesi_10'"));

	$datesi_11 = Dates('11', '1');
	$staticw_11 = mysqli_fetch_assoc($db->query("SELECT sum(sum_w) as `sum_w` FROM `withdrawal_list` WHERE `date` = '$datesi_11'"));	

	$datesi_12 = Dates('12', '1');
	$staticw_12 = mysqli_fetch_assoc($db->query("SELECT sum(sum_w) as `sum_w` FROM `withdrawal_list` WHERE `date` = '$datesi_12'"));


	$datesi_13 = Dates('13', '1');
	$staticw_13 = mysqli_fetch_assoc($db->query("SELECT sum(sum_w) as `sum_w` FROM `withdrawal_list` WHERE `date` = '$datesi_13'"));



    $dataPoints = array(
	array("y" => numbers($staticw_13['sum_w']), "label" => $datesi_13),
	array("y" => numbers($staticw_12['sum_w']), "label" => $datesi_12),
	array("y" => numbers($staticw_11['sum_w']), "label" => $datesi_11),
	array("y" => numbers($staticw_10['sum_w']), "label" => $datesi_10),
	array("y" => numbers($staticw_9['sum_w']), "label" => $datesi_9),
	array("y" => numbers($staticw_8['sum_w']), "label" => $datesi_8),
	array("y" => numbers($staticw_7['sum_w']), "label" => $datesi_7),
	array("y" => numbers($staticw_6['sum_w']), "label" => $datesi_6),
	array("y" => numbers($staticw_5['sum_w']), "label" => $datesi_5),
	array("y" => numbers($staticw_4['sum_w']), "label" => $datesi_4),
	array("y" => numbers($staticw_3['sum_w']), "label" => $datesi_3),
	array("y" => numbers($staticw_2['sum_w']), "label" => $datesi_2),
	array("y" => numbers($staticw_1['sum_w']), "label" => $datesi_1),
	array("y" => numbers($staticw['sum_w']), "label" => $datesi)
    );
    //
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
        dataPoints: <? echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
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
	</div><br>
		<p><small><font color="#666666">Выплачено всего: <?we_pay_m();?> руб.</font></small></p>
			<p><small><font color="#666666">Выплачено сегодня: <?=numbers($staticw['sum_w'])?> руб.</font></small></p>
			<br>
			<small><font color="#333333">Выплаты производите в ручную в кошельке 
			<a href="https://payeer.com" target="_blank"><font color="#127998"><b>Payeer</b></font></a>.<br>
Выплатив средства, для смены статуса выплаты в форме ниже введите нормер нужного <b>"ID выплаты"</b> из списка ниже.<br>
А также введите номер необходимого <b>"Статуса выплаты"</b></font><br>
<font color="green"><b>"1"</b> - Выплачено</font><br>
<font color="red"><b>"2"</b> - Отказано</font><br>
<font color="#127998"><b>"0"</b> - В обработке</font></small><br><br>

<?	
  if(isset($_POST["st"])){
    
		    	$db->query("UPDATE `withdrawal_list` SET status = '$_POST[stat]' WHERE id = '$_POST[id]'");
echo "<meta http-equiv='refresh' content='0.1; url=/maks199091?sez=payments&stat=list'>";
}
?>	
	
			<form method="POST">
			<div class="block_repl_all">
			<p><small><font color="#444444">Введите номер ID выплаты и значение статуса:</font></small></p><br>
	            <input type="text" style="height: 25px;" name="id" placeholder="ID Выплаты">
				<input type="text" style="height: 25px;" name="stat" placeholder="Значение статуса">
				<input type="submit" value="Изменить" name="st">
		</div>
	</form>
	<br>
	</td>			
			</tr>

	
			
	<div class="blockslist_wi fff bots">
		<div class="blocks_left_static">
			<table class="inf_lists_table">
			    	<thead>
					<tr>
					    <th>ID Выплаты</th>
						<th>Время</th>
						<th>Ник</th>
						<th>Сумма</th>
						<th>Payeer</th>
						<th>Статус</th>
					</tr>
				</thead>
				<tbody>



	

<?
$list_w_user = $db->query("SELECT * FROM `withdrawal_list`  ORDER BY id DESC LIMIT 80");

while ($list_w = mysqli_fetch_assoc($list_w_user)) {

	$mysql_l_we = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM `users` WHERE login = '$list_w[name_w]' ORDER BY date_reg DESC"));
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
	
	
	 $status = $list_w["status"];
	if($status == 0){
$status = '<font color="#127998"><i class="fa fa-clock-o" aria-hidden="true"></i> В обработке "0"</font>';
} elseif($status == 1){
$status = '<font color="green"><i class="fa fa-check" aria-hidden="true"></i> Выплачено "1"</font>';
} elseif($status == 2){
$status = '<font color="red"><i class="fa fa-times" aria-hidden="true"></i> Отказано "2"</font>';
}


echo '
			<tr><td>'.$list_w['id'].'</td>
				<td>'.$list_w['date'].' в '.$list_w['date_t'].'</td>
				<td>'.$list_w['name_w'].'</td>
				<td>'.$list_w['sum_w'].' <i class="fa fa-rub" aria-hidden="true"></i></td>
				<td>'.$list_w['payeer'].'</td>
		';
?>
				
						<td><?=$status;?></td>
				</tr>
<?
			
}

?>

				</tbody>
			</table>
		</div>
	<div class="blocks_right_statics" style="float: right;">
		
		<?


?>
		</div>
	
	
	
		<div class="" style="clear: both;"></div>
	</div>
</div>
