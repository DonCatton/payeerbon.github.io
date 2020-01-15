<div class="blolckscenters">
	<div class="bottom_adds_news bots"><a href="maks199091?sez=news&stat=add"><i class="fa fa-plus-square-o" aria-hidden="true"></i> Добавить новость</a></div>
	<div class="blocks_news_list">

<?

$lims = '12';
// Разделение на страницы
$Param1 = "SELECT * FROM `news_list` ORDER BY `id` DESC LIMIT 0, ".$lims;
$Param2 = "SELECT * FROM `news_list` ORDER BY `id` DESC LIMIT START, ".$lims;
$Param4 = 'admins';


$Count = mysqli_fetch_row($db->column("news_list","id",[]));
if (!$_GET['page']) {
	$_GET['page'] = 1;
	$Result = $db->multi_query($Param1);
} else {
	$Start = ($_GET['page'] - 1) * $lims;
	$Result = $db->multi_query(str_replace('START', $Start, $Param2),[1=>$lims]);
}



// Вывод бонусов	
foreach ($Result as $listne) {
	echo ' 
		<div class="blocks_n_n bots" style="float: left;">
			<div class="contents_n_b">
				<h4>'.$listne['name'].'</h4>
				<div class="text_ne_l_t">
					'.$listne['pod_text'].'
				</div>
				<div class="bottom_news_l">
					<div style="float: left; font-size: 10px;">
						<span><b>Дата:</b> '.$listne['date'].'</span>
					</div>
					<div class="deqstvie" style="float: right;">
						<a onclick="del_n('.$listne['id'].'); return false;">Удалить</a>&nbsp;&nbsp;&nbsp;<a href="admins?sez=news&stat=rel&id='.$listne['id'].'">Редактировать</a>
					</div>
					<div style="clear: both;"></div>
				</div>
			</div>
		</div>
	 ';
}


?>












	<div style="clear: both;"></div>
	</div>
	<?PageSelector($Param4, $_GET['page'], $Count, $lims, 'maks199091?sez=news&stat=list&page=');	// Вывод страниц
//?>
</div>