<script>
$(function() {
	var tiersscroll = setInterval(function() {
		document.getElementById("authblocksc").scrollTop = 999999;
		setInterval(function() {
			clearTimeout(tiersscroll);
		}, 800);
	}, 900);
});
</script>
<?
?>
<div class="bloksstaic_list_error_all_block">
	<div class="blocksleftinfo">
		<div class="blocks_pod_s_blocks">
			<h3>Лог ошибок <a onclick="funcr['delslogoerror'](); return false;"><i class="fa fa-magic" aria-hidden="true"></i> Очистить лог</a></h3>
			<div class="bls_block_logos_info" id="authblocksc">
				<?

					$file = 'system/errors.log';

					if (is_readable($file)) {
						$mass = read_file_func($file);
						foreach ($mass as $value) echo "<p>".$value."</p><br>";
					} else {
						echo '<p style="text-align: center;">Ошибок нет</p>';
					}
				?>
			</div>
		</div>
	</div>
	<div class="blocksrightinfo">
		<div class="blocksstatinfowarsblock">
			<h3>Кол. Ошибок</h3>
			<div class="errorblocks Warning"><span>Warning</span><b><?worldslo('system/errors.log', 'Warning');?></b></div>
			<div class="errorblocks Fatal"><span>Fatal error</span><b><?worldslo('system/errors.log', 'Fatal');?></b></div>
			<div class="errorblocks Parse"><span>Parse error</span><b><?worldslo('system/errors.log', 'Parse');?></b></div>
		</div>
	</div>
</div>