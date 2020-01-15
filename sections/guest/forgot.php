<?top('Восстановлени пароля');?>

<link rel="stylesheet" href="/system/mane/css/auth.css">

<div class="block_b_auth_teg_all">
	<h1>Забыли пароль? Восстановите используя форму ниже. весь процесс займет не более 2х минут, после чего вы получите доступк кабинету.</h1>
	<div class="block_auth_reg_forms" style="width: 220px;margin: 0 auto;">
		<p><span><i class="fa fa-envelope-o" aria-hidden="true"></i></span><input type="email" id="forg_email" placeholder="E-mail от аккаунта"></p>
		<p><span><i class="fa fa-user" aria-hidden="true"></i></span><input type="email" id="forg_login" placeholder="Логин"></p>
	</div>

	<?capt();?>

	<div class="block_auth_gd_formds">
		<input type="submit" value="Готово" onclick="rcv();">
	</div>
</div>
<script>
	function rcv() {
        ajx(1,'recovery.php',{'login': $('#forg_login').val(),'email': $('#forg_email').val()});
	}
</script>
<?bottom();?>