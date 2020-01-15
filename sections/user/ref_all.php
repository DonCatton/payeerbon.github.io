<?top('Список рефералов');?>

<div class="ref_all_inf">
	


<div class="alls_block_ref_b_s">
	<div class="no_act yes_act" id="web_s">
		<div>
		
			<!--	<div class="alert alert-info">-->
			<!--	    	<label>Ваша реферальная ссылка</label><br>-->
			<!--<strong><?=PR.WB?>/page?ref=<?=UID?></strong>-->
		</div>
	</div>
	
	
				  
				<div class="alert alert-info">
				      <strong>Баннер - для привлечения пользователей.</strong>
				        <br>
				        Для получения прямой ссылки на баннер нажмите ПКМ на баннере и выберите "Копировать адрес изображения".
				</div>
				<?$message = 'Зарабатуй больше с нами';?>
				<div class="blocks_info_banners">
					<div class="no_act act_p" id="468x60">
						<img src="system/banners/ref/468x60.gif" alt="Ошибка">
						<textarea cols="30" rows="10"><a href="<?=PR.WB?>/page?ref=<?=UID?> <?=$_SERVER["HTTPS"]?>" target="_blank"><img src="<?=PR.WB?>/system/banners/ref/468x60.gif" width="468" height="60" border="0" alt="<?=$message?>"></a></textarea>
					</div>
				
				</div>
	
</div>

	<div class="block_ref_list">
		<table>
			<thead>
				<tr>
					<th>Логин</th>
					<th>Дата регистрации</th>
					<th>Заработано</th>
				</tr>
			</thead>
			<tbody>

<?

$lims = $limits['referslist'];

$Param1 = "SELECT * FROM `users` WHERE ref = '$_SESSION[id]' ORDER BY date_reg DESC LIMIT 0, ".$lims;
$Param2 = "SELECT * FROM `users` WHERE ref = '$_SESSION[id]' ORDER BY date_reg DESC LIMIT START, ".$lims;
$Param4 = 'ref_all';


$Count = $db->column("users","ref = ?",[1=>UID]);
if (!$_GET['page']) {
	$_GET['page'] = 1;
	$Result = $db->multi_query($Param1);
} else {
	$Start = ($_GET['page'] - 1) * $lims;
	$Result = $db->multi_query(str_replace('START', $Start, $Param2));
}


if (count($Result) > 0) {

	foreach ($Result as $bl_list_ref_a) {
		
		if ($bl_list_ref_a['permission'] == '3') {
			$stat_per_re = 'blue_diamond';
			$stat_per_t_re = 'Синий алмаз';
		}
		else if($bl_list_ref_a['permission'] == '2') {
			$stat_per_re = 'yellow_diamond';
			$stat_per_t_re = 'Желтый алмаз';
		}
		else if($bl_list_ref_a['permission'] == '1') {
			$stat_per_re = 'red_diamond';
			$stat_per_t_re = 'Красный алмаз';
		}

		echo ' 


					<tr>
						<td>'.$bl_list_ref_a['login'].' <i class="fa fa-diamond" aria-hidden="true"></i></td>
						<td>'.$bl_list_ref_a['date_reg'].'</td>
						<td>'.formSub($bl_list_ref_a['ref_info_b']).' руб.</td>
					</tr>


		 ';
	}
} else {
	echo '<tr><td colspan="3">У вас нет рефералов</td></tr>';
}
	?>
			</tbody>
		</table>
	</div>
	<?PageSelector($Param4, $_GET['page'], $Count, $lims, '?page=');?>
</div>
</div>
<script>
$(function() {
    $(".razdels_block_ref li").on('click', function() {
        $(".razdels_block_ref li").removeClass("active");
        $(this).toggleClass("active");

        var content_s = $(this).attr("asc");

        $(".alls_block_ref_b_s div").removeClass("yes_act");
        $("#"+content_s).toggleClass("yes_act");
    });

    $(".razdels_block_ref_banner li").on('click', function() {
        $(".razdels_block_ref_banner li").removeClass("active");
        $(this).toggleClass("active");

        var content_s = $(this).attr("asc");

        $(".blocks_info_banners div").removeClass("act_p");
        $("#"+content_s).toggleClass("act_p");
    });


});
</script>

<?bottom();?>
