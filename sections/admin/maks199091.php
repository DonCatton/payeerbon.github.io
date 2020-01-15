<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Панель управления</title>
	<link rel="stylesheet" href="system/mane/css/admin.css">

	<link rel="stylesheet" href="system/mane/jqu/jquery.jgrowl.min.css">
	<link rel="stylesheet" href="system/mane/css/jqs.css">

	<link rel="stylesheet" href="system/mane/css/jquery.formstyler.css">
	<link rel="stylesheet" href="system/mane/css/jquery.formstyler.theme.css">

	<link rel="stylesheet" href="system/mane/css/checkbox.css">
	<link rel="stylesheet" href="system/mane/css/font-awesome.css">
	<link rel="stylesheet" href="system/mane/css/font-awesome.min.css">
	<script>window.$k$tk = {tkS: '<?=GenerateToken()?>'};</script>
	<script src="system/mane/js/jquery-3.2.1.js"></script>
	<script src="system/mane/js/jquery.session.js"></script>

	<script src="system/mane/js/jquery.formstyler.js"></script>
	<script src="system/mane/js/jquery.formstyler.min.js"></script>
	
	<script src="system/mane/js/tinymce/tinymce.min.js"></script>
	
	<script src="system/mane/js/script.js"></script>
	<script src="system/mane/js/admins.js"></script>

	<script src="system/mane/jqu/jquery.jgrowl.min.js"></script>

	<script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
	<?


	if ($_SESSION['authadms'] != 'okes') {
		include "admset/adm_auth.php";
	} else {
		include "admset/adm_web.php";
	}

	?>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>