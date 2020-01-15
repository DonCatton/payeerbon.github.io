<?top('Редактирование серфинга');?>
<link rel="stylesheet" href="/system/mane/css/serferc.css">
<?
$ch4ck = $db->selects("serf","id = ? && type = 1",[1=>$_GET['id']]);
?>

<?if($ch4ck['users'] == ULG):?>

<?
include "system/config/serf.php";

messageinform('Реклама, разрушающая таймер и содержащая запрещенные материалы будет заблокирована в выдаче вместе со средствами. При неоднократном нарушении - рекламодатель может быть забанен.');?>

<div class="alls_blocks_settings_ser">
	<table class="blocks_ad">
		<tbody>
			<tr>
				<td width="135" class="namis_n">Название: </td>
				<td colspan="2"><input maxlength="50" id="name_prog" type="text" value="<?=$ch4ck['name_web']?>"><span class="pod_in">Название вашего сайта, или рекламной кампании.</span></td>
			</tr>
			<tr>
				<td class="namis_n">Описание:</td>
				<td colspan="2"><input id="opis_pr" maxlength="130" type="text" value="<?=$ch4ck['pod_text']?>"><span class="pod_in">Короткое описание вашего сайта.</span></td>
			</tr>
			<tr>
				<td class="namis_n">Ссылка:</td>
				<td colspan="2"><input id="webs_pr" type="text" value="<?=$ch4ck['web']?>"><span class="pod_in">Ссылка на рекламируемый вами ресурс.</span></td>
			</tr>
			<tr class="blocidschekc">
				<td class="namis_n" style="top: -1px;">Время просмотра: </td>
				<td><select id="time_pr">
					<option value="1" <?if($ch4ck['time'] == '1') echo "selected";?>><?=$serf['times_1']?> секунд</option>
					<option value="2" <?if($ch4ck['time'] == '2') echo "selected";?>><?=$serf['times_2']?> секунд (+ <?=$serf['sum_2']?> руб.)</option>
					<option value="3" <?if($ch4ck['time'] == '3') echo "selected";?>><?=$serf['times_3']?> секунд (+ <?=$serf['sum_3']?> руб.)</option>
					<option value="4" <?if($ch4ck['time'] == '4') echo "selected";?>><?=$serf['times_4']?> секунд (+ <?=$serf['sum_4']?> руб.)</option>
					<option value="5" <?if($ch4ck['time'] == '5') echo "selected";?>><?=$serf['times_5']?> секунд (+ <?=$serf['sum_5']?> руб.)</option>
					<option value="6" <?if($ch4ck['time'] == '6') echo "selected";?>><?=$serf['times_6']?> секунд (+ <?=$serf['sum_6']?> руб.)</option>
					<option value="7" <?if($ch4ck['time'] == '7') echo "selected";?>><?=$serf['times_7']?> секунд (+ <?=$serf['sum_7']?> руб.)</option>
				</select></td>
				<td style="position: relative; top: 5px;">
				<span class="namis_n" style="float: left;">Уникальный (+ <?=$serf['unic_sum']?> руб.):</span><span style="    float: left;
    display: block;
    position: relative;
    width: 18px;
    top: -3px;
    left: 5px;"><input  <?if($ch4ck['limits'] == '1') echo "checked";?> id="unic_pr" type="checkbox"></span><span style="clear: both;"></span></td>
			</tr>
		</tbody>
	</table>
	<input id="idserfus" type="hidden" value="<?=$_GET['id']?>">
	<div id="numberstete">Стоимость клика: <?=$ch4ck['sum']?></div>
	<input class="go_adv_web" type="submit" onclick="rel_adver_viee();return false;" value="Создать">
</div>

<?else:?>
<?messageinform('ID серфинга не найден или вам не принадлежит');?>
<?endif;?>
<script>
$(document).ready(function() {
    $('.blocidschekc td').change(function() {
    	var x = document.getElementById("time_pr").value;
		var y = $('#unic_pr').is(':checked');

		if (x == 1)
			var xx = 0;
		else if (x == 2)
			var xx = <?=$serf['sum_2'];?>;
		else if (x == 3)
			var xx = <?=$serf['sum_3'];?>;
		else if (x == 4)
			var xx = <?=$serf['sum_4'];?>;
		else if (x == 5)
			var xx = <?=$serf['sum_5'];?>;
		else if (x == 6)
			var xx = <?=$serf['sum_6'];?>;
		else if (x == 7)
			var xx = <?=$serf['sum_7'];?>;

		if (y == true) {
			var zz = <?=$serf['unic_sum'];?>;
		} else {
			var zz = 0;
		}
		var xxy = <?=$serf['mis_sum'];?>;
		var z = (xx+xxy)+zz;

		document.getElementById("numberstete").innerHTML = "Стоимость клика: " + z.toFixed(3) + " руб";

    });
});	
</script>
<?bottom();?>