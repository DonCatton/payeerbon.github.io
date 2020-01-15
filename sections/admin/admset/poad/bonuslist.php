<?

include "system/config/limitsiz.php";


$lims = '15';

$Param1 = "SELECT * FROM `bonus_list` ORDER BY `id` DESC LIMIT 0, ".$lims;
$Param2 = "SELECT * FROM `bonus_list` ORDER BY `id` DESC LIMIT START, ".$lims;
$Param4 = 'admins';


$Count = $db->column("bonus_list","id",[]);
$sum1 = $db->selects("bonus_list","id",[],"SUM(min_m) as s_mn,SUM(max_m) as s_mx");
?>

<div class="blocksslist_bonus">
	<div class="leftcontents_bonus">
		<div class="blocks_bonus_stats bots">
			<div class="pod_blocs_stat_b">
				<div class="blstats gres">
					<h3><?=$Count?></h3>
					<span>Всего бонусов</span>
				</div>
				<div class="blstats gres">
					<h3><?bon_all_s();?></h3>
					<span>Выдано бонусов</span>
				</div>
				<div class="blstats rezs" style="float: right;">
					<h3><i title="Минимально за одного человека"><?=$sum1['s_mn']?></i> ~ <i title="Максимально за одного человека"><?=$sum1['s_mx']?></i> <i>руб.</i></h3>
					<span>Общая сумма</span>
				</div>
			</div>
		</div>
		<div class="bonusblockslist">
			<table cellpadding='0' cellspacing='0'>
				<thead>
					<th style="width: 5%;">#</th>
					<th>Время</th>
					<th>Цена от</th>
					<th>Цена до</th>
					<th>Действие</th>
				</thead>

				<tbody>

<?

if (!$_GET['page']) {
	$_GET['page'] = 1;
	$Result = $db->multi_query($Param1);
} else {
	$Start = ($_GET['page'] - 1) * $lims;
	$Result = $db->multi_query(str_replace('START', $Start, $Param2));
}

function timeminut($t1){
	$time = $t1;

	$min = $time % 60;
	$hear = floor($time / 60) % 24;
	$day = floor($time / 1440);
	
    return $day . "д. " . $hear . "ч. " . $min."м.";
}


foreach ($Result as $list_bonus) {


	if ($list_bonus['bonus_all'] == '3') {
		$bonus_name = 'Синий алмаз';
		$col_b = '#6492DD';
	}
	else if($list_bonus['bonus_all'] == '2'){
		$bonus_name = 'Желтый алмаз';
		$col_b = '#FFD236';
	}
	else if($list_bonus['bonus_all'] == '1'){
		$bonus_name = 'Красный алмаз';
		$col_b = '#C15454';
	}


	echo ' 
				<tr>
					<td>'.$list_bonus['id'].'</td>
					<td>'.timeminut($list_bonus['time_b']).'</td>
					<td>'.$list_bonus['min_m'].' руб.</td>
					<td>'.$list_bonus['max_m'].' руб.</td>
					<td><span class="relbl rel" onclick="relredbo('.$list_bonus['id'].')">Редактировать </span> <span class="relbl del" onclick="del('.$list_bonus['id'].'); return false;">Удалить</span></td>
				</tr>

	 ';
}
?>
				</tbody>

			</table>
			<?PageSelector($Param4, $_GET['page'], $Count, $lims, 'maks199091?sez=bonus&stat=list&page=');?>
		</div>
		<script>
			function relredbo(id) {
				window.location.replace('maks199091?sez=bonus&stat=rel&id='+id);
			}
		</script>
	</div>
</div>