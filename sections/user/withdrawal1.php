<?
top('Выплата средств');


   
		


if(isset($_POST["pay"])){

if ($config_p['stat_wea_f'] != 'true') {
		MessageAdd('1','Выплата средств временно приостановлена', 'withdrawal');
	} else {

// Проверка баланса
		if ($_POST['sum_wit'] < $config_p['min_sum_weap'])
			MessageAdd('1', 'Минимальная сумма для выплаты составляет '.$config_p['min_sum_weap'].' руб.', 'withdrawal');

		if ($mysql_q_r_b['balance'] < $_POST['sum_wit'])
			MessageAdd('1','На вашем балансе недостаточно средств', 'withdrawal');
			
		if ($_SESSION['purse_pay'] != ''){
	
                    $date_t = date('d.m.Y');
					$date_t_t = date('H:i');
                    $_SESSION['balance'] -= $_POST['sum_wit'];
					$_SESSION['wea_balance'] += $_POST['sum_wit'];


					$db->query("UPDATE `users` SET balance = balance-'$_POST[sum_wit]', wea_balance = wea_balance+'$_POST[sum_wit]' WHERE login = '$_SESSION[login]'");
					$db->query("INSERT INTO `withdrawal_list` (`name_w`, `sum_w`, `date`, `date_t`, `all_t_d`, `status`, `payeer`) VALUES ('$_SESSION[login]', '$_POST[sum_wit]', '$date_t', '$date_t_t', '$date_t $date_t_t', '0', '$_SESSION[purse_pay]')");
				
				MessageAdd('3', 'Выплата поставлена в обработку', 'withdrawal');
	}else{ 
	
	MessageAdd('1', 'Вы не указали Payeer кошелёк в настройках.', 'withdrawal');
	     }		
	}
}

?>



  <?if($checksbans['ban'] == '0'):?>
	<?if($config_p['stat_wea_f'] != 'false'):?>
	
		<br><div class="block_repl_all"><span>Выплаты производятся 2 раза  в сутки.<br> Минимальная сумма для вывода <?=$config_p['min_sum_weap'];?> руб.</span>
	<span>Перед заказом выплаты не забудьте указать номер Payeer кошелька в <a href="/settings"><font color="#333333">Настройках</font></a>.</span></div><br>
	
	<form method="POST">
	    	
			<div class="block_repl_all">
			    <span><b>Баланс: <?=round($_SESSION['balance'], 2)?> руб.</b></span>
				<input type="text" name="sum_wit" placeholder="Сумма для выплаты">
				<select name="repl_spos">
					<option value="0" disabled="">Способ выплаты</option>
					<option value="1" selected="">Payeer</option>
				</select>
				<input type="submit" value="Вывести" name="pay">
		</div>
	</form> 
	
	<?else:?>

		<?messageinform('Выплата средств временно приостановлена Администрацией');?>
	<?endif;?>
<?else:?>
	<?baninfo();?>
<?endif;?>



    
<div class="block_stat_inf_w">
<div class="info_form_bl">

<?

db();

$list_w_user_t = mysqli_query($db, "SELECT * FROM `withdrawal_list` WHERE name_w = '$_SESSION[login]'");

$number_t_i = mysqli_num_rows($list_w_user_t);

echo 'Всего '.$number_t_i.' выплат на сумму '.$_SESSION['wea_balance'].' руб.';

?>
</div>
	<table>
		<thead>
			<tr>
				<th style="width: 5%;">№</th>
				<th style="width: 20%;">Сумма</th>
				<th style="width: 50%;">Дата</th>
				<th style="width: 25%;">Статус</th>
			</tr>
		</thead>
		<tbody>

<?

$list_w_user = mysqli_query($db, "SELECT * FROM `withdrawal_list` WHERE name_w = '$_SESSION[login]' ORDER BY id DESC LIMIT 10");
if (mysqli_num_rows($list_w_user) == 0) {
	echo ' 


<tr>

	<td colspan="4" style="text-align: center;">Вывод не производился</td>

</tr>';
} else {

	while ($list_w = mysqli_fetch_assoc($list_w_user)) {
	$status = $list_w["status"];
 if($status == 0){
$status = '<font color="#127998"><i class="fa fa-clock-o" aria-hidden="true"></i> В обработке</font>';
} elseif($status == 1){
$status = '<font color="green"><i class="fa fa-check" aria-hidden="true"></i> Выплачено</font>';
} elseif($status == 2){
$status = '<font color="red"><i class="fa fa-times" aria-hidden="true"></i> Отказано</font>';
}	
	
echo '
				<tr>
					<td>'.$list_w['id'].'</td>
					<td>'.$list_w['sum_w'].' руб.</td>
					<td>'.$list_w['date'].' в '.$list_w['date_t'].'</td>
				';
?>
					<td><?=$status;?></td>
				</tr>
				
<?
	}
}
?>
		</tbody>
	</table>
</div>

<?bottom();?>