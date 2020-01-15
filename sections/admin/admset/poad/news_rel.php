
<script>
tinymce.init({
  selector: "textarea", 
  height: 200,
  plugins: "print preview searchreplace autolink directionality visualblocks visualchars fullscreen image link media template codesample charmap hr nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools contextmenu textpattern help",
	toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat preview',
  image_advtab: true,
  content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tinymce.com/css/codepen.min.css'
  ]
 });
</script>
<script>tinymce.init({ selector:'textarea' });</script>

<?$infonews = $db->selects("news_list", "id = ?",[1=>(int)$_GET['id']]);?>

<div class="blocksel_all_b">
	<div class="blockscontentsel_all_b">
		<div class="headerblocka_all_b">
			<h4><i class="fa fa-pied-piper" aria-hidden="true"></i> Редактирование новости</h4>
		</div>
		<div class="blockscontent_all_b">
			<form method="POST">
				<input type="hidden" id="id" value="<?=$infonews['id']?>">
				<div class="formsblocks_r bots">
					<label>Название:</label>
					<input id="name_new" type="text" placeholder="Название новости" class="formcont controlspan" value="<?=$infonews['name']?>">
				</div>
				<div class="formsblocks_r bots">
					<label>Короткое описание:</label>
					<textarea id="pod_txt"><?=$infonews['pod_text']?></textarea>
				</div>
				<div class="formsblocks_r bots">
					<label>Полный текст:</label>
					<textarea id="tx_pt"><?=$infonews['text']?></textarea>
				</div>
				<br>
				<div class="formsdi" onclick="funcr['rel_news'](<?=$infonews['id']?>); return false;">
					<a>Сохранить</a>
				</div>
			</form>
		</div>
	</div>
</div>

