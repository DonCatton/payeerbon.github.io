<?top('Настройки аккаунта');?>
<?if($checksbans['ban'] == '0'):?>
<div class="block_inf_settings_page">
<h1>Настройка аккаунта</h1>
		<div class="form_settings_page_pass">
			<span class="pod_name"><span><i class="fa fa-share" aria-hidden="true"></i></span> Изменение пароля</span>
			<table>
				<tr>
					<td>Старый пароль</td>
					<td><input type="password" id="norm_pass"></td>
				</tr>
				<br>
				<tr>
					<td><span><i class="fa fa-key" aria-hidden="true"></i></span> Новый пароль</td>
					<td><input type="password" id="new_pass"></td>
				</tr>
				<tr>
					<td><span><i class="fa fa-key" aria-hidden="true"></i></span> Повторите пароль</td>
					<td><input type="password" id="new_pass_2"></td>
				</tr>
			</table>
		</div>
		
  <style>
  ::-webkit-input-placeholder {color:#909090;}
  ::-moz-placeholder          {color:#909090;}
  :-moz-placeholder           {color:#909090;}
  :-ms-input-placeholder      {color:#909090;}
  </style>
  
		<div class="form_settings_page_pass">
			<span class="pod_name"><span><i class="fa fa-share" aria-hidden="true"></i></span> Настройка кошелька</span>
			<table>
				<tr>
					<td>Кошелек Payeer</td>
		    <?
			
			if ($_SESSION['purse_pay'] != "") { 
            
			echo '<td>'.$_SESSION['purse_pay'].'</td></tr></table>';
	       
			}else{
            ?>
			    	<br><br>
					<span><small><font color="#767676">
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <i class="fa fa-info" aria-hidden="true"></i> Внимание! Будьте внимательны при добавление кошелька, 
					изменить его в дальнейшем будет невозможно!
                     </font></small></span>
					<td><input type="text" id="purse_payeer" placeholder="Введите ваш Payeer:"></td>
				</tr>
			</table>
			<br>
			<input type="submit" value="Сохранить" onclick="saves()">
			
			<? } ?>
			
		</div>
</div>
					
<?else:?>
	<?baninfo();?>
<?endif;?>

<script>
	function saves() {
        ajx(1,'settings.php',{'norm_pass': $('#norm_pass').val(),'new_pass': $('#new_pass').val(),'new_pass_2': $('#new_pass_2').val(),'purse_payeer': $('#purse_payeer').val()});
	}
</script>

<?bottom();?>