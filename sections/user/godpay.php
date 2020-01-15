<?
$inf_b = $db->selects("users","login = ?",[1=>ULG,'reple_balance,reple_balance_all']);


$_SESSION['reple_balance'] = $inf_b['reple_balance'];
$_SESSION['reple_balance_all'] = $inf_b['reple_balance_all'];

MessageAdd('3', 'Пополнение прошло успешно', 'replenishment');

?>