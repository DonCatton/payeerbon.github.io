<?top('Статистика');?>

<h2><font color="#666">	Статистика</font></h2>
<?
$number_t_i = $db->column("withdrawal_list","status = 1",[]);
$number_t_i_s = $db->selects("withdrawal_list","status = 1",[],"SUM(sum_w) as s")['s'];

if ($number_t_i_s <= 0) $resi = 0;
else $resi = $number_t_i_s;
?>
<center>	
<div class='panel-stats2'>
<div>
Проект работает<span>
<?time_web();?>-й день</span>
</div>

<div>
Выплат на сумму <span> <? echo ''.$resi.''; ?> &#8381;</span>
</div>
<div>Всего пользователей<span>
<?user_all_s();?> <i class='fa fa-group' aria-hidden='true'></i>
</span></div>
										
										
</div>
   	
</center>
<div class="block_stat_inf_w">
<div class="alert2 alert-info2">
<?



echo '<font color="#666">Всего '.$number_t_i.' выплат:</font>';

?>
</div>
	<table>
		<thead>
			<tr>
				<th style="width: 5%;">№</th>
				<th style="width: 20%;">Сумма</th>
				<th style="width: 20%;">Логин</th>
				<th style="width: 30%;">Дата</th>
				<th style="width: 25%;">Статус</th>
			</tr>
		</thead>
		<tbody>

<?

$list_w_user = $db->row("withdrawal_list","status = 1 ORDER BY id DESC LIMIT 30",[]);
if ($resi == 0) {
	echo ' 
<tr>

	<td colspan="5" style="text-align: center;">Выплат не производилось</td>

</tr>';
} else {
	foreach ($list_w_user as $list_w) {
		echo ' 

				<tr>
					<td>'.$list_w['id'].'</td>
					<td>'.$list_w['sum_w'].' руб.</td>
					<td>'.$list_w['name_w'].'</td>
					<td>'.$list_w['date'].' в '.$list_w['date_t'].'</td>
					<td style="color: #449D55;"><i class="fa fa-check" aria-hidden="true"></i> Выплачено</td>
				</tr>

		 ';
	}
}


?>
		</tbody>
	</table>
</div>

<?bottom();?>
