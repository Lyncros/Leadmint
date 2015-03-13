<script type="text/javascript">
	var _gaq = _gaq || [];
	
	_gaq.push(['_setAccount', '<?php echo $ga_account; ?>']);
	_gaq.push(['_addIgnoredRef', 'static.ak.facebook.com']);	
	
	<?php if($track_view_page) { ?>
		_gaq.push(['_trackPageview']);
	<?php } ?>
	
	(function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	})();	
	
	// if we have a referrer, track the event first
	<?php if($referrer) { ?>
		_gaq.push(['_trackEvent', 'Referrer', '<?php echo $referrer; ?>', '']);
	<?php } ?>
</script>