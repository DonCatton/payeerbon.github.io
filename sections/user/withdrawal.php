<?
top('Выплата средств');?>


<?if($checksbans['ban'] == 0):?>
	<?if($config_p['stat_wea_f'] != false):?>
		<div class="block_repl_all">
		
		<?
		if($config_p['manual_wea_f'] == 'true'){
			echo "<span>Выплаты производятся 2 раза  в сутки.</span>";
		} else {
			echo "<span>Автоматические выплаты</span>";
		}
		?>
                <span>Минимальная сумма для вывода <?=$config_p['min_sum_weap'];?> руб.</span>
		<br>
			<div class="pod_block_repl_all">
				<input type="text" id="sum_wit" placeholder="Сумма для выплаты">
				<select name="repl_spos">
					<option value="0" disabled="">Способ выплаты</option>
					<option value="1" selected="">Payeer</option>
				</select>
				<input type="submit" value="Вывести" onclick="extmoney()">
			</div>
		</div>

		<script>
			function extmoney() {
		        ajx(1,'windr.php',{'sum': $('#sum_wit').val()});
			}
		</script>		
	<?else:?>
		<?messageinform('Выплата средств временно приостановлена Администрацией');?>
	<?endif;?>
<?else:?>
	<?baninfo();?>
<?endif;?>


<div class="block_stat_inf_w">
<div class="info_form_bl">
<?
$number_t_i = $db->column("withdrawal_list","name_w = ?",[1=>ULG]);

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

$list_w_user = $db->row("withdrawal_list","name_w = ? ORDER BY id DESC LIMIT 10",[1=>ULG]);
if (count($list_w_user) == 0) {
	echo ' 


<tr>

	<td colspan="4" style="text-align: center;">Вывод не производился</td>

</tr>';
} else {

	foreach ($list_w_user as $list_w) {

		switch ($list_w['status']) {
			case '1':
				$istat = '<i class="fa fa-check" aria-hidden="true"></i> Выполнено';
				$colstat = '#449D55';
				break;
			case '2':
				$istat = '<i class="fa fa-clock-o" aria-hidden="true"></i> Ожидание';
				$colstat = '#d69635';
				break;
			case '0':
				$istat = '<i class="fa fa-times" aria-hidden="true"></i> Отменено';
				$colstat = '#ca4747';
				break;
			
		}

		$st_form = (($list_w['status'] == '0') ? '<td title="Причина: '.$list_w['prs'].'" style="color: '.$colstat.';">'.$istat.'</td>' : '<td style="color: '.$colstat.';">'.$istat.'</td>');

		echo ' 

				<tr>
					<td>'.$list_w['id'].'</td>
					<td>'.$list_w['sum_w'].' руб.</td>
					<td>'.$list_w['date'].' в '.$list_w['date_t'].'</td>
					'.$st_form.'
				</tr>

		 ';
	}
}


?>
		</tbody>
	</table>
</div>
<?bottom();?>
