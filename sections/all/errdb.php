<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Ошибка 0012</title>
</head>
<style>
	* {
		margin: 0;
		padding: 0;
	}
	body {
		background: #e7eaea;
		font-family: -apple-system,BlinkMacSystemFont,Roboto,Open Sans,Helvetica Neue,sans-serif;
	}

	.allsblock {
		display: block;
		position: absolute;
		left: 50%;
		top: 25%;
		margin-left: -352px;
		margin-top: -50px;
		width: 705px;
	}
	.allsblock img {
		width: 350px;
		float: left;
		position: relative;
		background-size: contain;
		pointer-events: none;
	}

	.blerrors h1 {
		font-size: 26pt;
	    color: #47a6c3;
	    user-select: none;
	    text-shadow: 0 1px 1px;
	}
	.blerrors span {
    font-size: 18px;
    color: #737373;
    user-select: none;
    text-shadow: 0 0 0;
    display: block;
    margin-top: 10px;
	}
	.blerrors {
		top: 138px;
		left: -9 0px;
		display: block;
		position: relative;
	}
</style>
<body>
	<div class="allsblock">
		<img src="system/mane/img/errorsdb.png" alt="">
		<div class="blerrors">
			<h1>Ой..</h1>
			<span>Связь с Базой Данных потеряна. Попробуйте зайти позже.</span>
		</div>
	</div>
</body>
</html>