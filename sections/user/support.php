<?top('Обратная связь');?>

<?if($checksbans['ban'] == '0'):?>
<?

$date = date('d.m.Y H:i');
$testers = $db->selects("users","login = ?",[1=>ULG]);
$timesinf = getStartDate($testers['time_mail_s'], $date);
?>

<?if($timesinf == FALSE AND $testers['time_mail_s'] != ''):?>
<div class="info_block_mail_mess">
	<div class="bl_mail_ing">
		<p>
			<h4>Сообщение отправлено</h4>
			<p class="info_mail_time">Использовать форму обратной связи, можно всего один раз в день</p>
			<span class="pod_info_mail">Вы сможете снова отправить сообщение:<b> <?
			echo $testers['time_mail_s'];
			?>г.</b></span>
		</p>
	</div>
</div>
<?else:?>
<div class="support_admins">
    	<span class="info_email_user_mail">Ответ придет на почту: <?=$_SESSION['email']?></span><br><br>
		<div class="block_text_supp">
				<p>Тема:</p>
				<select id="text_catego">
					<option value="0" disabled="" selected="">Выберите категорию</option>
					<option value="1">Финансовые вопросы</option>
					<option value="2">Жалоба на пользователя</option>
					<option value="3">Техническая неисправность</option>
					<option value="4">Прочие вопросы</option>
				</select>
		</div>
		<div class="block_text_supp">
			<p>Ваш текст: </p>
			<textarea id="text_support" cols="30"></textarea>
		</div>
		<?capt();?>
		<input class="go_mail_good_support" type="submit" value="Отправить" onclick="sup()">
	
</div>
<script>
	function sup() {
        ajx(1,'support.php',{'text_catego': $('#text_catego').val(),'text_support': $('#text_support').val()});
	}
</script>
<?endif;?>
<?else:?>
	<?baninfo();?>
<?endif;?>
<?bottom();?>