<?top('Бонус');?>

<?if($bonus_s['status_b'] == 'true'):?>

<?
if (empty($checksbans['ban'])) {

	$timessssss = time();
	// Проверка на время
	if ($_SESSION['number_bonus_t'] < $timessssss) null_number_b(); // Удаление данных о получении
	//


?>
	

<!--| Блок информар . Датчик |-->
<div class="block_inf_bonus_kol">
	<div class="pod_b_ing_kol_num">
	<p>Одновременно можно добывать 1 бонус</p>
		<span <?if($_SESSION['number_bonus'] == '') echo 'title="Пусто"'; else echo "Вы уже добываете";?> class="<?if($_SESSION['number_bonus'] != '') echo "green_bl_progress_bon";?>"></span>
	</div>
</div>
<!--|**************************|-->

<center>
<div class="block_bonu_list_razd">

<?
	$lims = $limits['wsizbl'];

	$forms = 60*720;

	// Вывод данных о бонусах
	$bonslimit = $db->column("bonus_list","bonus_all <= ?",[1=>$_SESSION['permission']]);

	$rezultlist = $db->column("bonus_list","bonus_all <= ?",[1=>$_SESSION['permission']]);
	$rezulist = $db->column("bonus","time_add + ? > ? AND user_login = ? ",[1=>$forms,2=>$timessssss,3=>ULG]);

	$result_forms = $rezultlist - $rezulist;





	// Разделение на страницы
	$Param4 = 'bonus';


	$Count = $db->column("bonus_list","bonus_all <= ?",[1=>$_SESSION['permission']]);
	if (!$_GET['page']) {
		$_GET['page'] = 1;
		$Result = $db->row("bonus_list","bonus_all <= ? ORDER BY bonus_all DESC, min_m DESC LIMIT 0, ".$lims,[1=>$_SESSION['permission']]);
	} else {
		$Start = ($_GET['page'] - 1) * $lims;
		$Result = $db->row("bonus_list",str_replace('START', $Start, "bonus_all = ? ORDER BY bonus_all DESC, min_m DESC LIMIT START, ".$lims),[1=>$_SESSION['permission']]);
	}


	PageSelector($Param4, $_GET['page'], $Count, $lims, '?page=');	// Вывод страниц
	//



	if ($rezultlist > 0) {
		// Вывод бонусов	
		foreach ($Result as $list_bonus) {

			$testasss_2 = $db->selects("bonus","user_login = ? AND bonus_num = ?",[1=>ULG,2=>$list_bonus['id']]); // Чтение информации о бонусе


			// Класс цвета алмаз
			if ($list_bonus['bonus_all'] == '2') 
				$prively_b = "yell_k_diam_b";
			else if($list_bonus['bonus_all'] == '1')
				$prively_b = "red_k_diam_b";
			//


			// Название алмаза
			if ($list_bonus['bonus_all'] == '2') 
				$prively_b_t = "Желтый алмаз";

			else if($list_bonus['bonus_all'] == '1')
				$prively_b_t = "Красный алмаз";
			else
				$prively_b_t = "Синий алмаз";
			//


			$infprrrrr = $testasss_2['time_add']; // Вывод времени о бонусе

			if ($_SESSION['permission'] >= $list_bonus['bonus_all']) {

				if ($testasss_2['time_add'] < time()) {
				// Вывод блока бонуса, если все в порядке

					echo '
						<div class="bl_bonus_list">
							<div class="block_icon_bonus_l"><font color="#DF5600">Бонус</font>
						 		<i class="fa fa-rub" style="height: 10px; width: 10px; color: #eb991e;" aria-hidden="true"></i>
							</div>
							<p>'.$list_bonus['min_m'].' - '.$list_bonus['max_m'].'</p>
							<input type="submit" value="Получить" onclick="$(bons'.$list_bonus['id'].').submit();">
						</div>
					';

					// Формат для бонусника, индивидуальный
					echo '
						<form id="bons'.$list_bonus['id'].'" action="/bonus" method="POST" style="display:none;">
							<input type="hidden" name="god_b_sd" value="'.$list_bonus['id'].'"> 
						</form>
					';
					//
				//

				} else {

				// Вывод блока, если еще не вышло время
					echo ' 
						<div class="bl_bonus_list" style="background-image: url(http://365psd.ru/images/backgrounds/gplaypattern.png); height: 112px;">
							<p class="times_bonus_date" style="    font-size: 12px;
						    color: #eb991e;
						    margin-top: 38px;
						    font-weight: bold;    position: relative;
						    top: -10px;">Бонус будет доступен через:</p><p style="    padding: 5px;margin-top: 10px;margin-bottom: 10px;">'.timersb($infprrrrr).'</p>
						</div>
					';
					//
				}
			}
		}
	} else {
		messageinform('В данный момент на проекте отсутствуют бонусы, попробуйте зайти чуть позже');

	}
	//
} else {
	baninfo();
}
//
?>
</center>
</div>

	<div class="block_mini_stat_c_b ost_c_b block_c_g_inf">
<center><b><font color="#777">	Последние бонусы</font></b></center>
	<table>
		<tr>
			<th style="width: 200px;"><font color="#666666">Бонус</font></th>
			<th><font color="#666666">Логин</font></th>
			<th><font color="#666666">Дата</font></th>
		</tr>

<?

$list_w_user = $db->row("b_list_alls","id ORDER BY id DESC LIMIT 7",[]);

if (count($list_w_user) > 0) {
	foreach ($list_w_user as $list_w) {

		$mysql_l_we = $db->selects("users","login = ? ORDER BY date_reg DESC",[1=>$list_w['name']]);
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
					<td><font color="#686868">'.$list_w['bonus'].' <i class="fa fa-rub" aria-hidden="true"></i></font></td>
					<td><font color="#686868">'.$list_w['name'].' </font></td>
					<td><font color="#686868">'.$list_w['date'].'</font></td>
				</tr>



		 ';
	}
} else {
	echo ' 

<tr>
	<td colspan="3">Будь первым, кто получит бонус</td>
</tr>

	 ';
}

?>

	</table>
</div>
<!--|**************************|-->

<?else:?>

	<?messageinform('Получение бонусов приостановлено Администрацией');?>
<?endif;?>



<?bottom();?>


