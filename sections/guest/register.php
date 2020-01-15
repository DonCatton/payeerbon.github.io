<?top('Регистрация');
$ref = (int)$_COOKIE['ref'];
?>
<link rel="stylesheet" href="system/mane/css/auth.css">

<div class="block_b_auth_teg_all">

	<h1>Регистрация в системе</h1>
	<center><font color="686868"><small>Пожалуйста, введите свои данные для создания учетной записи. Вводите настоящие данные при создании
	аккаунта, это нужно для того, что-бы вы смогли восстановить свой аккаунт без обращения в службу поддержки</small></font></center><br>
		<center>
		
			<?if(empty($ref)):?>
					<h3></h3>
			<?else:?>
					
	<?
		$ref_user = $db->selects("users","id = ?",[1=>$ref],'login');

		echo '<small><font color="878787"><b>Вас пригласил: '.$ref_user['login'].'</b></font></small>';

	?>              
	<br><br>
	<?endif;?>
	
<style type="text/css">
  .table_reg {
   border: 1px solid #DFDFDF; 
     padding-top: 20px; padding-bottom: 20px;
   }
 </style>
 
 <? $email = $_POST[ "email" ]; ?>

<table width="72%" border="0" class="table_reg">
  <tr align="center">
   <td width="33%"><img src="/system/mane/img/11.png" width="200" height="180"  />
   </td>
   <td width="33%">
                <div class="block_auth_reg_forms">
					<p><i class="fa fa-user"></i>&nbsp;&nbsp;<input type="text" id="login_auth" placeholder="Ваш логин" maxlength="12"></p>
					<p><i class="fa fa-envelope-o"></i>&nbsp;&nbsp;<input type="email" value="<?=$email;?>" id="email_auth" placeholder="Ваш e-mail"></p>
					<p><i class="fa fa-key"></i>&nbsp;&nbsp;<input type="password" id="pass_auth" placeholder="Ваш пароль"></p>
				   </div>
	</td>
  </tr>
</table>
				
		</center>	
	

	<?capt();?>

	<div class="register_form_god_ok">
		<input type="submit" value="Регистрация" onclick="register();">
	</div>

</div>


<script>
	function register() {
        ajx(1,'reg.php',{'login': $('#login_auth').val(),'email': $('#email_auth').val(),'pass': $('#pass_auth').val()});
	}
</script>

<?bottom();?>


