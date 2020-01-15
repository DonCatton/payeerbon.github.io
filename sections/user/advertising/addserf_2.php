<?top('Создание ссылки');?>
<link rel="stylesheet" href="/system/mane/css/serferc.css">
<?
include "system/config/serf.php";

messageinform('Реклама, разрушающая таймер и содержащая запрещенные материалы будет заблокирована в выдаче вместе со средствами. При неоднократном нарушении - рекламодатель может быть забанен.');?>


<div class="alls_blocks_settings_ser">
	<table class="blocks_ad">
		<tbody>
			<tr>
				<td width="135" class="namis_n">Название: </td>
				<td colspan="2"><input maxlength="50" id="name_prog" type="text"><span class="pod_in">Название вашего сайта, или рекламной кампании.</span></td>
			</tr>
			<tr>
				<td class="namis_n">Ссылка:</td>
				<td colspan="2"><input id="webs_pr" type="text" value="http://"><span class="pod_in">Ссылка на рекламируемый вами ресурс.</span></td>
			</tr>
			<tr>
				<td class="namis_n">Баннер:</td>
				<td colspan="2"><input id="webs_pr_banner" type="text" value="http://"><span class="pod_in">Ссылка на баннер. Размер 468x60</span></td>
			</tr>			
			<tr class="blocidschekc">
				<td class="namis_n" style="top: -1px;">Время просмотра: </td>
				<td><select id="time_pr">
					<option value="1"><?=$serf['times_1']?> секунд</option>
					<option value="2"><?=$serf['times_2']?> секунд (+ <?=$serf['sum_ban_2']?> руб.)</option>
					<option value="3"><?=$serf['times_3']?> секунд (+ <?=$serf['sum_ban_3']?> руб.)</option>
					<option value="4"><?=$serf['times_4']?> секунд (+ <?=$serf['sum_ban_4']?> руб.)</option>
					<option value="5"><?=$serf['times_5']?> секунд (+ <?=$serf['sum_ban_5']?> руб.)</option>
					<option value="6"><?=$serf['times_6']?> секунд (+ <?=$serf['sum_ban_6']?> руб.)</option>
					<option value="7"><?=$serf['times_7']?> секунд (+ <?=$serf['sum_ban_7']?> руб.)</option>
				</select></td>
				<td style="position: relative; top: 5px;">
				<span class="namis_n" style="float: left;">Уникальный (+ <?=$serf['unic_sum']?> руб.):</span><span style="    float: left;
    display: block;
    position: relative;
    width: 18px;
    top: -3px;
    left: 5px;"><input id="unic_pr" type="checkbox"></span><span style="clear: both;"></span></td>
			</tr>
		</tbody>
	</table>
	<div id="numberstete">Стоимость клика: <?=$serf['mis_sum_ban']?></div>
	<small><font color="#999">Добавленые вами баннеры не буду видны вам в разделе Баннерного Серфинга. <br>Они будут доступны только другим пользователям.</font></small>
	<input class="go_adv_web" type="submit" onclick="add_adver_viee_2();return false;" value="Создать">
</div>
<script>
$(document).ready(function() {
    $('.blocidschekc td').change(function() {
    	var x = document.getElementById("time_pr").value;
		var y = $('#unic_pr').is(':checked');

		if (x == 1)
			var xx = 0;
		else if (x == 2)
			var xx = <?=$serf['sum_ban_2'];?>;
		else if (x == 3)
			var xx = <?=$serf['sum_ban_3'];?>;
		else if (x == 4)
			var xx = <?=$serf['sum_ban_4'];?>;
		else if (x == 5)
			var xx = <?=$serf['sum_ban_5'];?>;
		else if (x == 6)
			var xx = <?=$serf['sum_ban_6'];?>;
		else if (x == 7)
			var xx = <?=$serf['sum_ban_7'];?>;

		if (y == true) {
			var zz = <?=$serf['unic_sum'];?>;
		} else {
			var zz = 0;
		}
		var xxy = <?=$serf['mis_sum_ban'];?>;
		var z = (xx+xxy)+zz;

		document.getElementById("numberstete").innerHTML = "Стоимость клика: " + z.toFixed(3) + " руб";

    });
});	
</script>
<?bottom();?>