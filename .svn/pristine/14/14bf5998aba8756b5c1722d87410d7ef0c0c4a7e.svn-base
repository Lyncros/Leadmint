<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://ogp.me/ns/fb#">
<head>
	<?php header('P3P: CP="NOI ADM DEV COM NAV OUR STP"');?>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<script type="text/javascript">
		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', '<?php echo $ga_account; ?>']);
		_gaq.push(['_addIgnoredRef', 'static.ak.facebook.com']);
		
		// If GA is loaded && the page is not framed inside our Facebook URL, frame the page.
		if (_gaq.push && self.location == top.location) {
			
			// Create a fake URL that we can filter in Google Analytics. This pageview also sends the traffic source data to Google Analytics.
			_gaq.push(['_trackPageview','<?php echo $track_page_url; ?>']);
			// Tracking done, let's frame the page		
			setTimeout(function () { window.location.href = '<?php echo $redirect_url; ?>';},100);	
		} else if (self.location == top.location) {
			// If Google Analytics doesn't load within 1 second, refresh and frame the page anyway.
			setTimeout(function () { window.location.href = '<?php echo $redirect_url; ?>';},1000);
		} else {
			// If the Page is framed, track it.
			_gaq.push(['_trackPageview']);		
		}
	 
		(function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();
	</script>
</head>