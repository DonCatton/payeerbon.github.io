<?
if ($_SESSION['adminauthsus'] != '' AND $_SESSION['authadms'] == 'okes'):

?>
<?

if ($_GET['ty'] == 'exit_adm') {
	$_SESSION['adminauthsus'] = array();
	$_SESSION['authadms'] = array();
	exit(header("Location: /maks199091"));
}

?>
<style>
	.bl_exit_adm{
		color: #2f4552;
	}
</style>
<div class="manecontentblock">
	<header>
		<div class="allblocksheader">
			<div class="blocks_h_l">
				<h2>CashLike</h2>
			</div>
			<div class="blocks_h_r">
				<div class="navig_blocks_inf">
					<a href="maks199091?sez=error&stat=list" title="Ошибки скрипта"><span><i class="fa fa-flag-o" aria-hidden="true"></i><div class="info_blocks_num"><?=filelin('system/errors.log', '1')?></div></span></a>
				</div>
				<div class="infoadminusers">
					<div class="blocksimg_and_text">
						<img src="system/mane/img/admin.png" alt="">
						<span><?=$_SESSION['adminauthsus']?></span> <span><a href="maks199091?ty=exit_adm" class="bl_exit_adm" title="Выйти с аккаунта"><i class="fa fa-sign-out" aria-hidden="true"></i></a></span>
					</div>
				</div>
			</div>
		</div>
	</header>
	<div class="blockallcenters">
		<div class="blocksmenu_l_b">
			<div class="blocksmenublallpan">
				<div class="menuspodcats">
					<ul class="blocks_menu">
						<li class="bbs"><a>Настройки <i class="fa fa-home" aria-hidden="true"></i></a>
							<ul style="<?
								if ($_GET['sez'] == 'settings') {
									echo "display: block;";
								}
							?>">
								<li><a href="maks199091?sez=settings&stat=osn">Основные</a></li>
								<li><a href="maks199091?sez=settings&stat=plat">Выплаты</a></li>
								<li><a href="maks199091?sez=settings&stat=popol">Пополнение</a></li>
								<li><a href="maks199091?sez=settings&stat=permission">Реферальные</a></li>
								<li><a href="maks199091?sez=settings&stat=bonus">Бонус</a></li>
								<li><a href="maks199091?sez=settings&stat=exchanger">Обменник</a></li>
								<li><a href="maks199091?sez=settings&stat=serf">Серфинг</a></li>
							</ul>
						</li>
						<li class="bbs"><a>Бонус <i class="fa fa-suitcase" aria-hidden="true"></i></a>
							<ul style="<?
								if ($_GET['sez'] == 'bonus') {
									echo "display: block;";
								}
							?>">
								<li><a href="maks199091?sez=bonus&stat=list">Список бонусов</a></li>
								<li><a href="maks199091?sez=bonus&stat=add">Добавить бонус</a></li>
							</ul>
						</li>
						<li class="bbs"><a>Серфинг <i class="fa fa-suitcase" aria-hidden="true"></i></a>
							<ul style="<?
								if ($_GET['sez'] == 'serf') {echo "display: block;";}
							?>">
								<li><a href="maks199091?sez=serf&stat=list">Список серфинга</a></li>
								<li><a href="maks199091?sez=serf&stat=list_b">Список б. серфинга</a></li>
							</ul>
						</li>
						<li class="bbs"><a>Платежи <i class="fa fa-money" aria-hidden="true"></i></a>
							<ul style="<?
								if ($_GET['sez'] == 'payments') {
									echo "display: block;";
								}
							?>">
								<li><a href="maks199091?sez=payments&stat=list">Выплаты средств</a></li>
								<li><a href="maks199091?sez=payments&stat=replenishment">Пополнение средств</a></li>
								<li><a href="maks199091?sez=payments&stat=permission">Покупки привилегии</a></li>
							</ul>
						</li>
						<li class="bbs"><a>Новости <i class="fa fa-file-text-o" aria-hidden="true"></i></a>
							<ul style="<?
								if ($_GET['sez'] == 'news') {
									echo "display: block;";
								}
							?>">
								<li><a href="maks199091?sez=news&stat=list">Список новостей</a></li>
								<li><a href="maks199091?sez=news&stat=add">Добавить новости</a></li>
							</ul>
						</li>
						<li class="bbs"><a>Пользователи <i class="fa fa-users" aria-hidden="true"></i></a>
							<ul style="<?
								if ($_GET['sez'] == 'user') {
									echo "display: block;";
								}
							?>">
								<li><a href="maks199091?sez=user&stat=list">Список пользователей</a></li>
							</ul>
						</li>
					
					</ul>
				</div>
			</div>
		</div>
		<div class="blockscontent_r_b">
			
<?

	if (!$_GET['sez'] OR !$_GET['stat'])
		exit(header("Location: maks199091?sez=settings&stat=osn"));

	else if ($_GET['sez'] == 'error' and $_GET['stat'] == 'list')
		include "poad/errorslist.php";
	else if ($_GET['sez'] == 'bonus' and $_GET['stat'] == 'list')
		include "poad/bonuslist.php";
	else if ($_GET['sez'] == 'bonus' && $_GET['stat'] == 'rel' && $_GET['id'] != '')
		include "poad/bonusrel.php";
	else if ($_GET['sez'] == 'bonus' && $_GET['stat'] == 'add')
		include "poad/bonusadd.php";

	else if ($_GET['sez'] == 'serf' and $_GET['stat'] == 'list')
		include "poad/serflist.php";
	else if ($_GET['sez'] == 'serf' and $_GET['stat'] == 'list_b')
		include "poad/b_serflist.php";


	else if ($_GET['sez'] == 'payments' && $_GET['stat'] == 'list')
		include "poad/w_list.php";
	else if ($_GET['sez'] == 'payments' && $_GET['stat'] == 'replenishment')
		include "poad/r_list.php";
	else if ($_GET['sez'] == 'payments' && $_GET['stat'] == 'permission')
		include "poad/permission_l_s.php";


	else if ($_GET['sez'] == 'news' && $_GET['stat'] == 'list')
		include "poad/news_l.php";
	else if ($_GET['sez'] == 'news' && $_GET['stat'] == 'add')
		include "poad/news_add.php";
	else if ($_GET['sez'] == 'news' && $_GET['stat'] == 'rel')
		include "poad/news_rel.php";

	else if ($_GET['sez'] == 'settings' && $_GET['stat'] == 'osn')
		include "poad/settings_osn.php";
	else if ($_GET['sez'] == 'settings' && $_GET['stat'] == 'plat')
		include "poad/settings_plat.php";
	else if ($_GET['sez'] == 'settings' && $_GET['stat'] == 'popol')
		include "poad/settings_popol.php";
	else if ($_GET['sez'] == 'settings' && $_GET['stat'] == 'permission')
		include "poad/settings_permission.php";
	else if ($_GET['sez'] == 'settings' && $_GET['stat'] == 'bonus')
		include "poad/settings_bonus.php";
	else if ($_GET['sez'] == 'settings' && $_GET['stat'] == 'exchanger')
		include "poad/settings_exchanger.php";
	else if ($_GET['sez'] == 'settings' && $_GET['stat'] == 'banner')
		include "poad/settings_banner.php";
	else if ($_GET['sez'] == 'settings' && $_GET['stat'] == 'serf')
		include "poad/settings_serf.php";

	else if ($_GET['sez'] == 'user' && $_GET['stat'] == 'list')
		include "poad/user_list.php";
	else if ($_GET['sez'] == 'user' && $_GET['stat'] == 'user')
		include "poad/user_prof_users.php";

	else if ($_GET['sez'] == 'advertiser' && $_GET['stat'] == 'visitors')
		include "poad/visitors.php";

	else if ($_GET['sez'] == 'script' && $_GET['stat'] == 'info')
		include "poad/infoscript.php";
	else if ($_GET['sez'] == 'script' && $_GET['stat'] == 'news')
		include "poad/news.php";
?>

		</div>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function() {
	$('.menuspodcats ul li').on('click', function() {
			
		$('.menuspodcats ul li ul').animate({height: 'hide'}, 600);

		if ($('ul', this).css('display') == 'none') {
			$('ul', this).animate({height: 'show'}, 600);
		}
		
	});

	$('.menuspodcats ul li ul li').on('click', function() {
		$(this).addClass('active');
	});

});
</script>
<?else:?>
<?

echo "Неа...";

?>
<?endif;?>