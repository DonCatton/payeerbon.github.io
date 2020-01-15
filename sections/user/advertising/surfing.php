<?
include "system/config/serf.php";
session_start();
$num_serf = (int)$_GET['num'];

$ecckmyli = $db->selects("serf","id = ? AND status = 1",[1=>$num_serf]);
$ecckmylis = $db->selects("serf_li_user","id_serf = ? AND name = ?",[1=>$ecckmyli['id'],2=>ULG]);

$timesaa = time();

switch ($ecckmyli['time']) {
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
$web = PR.WB;
?>
<?if(!empty($ecckmyli['id'])):?>
	<?if($ecckmyli['balance'] >= $ecckmyli['sum']):?>
		<?if($ecckmylis['time'] < $timesaa AND $ecckmylis['status'] == '0' OR $ecckmylis['time'] == '' AND $ecckmylis['status'] == ''):?>
			<!DOCTYPE html>
			<html lang="ru">
			<head>
				<meta charset="UTF-8">
				<link rel="canonical" href="<?=$web?>">
				<meta name="token_s" content="<?=GenerateToken('_srf').'@'.$num_serf?>">
				<title>Серфинг сайта №<?=$num_serf?> | Таймер: <?=$tim?></title>
				<script src="/system/mane/js/jquery-3.2.1.js"></script>
				<link rel="stylesheet" href="/system/mane/css/serf.css">
				<link rel="shortcut icon" href="//www.google.com/s2/favicons?domain=<?=$ecckmyli['web']?>">
			</head>
			<body>
				<script>
					$( document ).ready(function(){
						var dumps = $(window).height();
						var dumps_2 = $('.timers_blocks_pos_all').height();
						var infodum = dumps-dumps_2-3;			

						$(window).resize(function(){
							var dumps = $(window).height();
							var dumps_2 = $('.timers_blocks_pos_all').height();
							var infodum = dumps-dumps_2-3

				            var	wiliness = $('.offers_static_inf').width();
				            var dumps_22 = $(window).width();
				            if (wiliness > dumps_22) {
								$('.offers_static_inf').css("width", dumps_22);
							}				
						});
					});
				</script>

				<div class="timers_blocks_pos_all">
					<div class="blocks_left_times_capth">
						<div class="info_blocks_ttt"><h4><?=$tim?><span> секунд</span></h4></div>
						<div class="captcha" style="display: none;">
							<div class="img">
								<img src="/system/captchaserf.php">
							</div>
							<div class="awn">
								<button class="buttons_1" ksj="1"></button>
								<button class="buttons_2" ksj="2"></button>
								<button class="buttons_3" ksj="3"></button>
								<button class="buttons_4" ksj="4"></button>					
							</div>
						</div>
						<div class="information_capt"><span></span></div>
					</div>
					<div class="offers_static_inf"></div>
				</div>
				
				<script>
					var web_h = '<?=$web?>',
						timers_w = <?=$tim?>,
						coun = false,
						info_ch = true;

					$(window).focus(function() {info_ch = true;});
					$(window).blur(function() { info_ch = false;});

					$(window).ready(function(){
						function star_co() {
							coun = true;
				            setInterval("times_go();",1000);
						}
						star_co();
					});

						function times_go(){
								if(coun){
				                	var inform = info_ch;
					                if (inform) {
					                	$(".information_capt span").html('');   

					                    timers_w--;
					                    var text_time = timers_w;
					                    if(text_time<10){
					                        text_time = "0" + text_time;    
					                    }
					                    var	wiline = $('.timers_blocks_pos_all').width();
					                    var	wilinee = $('.offers_static_inf').width();
					                    var igtoh = (wiline/text_time);
					                   // $('.offers_static_inf').css("width", igtoh);
					                    
										$( ".offers_static_inf" ).animate({width: "100%"},<?=$tim?>+"000");

					                    $(".info_blocks_ttt").html('<h4>'+text_time+'<span> секунд</span></h4>');
					                    window.top.document.title = 'Серфинг сайта №'+<?=$num_serf?>+' | Таймер: '+text_time;
					                    if(timers_w==0){
					                        window.top.document.title = 'Ожидание подтверждения';
					                        coun = false; 
					                        $('.info_blocks_ttt').hide();

					                        get_captcha();
					                    }
				                    } else {
				                    	$(".information_capt span").html('Ошибка! Вернитесь во вкладку');   
				                    }
				                }  
			            	
			            }

			            function get_captcha() {
			            	$(".information_capt span").html('Загружаю капчу...');

				       		$.ajax({
				                url: web_h+'/system/ajax/captchach.php?act=capt_add',
				                type: 'GET',
				                dataType: 'json',
                           		cache: false,
				                error: function(e) {
				                	console.log(e['responseText']);
				                	$(".information_capt span").html('ОШИБКА'); 
				                },
				                success: function(data) {
				                	$('.info_blocks_ttt').hide();
				                	$('.information_capt').hide();
				                	$('.captcha').show();
				                	$(".captcha .img img").attr('src',web_h+'/system/captchaserf.php?id='+data[4]);
									$(".captcha .awn .buttons_1").html(data[0]); 
									$(".captcha .awn .buttons_2").html(data[1]); 
									$(".captcha .awn .buttons_3").html(data[2]); 
									$(".captcha .awn .buttons_4").html(data[3]); 
				                }
				       		});                      	   
			            }


						$(".awn button").click(function(){
							$('.captcha').hide();
							$('.information_capt').show();
			            	$(".information_capt span").html('Проверка ответа...');

			            	var checkna = $(this).attr('ksj');
				       		$.ajax({
				                url: web_h+'/system/ajax/captchach.php?act=capt_check&nus='+checkna+'&num='+<?=$num_serf?>+'&tk='+$('meta[name="token_s"]').attr('content'),
				                type: 'GET',
				                error: function() {
				                	$(".information_capt span").html('ОШИБКА'); 
				                },
				                success: function(data) {

									$(".information_capt").html(data);
									setTimeout(function(){
			                            top.window.location = "<?=$ecckmyli['web']?>";
			                        }, 1000); 						
				                }
				       		});  
				       	});	                    	   

				</script>
				<iframe class="blslflflag"  style="height: 100%" src="<?=$ecckmyli['web']?>" frameborder="0"></iframe>
			</body>
			</html>
		<?else:?>
			<!DOCTYPE html>
			<html lang="en">
			<head>
				<meta charset="UTF-8">
				<title>Ошибка серфинга</title>
				<link rel="stylesheet" href="<?=PR.WB?>/system/mane/css/serf.css">
			</head>
			<body>
				<div class="block_inf_err"><span>Вы уже просматривали данный сайт</span></div>
			</body>
			</html>
		<?endif;?>	
	<?else:?>
		<!DOCTYPE html>
		<html lang="en">
		<head>
			<meta charset="UTF-8">
			<title>Ошибка серфинга</title>
			<link rel="stylesheet" href="<?=PR.WB?>/system/mane/css/serf.css">
		</head>
		<body>
			<div class="block_inf_err"><span>Рекламный баланс данного проекта закончился. Попробуйте позже</span></div>
		</body>
		</html>
	<?endif;?>
<?else:?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Ошибка серфинга</title>
		<link rel="stylesheet" href="<?=PR.WB?>/system/mane/css/serf.css">
	</head>
	<body>
		<div class="block_inf_err"><span>Сайт для просмотра не найден. Возможно он приостановлен</span></div>
	</body>
	</html>
<?endif;?>