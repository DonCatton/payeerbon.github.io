<?top('Пополнение баланса');?>


	<?if($config_p_r['tex_sup'] != 'false'):?>
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;<small><font color="#666">Рекламный баланс: <?sum_r_balance()?> руб.</font></small><br>
			 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;<small><a href="exchange"><font color="#DF5600">Обменять средства</font></a></small>
             <br><br>
		<div class="block_repl_all">

		<?=$_SESSION['ffffffffffff'];?>
			<div class="pod_block_repl_all">
				<form method="POST" action="paypform">
				<input type="text" name="sum_repl" placeholder="Сумма пополнения">
				<select name="repl_spos">
					<option value="0" disabled="">Способ оплаты</option>
					<option value="1" selected="">Payeer</option>
				</select>
				<input type="submit" value="Пополнить" name="m_process">
				</form>
			</div>
		</div>
	<?else:?>

		<?messageinform('Пополнение средств временно приостановлена Администрацией');?>
	<?endif;?>

<div class="block_stat_inf_w">
<div class="info_form_bl">
<?
$totalS = $db->column("pay_rep_l","log_user = ? AND status > 1",[1=>ULG]); // всего записей

$list_r_s = $db->selects("pay_rep_l","log_user = ? AND status > '1'",[1=>ULG],"sum(sum_p) as s")['s'];
if (!empty($list_r_s)) {
	$total = 0;
} else {
	$total = $list_r_s;
}


echo  'Кол-во пополнений';
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

$list_w_user = $db->row("pay_rep_l","log_user = ? ORDER BY id DESC LIMIT 10",[1=>ULG]);


if (count($list_w_user) == 0) {
	echo ' 


<tr>

	<td colspan="4" style="text-align: center;">У Вас нет истории пополнения</td>

</tr>


	 ';
} else {

	foreach ($list_w_user as $list_w) {

		if ($list_w['status'] == 2) {
			$istat = '<i class="fa fa-check" aria-hidden="true"></i> Успешная транзакция';
			$colstat = '#449D55';
		}
		else if($list_w['status'] == 1) {
			$istat = '<i class="fa fa-clock-o" aria-hidden="true"></i> Не завершен';
			$colstat = '#d69635';
		}
		else if($list_w['status'] == 0) {
			$istat = '<i class="fa fa-times" aria-hidden="true"></i> Отменено';
			$colstat = '#ca4747';
		}

		echo ' 

				<tr>
					<td>'.$list_w['id'].'</td>
					<td>'.$list_w['sum_p'].' руб.</td>
					<td>'.$list_w['date_p_m'].'</td>
					<td style="color: '.$colstat.';">'.$istat.'</td>
				</tr>

		 ';
	}
}

?>
		</tbody>
	</table>
</div>




<?bottom();?>
