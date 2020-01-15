<?top('Авторизация');?>
<link rel="stylesheet" href="system/mane/css/auth.css">

<div class="block_b_auth_teg_all">
<center>
	<h1>Вход в систему</h1>
	<font color="777777"><small>Добро пожаловать, пожалуйста, войдите в свой профиль используя данные которые вводились при создании аккаунта.
	Забыли пароль? Нажмите кнопку ЗАБЫЛИ.</small></font><br><br>
	<style type="text/css">
  .table_reg {
     border: 1px solid #DFDFDF; 
     padding-top: 20px; padding-bottom: 20px;
   }
 </style>
<table width="72%" border="0" class="table_reg">
  <tr align="center">
   <td width="33%"><img src="/system/mane/img/11.png" width="200" height="180"  />
   </td>
   <td width="33%">
              <div class="block_auth_reg_forms" style="width: 220px;margin: 0 auto;">
	
		<p><i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;<input type="text" id="login_auth" placeholder="Ваш логин" maxlength="12"></p>
		<p><i class="fa fa-key" aria-hidden="true"></i>&nbsp;<input type="password" id="pass_auth" placeholder="Ваш пароль"></p>
		<br><a class="forgot_login" href="forgot"><font color="#DF5600">Забыли? </font></a>
	
	</div>
	</td>
  </tr>
</table>

	

	<?capt();?>
	<div class="block_auth_gd_formds">
		<input type="submit" value="Вход" name="logins_go" onclick="Login();return false;">
	</div>
	</center>

</div>
<script>
	function Login() {
        ajx(1,'login.php',{'login': $('#login_auth').val(),'pass': $('#pass_auth').val()});
	}
</script>

<?bottom();?>
