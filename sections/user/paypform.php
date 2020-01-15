<?
include "system/config/payer_r.php";

if ($_POST['sum_repl'] < $config_p_r['min_sum_weap']) {
	MessageAdd('1', 'Ошибка пополнения! Неверная сумма', 'replenishment');
}
else if($config_p_r['tex_sup'] != 'true') {
	MessageAdd('1', 'Пополнение баланса, временно приостановлено', 'replenishment');
}
?>

<?top('Пополнение средств');?>

<?
$prover_inf = $db->selects("pay_rep_l","id ORDER BY id DESC");


$m_shop = $config_p_r['m_shop'];
$m_orderid = $prover_inf['id']+1;
$m_amount = number_format($_POST['sum_repl'], 2, '.', '');
$m_curr = 'RUB';
$m_desc = base64_encode($config_p_r['name_infs_r']);
$m_key = $config_p_r['m_key'];

$arHash = array(
	$m_shop,
	$m_orderid,
	$m_amount,
	$m_curr,
	$m_desc
);


$arHash[] = $m_key;

$sign = strtoupper(hash('sha256', implode(':', $arHash)));

$dates = date('d.m.Y');

$db->inserts("pay_rep_l","`log_user`, `sum_p`, `pay_id_p`, `status`, `date_p_m`, `dates_st`","?,?,?,?,?,?",[1=>ULG, 2=>$m_amount, 3=>$m_orderid, 4=>1, 5=>$dates, 6=>$dates]);

?>
<script>

window.onload=function(){
	$('form').submit();
};
</script>



<div id="pod_name_t">Загрузка платежа...</div>
<form method="POST" action="https://payeer.com/merchant/">
	<input type="hidden" name="m_shop" value="<?=$m_shop?>">
	<input type="hidden" name="m_orderid" value="<?=$m_orderid?>">
	<div class="hidden" name="logins" value="<?=ULG?>"></div>
	<input type="hidden" name="m_amount" value="<?=$m_amount?>">
	<input type="hidden" name="m_curr" value="<?=$m_curr?>">
	<input type="hidden" name="m_desc" value="<?=$m_desc?>">
	<input type="hidden" name="m_sign" value="<?=$sign?>">
</form>