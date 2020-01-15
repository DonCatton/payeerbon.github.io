<div class="blockspanels__auth">
	<div class="blocksp__auths">
		
		<div class="boxheaders">
			<span>Вход в панель</span>	
		</div>
		<div class="boxcenter">
			<div class="informsreg"></div>
			<form method="POST" class="spectforms">
				<input type="hidden" id="auth_infors" value="<?=$config['captcha']?>">
				<div class="input-group adsblockleft"><span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span><input type="text" placeholder="Введите свой логин" autocomplete="off" id="loginsa"></div>
				<div class="input-group adsblockleft"><span class="input-group-addon"><i class="fa fa-key" aria-hidden="true"></i></span><input type="password" placeholder="Введите свой пароль" id="passwa"></div>
				<div class="">
					<?capt();?>
				</div>
				<button onclick="funcr['prover_email'](); return false;" type="submit" class="buttonsauth" id="keyauthbot">Вход в систему <i class="fa fa-sign-in" aria-hidden="true"></i></button>
			</form>
		</div>

	</div>
</div>