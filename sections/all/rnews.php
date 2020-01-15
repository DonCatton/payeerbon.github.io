<?
$id_ne = (int)$_GET['id'];
$infonews = $db->selects("news_list","id = ?",[1=>$id_ne]);

if ($_SESSION['newsidv_'.$infonews['id']] != $infonews['id'] ) {
	$db->update("news_list","views=views + 1","id = ?",[1=>$infonews['id']]);
	$_SESSION['newsidv_'.$infonews['id']] = $infonews['id'];
}

if (!$infonews['id'] AND $infonews['id'] == '')
	MessageAdd('1', 'Новость не найдена', 'news');
?>
<?top($infonews['name']);?>


<?
echo ' 


<div class="block_news_s">
	<div class="block_name_news">
		<span><i class="fa fa-diamond blue_diamond" aria-hidden="true" title="Синий алмаз"></i></span> <h2>'.$infonews['name'].'</h2>
	</div>
	<div class="blocka_all_pod_text_s">
		<div class="bl_text_form">
			<div class="block_pod_text">
				'.$infonews['text'].'
			</div>
		</div>
		<div class="pod_bl_news">
			<span><i class="fa fa-calendar-o" aria-hidden="true"></i> Создана: '.date('d.m.Y в H:i',$infonews['date']).'  <i style="margin-left: 10px;" class="fa fa-eye"></i> '.($infonews['views']+0).' просмотров</span>
		</div>
	</div>
</div>


 ';

?>


<?bottom();?>