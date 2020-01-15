<?include DIR_BLOCK."/config/config.php"; ?>
<?include DIR_BLOCK."/config/banners.php"; ?>
<?include DIR_BLOCK."/config/payeers.php"; ?>
<?include DIR_BLOCK."/config/payer_r.php"; ?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<link rel="canonical" href="<?=PR.WB?>">
	
	<title><?=$config['name_proj']?> | <?=$title?></title>
        <meta name="description" content="Раздача Бонусов, Раздача Бонусов, Бонусы на Payeer, Ваш дополнительный доход, Сбор бонусов, Доход.">
        <meta name="keywords" content="бонуы, доход, дополнительный доход, сбор бонусов, рефералы, раздача бонусов.">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="/favicon.ico" type="image/ico">
	
	<link type="text/css" href="system/mane/css/mane.css?<?php echo time();?>" rel="stylesheet"/>
	<link rel="stylesheet" href="system/mane/css/font-awesome.css">
	<link rel="stylesheet" href="system/mane/css/font-awesome.min.css">
	<link rel="stylesheet" href="system/mane/jqu/jquery.jgrowl.min.css">
	<link rel="stylesheet" href="system/mane/css/jqs.css">
    <link rel="stylesheet" href="/css/animsition.min.css">
   
	<script src="system/mane/js/jquery-3.2.1.js"></script>
	<script src="system/mane/js/script.js"></script>
	<script>window.$k$tk = {tkS: '<?=GenerateToken()?>'};</script>
	<script src="system/mane/js/jquery.session.js"></script>
	<script src="system/mane/jqu/jquery.jgrowl.min.js"></script>
	<script src="system/mane/js/tinymce/tinymce.min.js"></script>
	
	<?if ($config['captcha'] == '3') echo "<script src='https://www.google.com/recaptcha/api.js'></script>";?>
    <script src="https://cdn.gravitec.net/storage/148c62ae88e8ecc54812d365ccb1a856/client.js" async></script>
   
   </head>


   <body><div class="animsition">
      
   <?
   global $db;
   if (!empty(UID)) {
		global $page;
		$nw_l = $db->selects("news_list","date >= ? ORDER BY id DESC",[1=>strtotime("-2 day")]);

		if (!empty($nw_l['id'])) {
		   if ($_COOKIE['news_n'] != $nw_l['id'] && $_SESSION['news_n'] != $nw_l['id'] ) {
		   		$st_n = ' <span style="color:red">NEW</span>';
		   		if ($page == 'news') {
		   			setcookie('news_n',$nw_l['id']);
		   			$_SESSION['news_n'] = $nw_l['id'];
		   		}
		   }
		}
	}

   ?>

<div class="all_content">	   
	
	   <div class="content_center_ogr">
	<table width="100%" border="0">
            <tr>
	    <td align="left" >
			<a href="/"><div class="block_left_name_web">
					<h1>&nbsp;&nbsp;<?=$config['name_proj']?></h1>
				<span><font color="#777">&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?=$config['pod_name_bl']?></b></font></span>
			</div></a>
             </td>
			
            <td align="right">
          <div class="block_menu_h">
	<ul>
	    <li><a href="/">Главная</a></li>
		<li><a href="news"><font color="orange">Новости</a></li>
		<li><a href="withdrawal_all">Статистика</a></li>
		<li><a href="rules">Правила</a></li>
        <li><a href="faq">FAQ</a></li>
		<li><a href="contacts">Контакты</a></li>
		
	</ul>
            </td>
</tr>
</table>                                 
 </div>

	<div class="block_center_content">
	<div class="hline">
	    </div>
	     
	
				<!--| Подключение баннерного блока |-->
				<? include 	DIR_BLOCK."/usections/bannerblock.php"; ?>
				<!--|**************************|-->
		
	    
		<div class="block_center_content_cc">
			<div class="block_center_contentss">

				<!--| Подключение левого блока |-->
				<? include DIR_BLOCK."/usections/leftblock.php"; ?>
				<!--|**************************|-->


				<!--| Подключение центрального блока |-->
				<div class="block_center_c razm_b">
					<div class="block_c_g_inf ost_c_b ots">
					<?=MessageInfo()?>

