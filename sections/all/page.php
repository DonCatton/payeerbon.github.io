<?top('Раздача бонусов');?>

<center><h2><font color="#616161">Добро пожаловать!</font></h2> 

<small><font color="#a6a6a6"><div id="time">Среда 15 Июля 2019 г. 16:40:23</div></font></small>
<script language="JavaScript">
   var pos = document.getElementById("time");
   function time() {
      var today = new Date();
      var day_of_week = ["Воскресенье", "Понедельник", "Вторник", "Среда", "Четверг", "Пятница", "Суббота"];
      var month_of_year = ["Января","Февраля","Марта","Апреля","Мая","Июня","Июля","Августа","Сентября","Октября","Ноября","Декабря",];
      var day_ = day_of_week[today.getDay()];
      var date_ = today.getDate();
      var month_ = month_of_year[today.getMonth()];
      var year_ = today.getFullYear();
      var hours_ = today.getHours();
      var min_ = today.getMinutes();
      var sec_ = today.getSeconds();
      var zerom = zeros = '';
      if(min_ < 10) zerom = '0';
      if(sec_ < 10) zeros = '0';
      pos.innerHTML = date_+' '+month_+', '+hours_+':'+zerom+min_;
   }
   setInterval(time, 1);
</script>
<br>
 <b><font color="#717171">Раздача бонусов на PAYEER:</font></b><br>
 </center>


<?if(!$_SESSION['login']):?>
<!--| Блок неавторизованых|------------------------------------------------------------------------------>
<center>
	<br>
	<font color="#717171">Вы ищете простой в использование кран для сбора бонусов? Чего вы ждете?<br> 
 Собирай бесплатные бонусы уже сейчас!</font><br>
<br>
<style>
  ::-webkit-input-placeholder {color:#888888;}
  ::-moz-placeholder          {color:#888888;}
  :-moz-placeholder           {color:#888888;}
  :-ms-input-placeholder      {color:#888888;}
</style>
	<p>
	<form action="/register" method="post">
	<div class="auth">
							
	<input type="text" name="email" class="input" style="color:#353535" placeholder="Введите ваш e-mail:" size="40" />
	<input type="submit" class="button" style="background-color:#d48919" value="&nbsp;&nbsp;&nbsp;Регистрация&nbsp;&nbsp;&nbsp;&nbsp;" />
                                         
	</div>	
	</form>
	</P>
	</center>
<br>
<div class="block_text_c_g_inf">
	<center><br>	
<img src="/system/mane/img/4.png" style="height: 90px; width: 86px; margin-left: 9px; margin-top:36px;">

    <div class='panel-stats3'>
	<div>
Наша система хорошо подходит тем пользователям интернета которым нужен дополнительный доход. 
Вы сможете с легкостью получить его у <br>нас собирая бонусы и просматривая ссылки рекламодателей.
	<font color="#EE0000">*</font><br>
	Вылаты доступны на платежную систему PAY<font color="#0099de">EER</font>.<br>
	</div>
	<div>
		<p><i class="fa fa-check" style="color:#eb991e;"></i>&nbsp;&nbsp;Дополнительный доход.</p>
		<p><i class="fa fa-check" style="color:#eb991e;"></i>&nbsp;&nbsp;Сбор бонусов.</p>
		<p><i class="fa fa-check" style="color:#eb991e;"></i>&nbsp;&nbsp;Реферальная программа <?=$chance['1p'];?>%.</p>
		<p><i class="fa fa-check" style="color:#eb991e;"></i>&nbsp;&nbsp;Минимально для вывода <?=$config_p['min_sum_weap'];?> руб. </p>
		<p><i class="fa fa-check" style="color:#eb991e;"></i>&nbsp;&nbsp;Выплаты доступны на PAY<font color="#0099de">EER</font>.</p>
		<br>
		</div>
	 </div>
	 </center>	
</div>

<br><br><br><br><br><br><br><br><br>

<div class='link'>
<div class="block_text_c_g_inf">
 <center>
<br>
<br>
</center>
</div>
<center>
<br>
<!--| Коды банеров |---------------->
    <br>
<script src="//static.surfe.pro/js/net.js"></script>
<ins class="surfe-be" data-sid="224116"></ins> 
<script>(adsurfebe = window.adsurfebe || []).push({});</script>

<!-- ------------------------------->

</center>
<br>
</div>

<?else:?>

<!--| Блок авторизованых|----------------------------------------------------------------------------->

<div class="block_text_c_g_inf">
	<center><br>	
<img src="/system/mane/img/4.png" style="height: 90px; width: 86px; margin-left: 9px; margin-top:34px;">

    <div class='panel-stats3'>
	<div>
Наша система хорошо подходит тем пользователям интернета которым нужен дополнительный доход. 
Вы сможете с легкостью получить его у <br>нас собирая бонусы и просматривая ссылки рекламодателей.
	<font color="#EE0000">*</font><br>
	Вылаты доступны на платежную систему PAY<font color="#0099de">EER</font>.<br>
	</div>
	<div>
		<p><i class="fa fa-check" style="color:#eb991e;"></i>&nbsp;&nbsp;Дополнительный доход.</p>
		<p><i class="fa fa-check" style="color:#eb991e;"></i>&nbsp;&nbsp;Сбор бонусов.</p>
		<p><i class="fa fa-check" style="color:#eb991e;"></i>&nbsp;&nbsp;Реферальная программа <?=$chance['1p'];?>%.</p>
		<p><i class="fa fa-check" style="color:#eb991e;"></i>&nbsp;&nbsp;Минимально для вывода <?=$config_p['min_sum_weap'];?> руб. </p>
		<p><i class="fa fa-check" style="color:#eb991e;"></i>&nbsp;&nbsp;Выплаты доступны на PAY<font color="#0099de">EER</font>.</p>
		<br>
		</div>
	 </div>
	 </center>	
</div>
<br><br><br><br><br><br><br><br><br>


<div class='link'>
<div class="block_text_c_g_inf">
 <center>
     <br><br>
     <b><font color="#626262">Партнёрская программа:</font></b><br><br><br>
     <img src="/system/mane/img/5.png" style="height: 92px; width: 90px; margin-left: 6px; margin-top: 25px;">
    <div class='panel-stats4'>
         <div>
     	Получать доход можно не только просматривая ссылки рекламодателей и собирая бонусы, но и привлекать рефералов получая <?=$chance['1p'];?>% от их зароботков.
        </div>
        <div>
           <p>&nbsp;&nbsp;<i class="fa fa-check" style="color:#eb991e;"></i>&nbsp;&nbsp;Приглашайте своих друзей и<br> 
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;знакомых.</p>
        </div>
    </div>
</center>
</div>
<center>
<!--| Коды банеров |-------------------->
   <script src="//static.surfe.pro/js/net.js"></script>
<ins class="surfe-be" data-sid="224116"></ins> 
<script>(adsurfebe = window.adsurfebe || []).push({});</script>

<!-- ----------------------------------->
</center>
<br></div>

<?endif;?>
    
<?bottom();?>
