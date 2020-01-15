<div class="bloks_all_statick_permission blolckscenters">
	<div class="blocks_t_stats_p bots">
		<div class="blocksstatp blocksl">
			<div class="pod_s_inf">
				<h4>Всего пользователей</h4>
				<span><?all_use_perm('1', 0);?></span>
			</div>
			<div class="pod_s_img" title="С привилегией">
				<img src="system/mane/img/admin/user.png" alt="">
			</div>
		</div>

		<div class="blocksstatp blocksl">
			<div class="pod_s_inf">
				<h4>Общий их баланс</h4>
				<span><?all_ul_bal('1', 0);?> руб.</span>
			</div>
			<div class="pod_s_img" title="На данный момент">
				<img src="system/mane/img/admin/coins.png" alt="">
			</div>
		</div>

	</div>

	<div class="blocks_list_static_per bots fff" style="padding: 10px;">
		<div class="info_history">
			<?

			$list_w_user = $db->row("permis_list","id ORDER BY id DESC LIMIT 10",[]);

			if (count($list_w_user) > 0) {
				foreach ($list_w_user as $list_p) {

					if ($list_p['permission'] == '3') {
						$stat_per_t_re = 'Синий алмаз';
					}
					else if($list_p['permission'] == '2') {
						$stat_per_t_re = 'Желтый алмаз';
					}


					echo ' 

							<div class="blockshist_gods razmers">
								<p>'.$list_p['login_u'].', купил привилегию '.$stat_per_t_re.'</p>
								<span><b>Дата:</b> '.$list_p['date'].'</span>
							</div>

					 ';
				}
			} else {
				echo '<bb style="font-size: 14px;">У вас еще не покупали привилегию</bb>';
			}


			?>

		</div>
	</div>
</div>