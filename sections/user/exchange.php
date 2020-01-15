<?top('Обмен баланса');?>

<?
@include "system/config/exchan.php";
if ($chekinex['st_pr'] == "true") {
?>
	<div class="alert alert-info">
		<strong>Обменник</strong>
		<br>
		Возможность пополнить свой рекламный баланс, со счета баланса для вывода. <br><?if($chekinex['pr_opl'] != '0'):?>При обмене вы дополнительно получаете <?=$chekinex['pr_opl']?>% к сумме<?endif;?>
	</div>
	<div class="alert2 alert-info2">
<i class="fa fa-info" aria-hidden="true"></i> Перевод возможен лишь в одну сторону и возврату не подлежит
</div>

<br>
<div class="alls_exchange">
	<div class="blokisinputs">
		<input type="number" placeholder="Сумма для обмена" id="sum_obm_e">
		<input class="go_adv_web" type="submit" onclick="exch_b();return false;" value="Обменять">
	</div>
</div>
<script>
function exch_b() {
	ajx(1,'exch_b.php',{'sum':$('#sum_obm_e').val()});
}

</script>
<style>
	.blokisinputs input[type=number] {
	    padding: 5px 10px;
	    text-align: center;
	    font-size: 13px;
	    color: #847a7a;
	    display: block;
	    margin: 0 auto;
	    position: relative;
	    left: -22px;
	}
	.blokisinputs {
		margin: 0 auto;
	}
</style>
<?} else {
	messageinform('Администрация приостановила обмен');
}


bottom();?>