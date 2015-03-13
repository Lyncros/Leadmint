	<div id="countdown_holder">
		<div id="countdown_dashboard">
<!--
			<div class="dash weeks_dash">
				<span class="dash_title"><?php lang_line('app_weeks') ?></span>
				<div class="digit">0</div>
				<div class="digit">0</div>
			</div>
-->

			<div class="dash days_dash">
				<span class="dash_title"><?php lang_line('app_days') ?></span>
				<div class="digit">0</div>
				<div class="digit">0</div>
			</div>

			<div class="dash hours_dash">
				<span class="dash_title"><?php lang_line('app_hours') ?></span>
				<div class="digit">0</div>
				<div class="digit">0</div>
			</div>

			<div class="dash minutes_dash">
				<span class="dash_title"><?php lang_line('app_minutes') ?></span>
				<div class="digit">0</div>
				<div class="digit">0</div>
			</div>

			<div class="dash seconds_dash">
				<span class="dash_title"><?php lang_line('app_seconds') ?></span>
				<div class="digit">0</div>
				<div class="digit">0</div>
			</div>
		</div>
		
		<div id="conutdown_status_text">
			<?php $on_campaign ? lang_line('app_countdown_status_campaign') : lang_line('app_countdown_status_teaser'); ?>
		</div>
	</div>
		<script language="javascript" type="text/javascript">
			jQuery(document).ready(function() {
				$('#countdown_dashboard').countDown({
					targetDate: {
						'day': 		<?php echo date('d',$date); ?>,
						'month': 	<?php echo date('m',$date); ?>,
						'year': 	<?php echo date('Y',$date); ?>,
						'hour': 	<?php echo date('H',$date); ?>,
						'min': 		<?php echo date('i',$date); ?>,
						'sec': 		<?php echo date('s',$date); ?>
					},
					omitWeeks: true
					
				});
			});
		</script>