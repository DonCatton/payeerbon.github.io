<?

$lims = '10';

$Param1 = "SELECT * FROM `serf` WHERE type = 1 ORDER BY `id` DESC LIMIT 0, ".$lims;
$Param2 = "SELECT * FROM `serf` WHERE type = 1 ORDER BY `id` DESC LIMIT START, ".$lims;
$Param4 = 'admins';

$Count = $db->column("serf","type = 1",[]);
$sum1 = $db->selects("serf","type = 1",[],"SUM(sum) as s, SUM(balance) as sb");
?>

<div class="blocksslist_bonus">
	<div class="leftcontents_bonus">
		<div class="blocks_bonus_stats bots">
			<div class="pod_blocs_stat_b">
				<div class="blstats gres">
					<h3><?=$Count?></h3>
					<span>Всего серфинга</span>
				</div>
				<div style="float: right;">
					<div class="blstats rezs">
						<h3><i title="Минимально за одного человека"><?=formSub($sum1['s'])?></i><i>руб.</i></h3>
						<span>Общая их сумма</span>
					</div>
					<div class="blstats rezs">
						<h3><i title="Минимально за одного человека"><?=formSub($sum1['sb'])?></i><i>руб.</i></h3>
						<span>Общий их баланс</span>
					</div>					
				</div>
			</div>
		</div>
		<div class="bonusblockslist">
			<table cellpadding='0' cellspacing='0'>
				<thead>
					<th style="width: 5%;">#</th>
					<th>Пользователь</th>
					<th>Название</th>
					<th>Под текст</th>
					<th>Ссылка</th>
					<th>Статус</th>
					<th style="width: 16%;">Информ.</th>
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
if (!empty($Result)) {
	foreach ($Result as $list_bonus) {
		$us = $db->selects("users","login = ?",[1=>$list_bonus['users']],"id,login");
		if (!empty($us)) {
			$lg = $us['login'];
			$ig = $us['id'];
		} else {
			$lg = '<span style="color: red;">---</span>';
			$ig = 0;
		}
		echo ' 
					<tr>
						<td>'.$list_bonus['id'].'</td>
						<td><a href="/maks199091?sez=user&stat=user&id='.$ig.'" title="Перейти в профиль">'.$lg.'</a></td>
						<td>'.$list_bonus['name_web'].'</td>
						<td>'.$list_bonus['pod_text'].'</td>
						<td><a href="'.$list_bonus['web'].'" target="_blank">'.$list_bonus['web'].' <br> <a href="https://www.virustotal.com/ru/url/submission/?force=1&url='.$list_bonus['web'].'" target="_blank"><button title="Проверить на вирусы" class="btn btn-primary btn-xs dropdown-toggle tooltips" data-container="body" data-original-title="Проверить" type="button" id="dropdownMenu_76710" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class="fa fa-shield" aria-hidden="true"></i></button></a></td>
						<td>'.(($list_bonus['status'] == 1) ? '<span style="color: green;">Включен</span>' : '<span style="color: red;">Отключен</span>').'</td>
						<td><div>
							<span>Всего просм.: '.$list_bonus['all_views'].'</span>
							<br>
							<br>
							<span>Баланс: '.formSub($list_bonus['balance']).'</span>
							<br>
							<br>
							<span>1 клик: '.formSub($list_bonus['sum']).'</span>
						</div></td>
						<td><span class="relbl del" onclick="del_serf('.$list_bonus['id'].'); return false;">Удалить</span></td>
					</tr>

		 ';
	}
} else {
	echo '<tr><td colspan="8">Список серфинга чист</td></tr>';
}
?>
				</tbody>

			</table>
			<?PageSelector($Param4, $_GET['page'], $Count, $lims, 'maks199091?sez=serf&stat=list&page=');?>
		</div>
	</div>
</div>