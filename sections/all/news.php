<?top('Новости');?>

<div class="all_block_news">

	<?
$lims = $limits['news_limit'];

// Разделение на страницы
$Param1 = "SELECT * FROM `news_list` ORDER BY `id` DESC LIMIT 0, ".$lims;
$Param2 = "SELECT * FROM `news_list` ORDER BY `id` DESC LIMIT START, ".$lims;
$Param4 = 'news';


$Count = $db->column("news_list","id",[]);
if (!$_GET['page']) {
	$_GET['page'] = 1;
	$Result = $db->multi_query($Param1);
} else {
	$Start = ($_GET['page'] - 1) * $lims;
	$Result = $db->multi_query(str_replace('START', $Start, $Param2));
}





if (count($Result) == 0) {
	echo "Новостей нет";
} else {

	foreach ($Result as $listne) {
		echo ' 

		<div class="block_news_s">
			<div class="block_name_news">
				<span><i class="fa fa-diamond blue_diamond" aria-hidden="true" title="Синий алмаз"></i></span> <h2>'.$listne['name'].'</h2>
			</div>
			<div class="blocka_all_pod_text_s">
				<div class="bl_text_form">
					<div class="block_pod_text">
						'.$listne['pod_text'].'
					</div>
				</div>
				&nbsp;
				<div class="pod_bl_news">
					<span><i class="fa fa-calendar-o" aria-hidden="true"></i> Создана: '.date('d.m.Y в H:i',$listne['date']).' <i style="margin-left: 10px;" class="fa fa-eye"></i> '.$listne['views'].' просмотров</span>
					<a href="rnews?id='.$listne['id'].'"><input type="submit" value="Подробней"></a>
				</div>
			</div>
		</div>

		 ';
	}
}


	?>
</div>

<?
PageSelector($Param4, $_GET['page'], $Count, $lims, '?page=');	// Вывод страниц
//

?>







<?bottom();?>