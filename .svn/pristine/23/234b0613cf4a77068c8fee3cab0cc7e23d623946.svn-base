<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://ogp.me/ns/fb#">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<link href="<?php echo base_url(); ?>html/css/apps/reset.css" rel="stylesheet" type="text/css" >
<link href="<?php echo base_url(); ?>html/css/apps/common.css" rel="stylesheet" type="text/css" >
<link href="<?php echo base_url(); ?>html/css/apps/<?php echo $app_css; ?>.css" rel="stylesheet" type="text/css" >
<script type="text/javascript" src="<?php echo base_url(); ?>html/js/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>html/js/jquery.validate.js"></script>
<link href="<?php echo base_url(); ?>html/js/jquery-popw/jquery.popw.css" rel="stylesheet" type="text/css" >
<script type="text/javascript" src="<?php echo base_url(); ?>html/js/jquery-popw/jquery.popw.js"></script>
<link href="<?php echo base_url(); ?>html/js/jquery-ui-datepicker/default.css" rel="stylesheet" type="text/css" >
<script type="text/javascript" src="<?php echo base_url(); ?>html/js/jquery-ui-datepicker/jquery-ui-1.8.18.custom.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>html/js/jquery.lwtCountdown-1.0.js"></script>
<link href="<?php echo base_url(); ?>html/css/apps/timer.css" rel="stylesheet" type="text/css" >
<style type="text/css">
	<?php echo $user_style; ?>
</style>
<?php echo $analytics; ?>
</head>
<body>
	<div id="fb-root"></div>
	<?php echo $common_facebook; ?>
	
	<?php echo isset($timer_view) ? $timer_view : ''; ?>
	
	<?php echo $content; ?>
	
	<div id="terms-conditions">
		<a href="#" class="show-terms"><?php lang_line('app_terms_conditions'); ?></a>
	</div>
	<script type="text/javascript">
		function show_terms()
		{
			var url = '<?php echo base_url(); ?>apps/fbapp/terms/<?php echo $campaign->id; ?>';
			var props =  "height=500,width=700,scrollTo,resizable=0,scrollbars=1,location=0";
			var popup = window.open(url, '', props);
		}
		
		$('.show-terms').live('click',function(e) {
			e.preventDefault();
			show_terms();
		})
	</script>
	<?php echo isset($comments_view) ? $comments_view : ''; ?>

	
	<?php 
		if($analytics) {
	?>
	<script type="text/javascript">
		_gaq.push(['_trackEvent', 'PageView', '<?php echo $campaign->application->status; ?>', 'Sweepstakes']);
	</script>
	<?php	
		}
	?>
</body>
</html>

