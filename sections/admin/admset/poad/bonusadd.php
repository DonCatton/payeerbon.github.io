<?

$checkid = $db->selects("bonus_list", "id ORDER BY id DESC",[],'id');

?>

<div class="blocksel_all_b">
	<div class="blockscontentsel_all_b">
		<div class="headerblocka_all_b">
			<h4><i class="fa fa-pied-piper" aria-hidden="true"></i> Создание бонуса</h4>
		</div>
		<div class="blockscontent_all_b">
				<input id="number_b" type="hidden" value="<?=$checkid['id']+1?>">
				
				<div class="formsblocks_r bots">
					<label>Мин. бонус:</label>
					<input id="min_s_b" type="text" placeholder="Минимальная сумма бонуса" class="formcont controlspan">
				</div>
				<div class="formsblocks_r bots">
					<label>Макс. бонус:</label>
					<input id="max_s_b" type="text" placeholder="Максимальная сумма бонуса" class="formcont controlspan" >
				</div>
				<div class="formsblocks_r bots">
					<label>Время бонуса (мин):</label>
					<input id="times_bonus" type="text" placeholder="В минутах" class="formcont controlspan" >
				</div>
				<br>
				<div class="formsblocks_r bots">
					<label>Последняя ссылка сократителя:</label>
					<input autocomplete="off" id="web_s_b" type="text" placeholder="Вместе с http:// или https://" class="formcont controlspan">
					<br>
					<label>Первая ссылка сократителя (которая переправляет на страницу получения)</label>
					<input autocomplete="off" id="web_s_b_o" type="text" placeholder="Вместе с http:// или https://" class="formcont controlspan">
						<span style="font-size: 11px; position: relative; display: block; margin-top: 10px; color: #999999;">* Если у вас при сокращение лишь одна ссылка то вставляйте её в оба поля одну и ту же.</span><br>
					<br><span style="font-size: 12px; position: relative; display: block; margin-top: 10px; color: #555555;">Сокращенная ссылка должна вести на: <b style="position: relative; background: #fefefe; padding: 5px; border-radius: 3px; color: #df5600;">http://<?=$_SERVER['SERVER_NAME'];?>/<?=$bonus_s['name_b_2']?>?ok=<?=$checkid['id']+1?></b></span>
				</div>
				<div class="formsdi" onclick="funcr['addsbonus'](); return false;">
					<a>Создать</a>
				</div>
		</div>
	</div>
</div>