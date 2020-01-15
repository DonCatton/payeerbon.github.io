<?

/*$testprov = json_decode(json_encode($config), true);*/


?>

<div class="blolckscenters">
	<div class="blocks_settrings_alls fff" style="padding: 15px;">
		<div class="pod_blocks_name_set">
			<form method="POST">
				<h4><i class="fa fa-cog" aria-hidden="true"></i> Процент выпадания бонуса | %</h4>
				
					<div class="form_blocks_s">
						
						<input type="text" id="bon_r" placeholder="От 1% до 100% - шанс выпадения от минималки до максимум" value="<?=$chance['1']?>">
					</div>
					
				<br><br><br><br><br><br>
				<h4><i class="fa fa-cog" aria-hidden="true"></i> Реф. процентов | %</h4>
				<div class="bloks_inp_set bots">
					<div class="form_blocks_s">
					
						<input type="text" id="ref_r" placeholder="От 1% до 100% - % средств который получит рефер" value="<?=$chance['1p'];?>">
					</div>
					
				</div>
				
				<br><br><br><br><br>
					
				<div class="blocks_bottoms_set">
					<center><button onclick="funcr['save_s_perm_set'](); return false;">Сохранить</button></center>
				</div>
			</form>
		
	</div>
</div>
</div>