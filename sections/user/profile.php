<?top('Профиль')?>
<?if($checksbans['ban'] == '0'):?>

<div class="stat_mini_prof_acc">
	<div class="stat_mini_prof_acc_user">
		<div class="stat_mini_prof_acc_img">
			<img src="/system/mane/img/user.png" alt="">
		</div>
		<span class="block_infos_prof_b">
	<span class="name_user_prof"><?=$_SESSION['login'];?></span> <b></b> <br>Дата создания аккаунта: <?=$_SESSION['date_reg'];?>г.
		</span>
	</div>
</div>


<div class="bl_pfof_stat">
    
	<table class="stat_table">
		<tbody>
			<tr>
				<th colspan="2">Статистика аккаунта:</th>
			</tr>
			
			<tr>
			    <td>Баланс:</td>
			<td class="value"> <?=round($_SESSION['balance'], 2);?> руб.</td>
			     </tr>
				<tr>
					<td>Рекламный баланс:</td>
		             <td class="value"><?sum_r_balance()?> руб.</td>
		             </tr>
		    <tr>	
				<td>Всего пополнено:</td>
				<td class="value"><?=$_SESSION['reple_balance_all']?> руб.</td>
			</tr>
			<tr>
				<td>Всего выведено:</td>
				<td class="value"><?=$_SESSION['wea_balance']?> руб.</td>
			</tr>	
		</tbody>
	</table>

	<table class="stat_table">
		<tbody>
			<tr>
				<th colspan="2">Информация об аккаунте:</th>
			</tr>
			<tr>
				<td>Ваш ID:</td>
				<td class="value"><?=$_SESSION['id']?></td>
			</tr>
			<tr>
				<td>Логин/ник:</td>
				<td class="value"><?=$_SESSION['login']?></td>
			</tr>
			<tr>
				<td>Ваш E-mail:</td>
				<td class="value"><?=$_SESSION['email']?></td>
			</tr>

			<?
			if ($_SESSION['ref'] != '0') {
				$ref_user = mysqli_fetch_assoc(mysqli_query($db, "SELECT login FROM `users` WHERE `id` = '$_SESSION[ref]'"));

				echo ' 

									<tr>
										<td>Вас пригласил:</td>
										<td class="value">'.$ref_user['login'].'</td>
									</tr>

				 ';
			}

			?>

			<?
			if ($_SESSION['permission'] > '1') {
				$log_inf_user = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM `users` WHERE login = '$_SESSION[login]'"));

				echo ' 

									<tr>
										<td>Привилегия действует до:</td>
										<td class="value">'.$log_inf_user['time_perm'].'</td>
									</tr>

				 ';
			}

			?>
		</tbody>
	</table>
	<table class="stat_table">
		<tbody>
			<tr>
				<th colspan="2">Статистика партнерской программы:</th>
			</tr>
			<tr>
				<td>Всего рефералов:</td>
				<td class="value">
<?=ref_info($_SESSION['id']);?>

				 чел.</td>
			</tr>
			<tr>
				<td>Заработано на рефералах:</td>
				<td class="value"><?=substr($_SESSION['ref_balanc'], 0,4)?> руб.</td>
			</tr>
						
		</tbody>
	</table>
</div>

<?else:?>
	<?baninfo();?>
<?endif;?>
<?bottom();?>