<?top('Серфинг');?>
<link rel="stylesheet" href="/system/mane/css/serferc.css">

<div class="alls_block_check_ser">
	<?
	include "system/config/serf.php";

	if (empty($checksbans['ban'])) {
		include "system/config/serf.php";
		$checkmysqlin = $db->row("serf","type = 2 ORDER BY sum DESC");
		$infscheck = checkser(2);
	
		$times = time();

		if ($infscheck > 0) {
			foreach ($checkmysqlin as $key => $serflist) {
				$chnums = $serflist['balance']/$serflist['sum'];
				$checview = (int) ($chnums);
				switch ($serflist['time']) {
					case '1':
						$tim = $serf['times_1'];
						break;
					case '2':
						$tim = $serf['times_2'];
						break;
					case '3':
						$tim = $serf['times_3'];
						break;
					case '4':
						$tim = $serf['times_4'];
						break;
					case '5':
						$tim = $serf['times_5'];
						break;
					case '6':
						$tim = $serf['times_6'];
						break;
					case '7':
						$tim = $serf['times_7'];
						break;
				}

				$checkmysqlins = $db->selects("serf_li_user","id_serf = ? AND name = ?",[1=>$serflist['id'],2=>ULG]);

				if ($serflist['users'] != ULG) {
					if ($serflist['status'] == '1') {
						if ($checview > '0' && $serflist['balance'] >= $serflist['sum']) {
								if ($checkmysqlins['time'] < time() AND $checkmysqlins['status'] != '1') {
									echo '
										
										<div class="serfer">
											
											<div class="topics banners_serf">
												<div class="lefts"><img src="https://www.google.com/s2/favicons?domain='.htmlspecialchars($serflist['web']).'" alt=""><a href="surfing?num='.$serflist['id'].'" target="_blank" title="Просмотреть сайт">'.htmlspecialchars($serflist['name_web']).'</a><span>№'.$serflist['id'].'</span></div>
												<div class="rights"><a href="https://www.virustotal.com/ru/url/submission/?force=1&url='.htmlspecialchars($serflist['web']).'" target="_blank"><button title="Проверить на вирусы" class="btn btn-primary btn-xs dropdown-toggle tooltips" data-container="body" data-original-title="Проверить" type="button" id="dropdownMenu_76710" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class="fa fa-shield" aria-hidden="true"></i></button></a></div><div style="clear:both;"></div>
											</div>
											<div class="text_ser">
												<img style="width: 393px;height: 51px; padding: 0;" class="img_blocks_inf_serf" src="'.htmlspecialchars($serflist['web_banner']).'" alt="">
											</div>
											<div class="bottoms_serf">
												<div class="lefts"><span><i class="fa fa-clock-o" aria-hidden="true"></i> Время: '.$tim.' сек.</span> <span><i class="fa fa-money" aria-hidden="true"></i> Оплата: '.($serflist['sum']-$serf['sum_wea_adm']).' руб.</span></div>
												<div class="rights"><span>Осталось просмотров: '.$checview.'</span></div>
												<div style="clear: both;"></div>
											</div>
										</div>

									 ';
							}
						}
					}
				}
			}
		} else {
			echo '<span style="font-size: 13px;text-align: center;display: block;">В данный момент сайтов для баннерного серфинга нет</span>';
		}
	} else {
		baninfo();
	}
	?>
</div>

<script>
	$(document).ready(function() {
	    $('.alls_block_check_ser .serfer .topics .lefts a').click(function() {

	    	$(this).prepend('<div class="activeserf"></div>');
	    });
	});
</script>
<?bottom();?>