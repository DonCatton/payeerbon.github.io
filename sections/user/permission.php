<?top('Привилегии');?>

<?if($chance['st_perm'] == 'true'):?>
<div class="permi_block_all">
	<div class="block_perm_1 form_perm">
		<div class="headers_per_b" style="color: #C15454;">
			<i class="fa fa-diamond " aria-hidden="false" title="Красный алмаз"></i>
			<br>
			<span>Red diamond</span>
		</div>
		<div class="content_per_b">
			<br>
			<span>Бонусы от <?permminmax(2,1);?> до <?permminmax(1,1);?></span>
			<br>
			<span>Шанс бонуса <?=$chance['1']?>%</span>
			<br>
			<span>Доход от рефералов <?=$chance['1p']?>%</span>
			<br>
			<br>
		</div>
	</div>
	<div class="block_perm_2 form_perm">
		<div class="headers_per_b" style="color: #FFC600;">
			<i class="fa fa-diamond" aria-hidden="false" title="Желтый алмаз"></i>
			<br>
			<span>Yellow diamond</span>
		</div>
		<div class="content_per_b">
			<br>
			<span>Бонусы от <?permminmax(2,2);?> до <?permminmax(1,2);?></span>
			<br>
			<span>Шанс бонуса <?=$chance['2']?>%</span>
			<br>
			<span>Доход от рефералов <?=$chance['2p']?>%</span>
			<br>
			<br>
		</div>
	</div>
	<div class="block_perm_3 form_perm">
		<div class="headers_per_b" style="color: #6EAEC8;">
			<i class="fa fa-diamond " aria-hidden="false" title="Синий алмаз"></i>
			<br>
			<span>Blue diamond</span>
		</div>
		<div class="content_per_b">
			<br>
			<span>Бонусы от <?permminmax(2,3);?> до <?permminmax(1,3);?></span>
			<br>
			<span>Шанс бонуса <?=$chance['3']?>%</span>
			<br>
			<span>Доход от рефералов <?=$chance['3p']?>%</span>
			<br>
			<br>
		</div>
	</div>
</div>

<script>
$(document).ready(function() {
    var chislo = 2;
    $('.buy_perm_gods_g').change(function() {
    	var x = document.getElementById("text_catego_2").value;
		var y = document.getElementById("text_catego").value;

		if (x == 1)
			var xx = <?=$chance['1s'];?>;
		else if (x == 2)
			var xx = <?=$chance['2s'];?>;
		else if (x == 3)
			var xx = <?=$chance['3s'];?>;


		if (y == 2)
			var z = xx*1;
		else if (y == 3)
			var z = xx*2.5;

		document.getElementById("buy_bal_all").innerHTML = "К оплате: " + z.toFixed(2) + " руб";

    });
});
	
</script>

<div class="buy_perm_gods_g">
	<form method="POST">
	<div class="balanc_popol">
		<p id="buy_bal_all" name="test"></p>
	</div>
		<select id="text_catego" name="text_catego">
			<option value="0" selected="" disabled="">Выбери привилегию</option>
			<option value="2">Yellow diamond</option>
			<option value="3" >Blue diamond </option>
		</select>

		<select name="text_catego_2" id="text_catego_2">
			<option value="1">1 день</option>
			<option value="2">1 неделя</option>
			<option value="3" selected="selected">1 месяц</option>
		</select>
		<input type="submit" value="Купить" name="buy_per">
		<br>
	</form>
</div>
<?else:?>
<?messageinform('Покупка привилегий отключена');?>
<?endif;?>
<?bottom();?>