<?
include "system/config/limitsiz.php";


if (!$_SESSION['user_list_in'] OR $_SESSION['user_list_in'] == 'id')$sear_db = 'id';
else$sear_db = $_SESSION['user_list_in'];


if ($sear_db == 'min_balance')$itogs = 'balance';
else $itogs = $sear_db;

$checkbon_dec = $_SESSION['user_list_d'];

$lims = '15';




$lm = 18;

if (!$_GET['search']) {

$Param1 = "SELECT * FROM `users` ORDER BY $itogs $checkbon_dec LIMIT 0, ".$lm;
$Param2 = "SELECT * FROM `users`ORDER BY $itogs $checkbon_dec LIMIT START, ".$lm;
$Param4 = 'admins';

$Count = $db->selects('users',"id",[1=>$itogs],"COUNT(".$itogs.") as c")['c'];

$numers_inf = $db->row("users","id",[]);

} else {
	$searc_us = clear($_GET['search']);

	$Param1 = "SELECT * FROM `users` WHERE `login` LIKE '%$searc_us%' OR `email` = '$searc_us' OR `ip` = '$searc_us' ORDER BY `id` DESC LIMIT 0, ".$lm;
	$Param2 = "SELECT * FROM `users` WHERE `login` LIKE '%$searc_us%' OR `email` = '$searc_us' OR `ip` = '$searc_us' ORDER BY `id` DESC LIMIT START, ".$lm;
	$Param4 = 'admins';

	$Count = $db->selects('users',"login LIKE '%:sr%' OR `email` = :sr OR `ip` = :sr",[':sr'=>$searc_us],"COUNT(id) as c")['c'];
	
	$numers_inf = $db->row("users","login LIKE '%$searc_us' OR email = '$searc_u' OR ip = '$searc_us'");
}
$num = count($numers_inf);
?>



<div class="blolckscenters">
	<div class="blocks_inform_list_user_all">
		<div class="blocks_vib_user_list_inf">
			<div class="left_blocks_info_stat_sear">
			<?if(!$_GET['search']):?>
				<div id="text_block_us"></div>
				<label>Сортировать:</label>
				<select name="" id="sort_sear_list_us">
					<option value="1" <?= $sear_db == 'id' ? 'selected' : '';?>>По id</option>
					<option value="2" <?= $sear_db == 'balance' ? 'selected' : '';?>>Баланс от большего</option>
					<option value="3" <?= $sear_db == 'min_balance' ? 'selected' : '';?>>Баланс от меньшего</option>
					<option value="4" <?= $sear_db == 'ban' ? 'selected' : '';?>>По бану</option>
					<option value="5" <?= $sear_db == 'auth' ? 'selected' : '';?>>По дате входа</option>
					<option value="6" <?= $sear_db == 'all_ref' ? 'selected' : '';?>>По кол. рефералов</option>
				</select>		
			<?endif?>		
			</div>
			<div class="block_sear_right_pois">
				<form method="POST">
					<input id="sear_info_blocks_user" value="<?=$_GET['search']?>" type="text" placeholder="Ник, E-mail или Ip" autocomplete="off"><input type="submit" onclick="listuser_sear(); return false;" value="Поиск">
				</form>
			</div>
			<div style="clear: both;"></div>
		</div>
		<div class="contents_list_user">
			
<?if($num > 0):?>
			<?if($_GET['search'] != ''):?>
				<div class="blocks_inform_check_num_searc">
					<?
						$text = '<p>По запросу <b>'.$searc_us.'</b> найдено совпадений: '.$num.'</p>';
						echo $text;
					?>
				</div>
			<?endif;?>

<?

if (!$_GET['page']) {
	$_GET['page'] = 1;
	$Result = $db->multi_query($Param1);
} else {
	$Start = ($_GET['page'] - 1) * $lims;
	$Result = $db->multi_query(str_replace('START', $Start, $Param2));
}

foreach ($Result as $list_user) {


if ($list_user['bonus_all'] == '3') {
	$bonus_name = 'Синий алмаз';
	$col_b = '#6492DD';
}
else if($list_user['bonus_all'] == '2'){
	$bonus_name = 'Желтый алмаз';
	$col_b = '#FFD236';
}
else if($list_user['bonus_all'] == '1'){
	$bonus_name = 'Красный алмаз';
	$col_b = '#C15454';
}


if ($list_user['ban'] == 0)
	$checkban = '<b style="color: #C35757;">Нет</b>';
else
	$checkban = '<b style="color: #4FC074;">Есть</b>';

echo ' 
			<div class="blocks_user_info leftlimlb">
				<div class="left_imgs_bon">
					<img src="system/mane/img/user.png" alt="">
				</div>
				<div class="info_cont_block_user">
					<table>
						<tr>
							<td>Ник: </td>
							<td>'.$list_user['login'].' <b><i class="fa fa-diamond" aria-hidden="true"></i></b></td>
						</tr>
						<tr>
							<td>Баланс: </td>
							<td>'.$list_user['balance'].' руб.</td>
						</tr>
						<tr>
							<td>Бан: </td>
							<td>'.$checkban.'</td>
						</tr>
					</table>
					<div style="font-size: 13px;position: absolute;top: -8px;left: 0;">'.countdat($list_user['date_auth']).'</div>
					<div class="bottoms">
						<a href="maks199091?sez=user&stat=user&id='.$list_user['id'].'">Детально</a>
					</div>
				</div>
				<div style="clear: both;"></div>
			</div>

 ';
}


?>



<?

if($_GET['search'] != '') {
	$list_web = 'maks199091?sez=user&stat=list&search='.$_GET['search'].'&page=';
} else {
	$list_web = 'maks199091?sez=user&stat=list&page=';
}
?>
			<?PageSelector($Param4, $_GET['page'], $Count, $lims, $list_web);?>
		</div>
		<?else:?>
			<div style="text-align: center; font-size: 12px;">
				<span>Пользователь не найден</span>
			</div>
		<?endif;?>
	</div>
</div>