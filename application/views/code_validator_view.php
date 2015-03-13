<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://ogp.me/ns/fb#">
<head>
<?php header('P3P: CP="NOI ADM DEV COM NAV OUR STP"');?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<meta property="fb:admins" content="<?php echo $campaign->fb_user_id; ?>, 100003402403277, 689991521"/>
<link href="<?php echo base_url(); ?>html/css/apps/reset.css" rel="stylesheet" type="text/css" >
<link href="<?php echo base_url(); ?>html/css/apps/common.css" rel="stylesheet" type="text/css" >
<link href="<?php echo base_url(); ?>html/css/apps/<?php echo $app_css; ?>.css" rel="stylesheet" type="text/css" >
<script type="text/javascript" src="<?php echo base_url(); ?>html/js/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>html/js/jquery.validate.js"></script>
<link href="<?php echo base_url(); ?>html/js/jquery-popw/jquery.popw.css" rel="stylesheet" type="text/css" >
<script type="text/javascript" src="<?php echo base_url(); ?>html/js/jquery-popw/jquery.popw.js"></script>
<link href="<?php echo base_url(); ?>html/js/jquery-ui-datepicker/default.css" rel="stylesheet" type="text/css" >
<script type="text/javascript" src="<?php echo base_url(); ?>html/js/date.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>html/js/jquery.lwtCountdown-1.0.js"></script>
<link href="<?php echo base_url(); ?>html/css/apps/timer.css" rel="stylesheet" type="text/css" >
<style type="text/css">
	<?php echo $user_style; ?>
</style>

<?php echo $analytics; ?>
</head>
<body>

<div id="campaign_body" style="display:none;">
	<div id="fb-root"></div>
	<?php echo $common_facebook; ?>
	
	<?php echo isset($timer_view) ? $timer_view : ''; ?>
	
	<div id="header-holder">
	<?php echo $user_content; ?>
	</div>
	
	<div id="already-participating">
		<?php lang_line('app_code_validator_already_participating') ?>
	</div>
	<div id="code-validator-holder" class="promo-form-holder">
		<form action="<?php echo base_url(); ?>apps/code_validator/save" method="post" id="form-code-validator" class="contest-form">
			<input type="hidden" name="campaign_id" value="<?php echo $campaign->id; ?>" />
			<input type="hidden" name="user_id" id="code_validator_user_id" value="-1" />
			

<?php
				$ndx = 0; 
				$requirements = explode(',',$campaign->application->app_user_requirements->value);
				if(in_array('name',$requirements))
				{
			?>
					<p class="usename">
						<input type="text" name="name" id="user_name" class="required" value="" placeholder="<?php lang_line('app_user_requirement_name') ?>" />
					</p>
			<?php
				} 
				
				if(in_array('email',$requirements))
				{
			?>
					<p class="input-prepend useremail">
						<span class="add-on"><i class="icon-envelope"></i></span><input type="text" name="email" id="user_email" class="span2 required email" value="" placeholder="<?php lang_line('app_user_requirement_email') ?>" />
					</p>
			<?php
				}
				
				if(in_array('phone',$requirements))
				{
			?>
					<p class="phone">
						<input type="text" name="phone" class="required"value="" placeholder="<?php lang_line('app_user_requirement_phone') ?>" />
					</p>

			<?php
				}
				
				if(in_array('birthday',$requirements))
				{
			?>
					<p class="birthday">
												
						<label><?php lang_line('app_user_requirement_birthday') ?></label>
						<select id="birthday-day" name="birthday-day" class="span1">
						<?php for($i=1; $i<=31; $i++) { ?>
							<option value="<?php echo $i; ?>" <?php echo date('d') == $i ? 'selected="selected"':''; ?>><?php echo $i; ?></option>
						<?php } ?>
						</select>
						
						<select id="birthday-month" name="birthday-month">
						<?php for($i=1; $i<=12; $i++) { ?>
							<option value="<?php echo $i; ?>" <?php echo date('m') == $i ? 'selected="selected"':''; ?>><?php echo $i; ?></option>
						<?php } ?>
						</select>
						
						<select id="birthday-year" name="birthday-year">
						<?php for($i=1940; $i<= date('Y'); $i++) { ?>
							<option value="<?php echo $i; ?>" <?php echo date('Y') == $i ? 'selected="selected"':''; ?>><?php echo $i; ?></option>
						<?php } ?>
						</select>
						
						<input type="hidden" id="birthday" name="birthday" class="required valid_date" value="<?php echo date('Y-m-d'); ?>" />
						
					</p>
					<script type="text/javascript">
						$('#birthday-day').change(function(){
							make_birthday();
						})
						$('#birthday-month').change(function(){
							make_birthday();
						})
						$('#birthday-year').change(function(){
							make_birthday();
						})
						
						function make_birthday()
						{
							$('#birthday').val($('#birthday-year').val()+'-'+$('#birthday-month').val()+'-'+$('#birthday-day').val())
						}
					</script>
			<?php
				}
				
				if(in_array('custom',$requirements)) {
			?>
					<p class="custom">
						<input type="text" name="custom" class="required" value="" placeholder="<?php echo $campaign->application->app_user_requirements_custom_label->value; ?>" />
					</p>
			<?php
				}

				if(in_array('country',$requirements)) {
			?>
					<p class="country"><label><?php lang_line('app_user_requirement_country') ?></label>
						<?php echo country_dropdown('country') ?>
					</p>
			<?php
				}

				if(in_array('gender',$requirements))
				{
			?>
					<p class="radio">
						<label><input type="radio" name="gender" value="male" checked="checked" />  <?php lang_line('app_user_requirement_male') ?> </label>
						<label><input type="radio" name="gender" value="female" />  <?php lang_line('app_user_requirement_female') ?> </label>
					</p>
			<?php
				}
			?>

			<p class="p_code success">
				<input type="text" id="code_to_validate" name="code" class="input_code required" value="" placeholder="<?php lang_line('app_user_requirements_code') ?>"/>
			</p>
			
			<div id="show-errors"></div>
			<div class="actions">
				<input type="button" id="form-submit" class="disabled btn participate btn-large btn-success btn-block" value="<?php lang_line('app_code_validator_participate'); ?>">
			</div>
		</form>
	</div>
	
	<div id="terms-conditions">
		<a href="#" class="show-terms"><?php lang_line('app_terms_conditions'); ?></a>
	</div>
	
	<script type="text/javascript">		
		
		$fb_status.on('on_ready', function(){
			get_status(new Array('publish_stream','email'))
		})
		
		$fb_status.on('on_status', function() {
			if($fb_status.status != true)
			{
				on_status_show_form(true);
			}
		})
		
		$fb_status.on('on_user', function(){
			if($fb_status.user)
			{
				$('#code_validator_user_id').val($fb_status.user.id);
				if($('#user_name').val() == '') $('#user_name').val($fb_status.user.name);
				if($('#user_email').val() == '') $('#user_email').val($fb_status.user.email);
				$.post(
					'<?php echo base_url(); ?>apps/code_validator/check_participation',
					{'campaign_id':<?php echo $campaign->id; ?>,user_id:$fb_status.user.id,'category':'code_validator','limit':1},
					function(rsp)
					{
						if(rsp.status == 'ok')
						{
							on_status_show_form(true);
						}
						else
						{
							on_status_show_form(false);
						}
					},
					'json'
				)				
			}			
		})
		
		function on_status_show_form(show)
		{
			$('#form-submit').removeClass('disabled');
			$('#campaign_body').show();
			if(show)
			{
				$('#already-participating').hide();
				$('#code-validator-holder').show('fast');
			}
			else
			{
				$('#already-participating').show('fast');
				$('#code-validator-holder').hide();
			}
		}
				
		$.validator.addMethod("valid_date", function(value,element) {
			var my_date = new Date.parse(value);
			return my_date instanceof Date;
		}, "Please check your dates. The start date must be before the end date.");
		
		$.validator.messages.required = '<?php lang_line('app_error_required'); ?>';
		$.validator.messages.email = '<?php lang_line('app_error_email'); ?>';
		$.validator.messages.digits = '<?php lang_line('app_error_only_digits'); ?>';
		$.validator.messages.valid_date = '<?php lang_line('app_error_valid_date') ?>';
		$('#form-code-validator').validate({
			messages: {	}
		});
		
		function submit_code_validator()
		{
			if( ! $fb_status.status)
			{
			<?php 
			if($analytics) {
			?>		
				_gaq.push(['_trackEvent', 'User Action', 'Login/Permission Request', 'Contest']);
			<?php	
				}
			?>
				get_login(
					new Array('publish_stream','email'),
					submit_code_validator,
					function(){
						alert('No permissions');
					}
				)
				return false;
			}
						
			// login ok, submit the form
			$('#code_validator_user_id').val($fb_status.response.userID)
			var $form = $('#form-code-validator');			
			if( ! $form.validate().form() ) return false;
			var data = $form.serialize();
			
			$.post('<?php echo base_url(); ?>apps/code_validator/check_code', data, function(rsp){
				if (rsp.status == 'ok')
				{						
					$('#code_validator_user_id').val($fb_status.response.userID)
					
					<?php 
					if($analytics) {
					?>		
						_gaq.push(['_trackEvent', 'User Action', 'Submit participation form', 'Contest']);
					<?php	
						}
					?>				
					$.post($form.attr('action'),data, function(rsp){
						if(rsp.status == 'ok')
						{
							var wallPost = {
								link: '<?php echo ($campaign->fb_page_link .'?sk=app_'.$campaign->application->fb_app_id ) ?>',
								name: '<?php echo $campaign->application->app_wall_title; ?>',
								caption: $fb_status.user.name +' <?php lang_line('app_is_participating') ?> ' + '<?php echo $campaign->fb_page_title; ?>',
								description:'<?php echo $campaign->application->app_wall_description; ?>',
								picture: '<?php if ($campaign->hasPostAvatar()) echo $campaign->media('app_avatar', false); else echo '';?>'
							};
							feed(wallPost);
							on_status_show_form(false);
						}
						else
						{
							alert(rsp.message);
						}
					},'json');
				}
				else
				{
					$("#code_to_validate").after('<label for="code" generated="true" class="error" style=""><?php lang_line('app_code_validator_invalid_code_user_message')?></label>');
				}
			},'json');
		}		
		
		$('#form-submit').click(function(e) {
			e.preventDefault();
			if($(this).hasClass('disabled')) return false;
			
			submit_code_validator();
		})
		
		function show_terms()
		{
			var url = '<?php echo base_url(); ?>/apps/fbapp/terms/<?php echo $campaign->id; ?>';
			var props =  "height=500,width=700,scrollTo,resizable=0,scrollbars=1,location=0";
			var popup = window.open(url, '', props);
		}
		
		$('.show-terms').live('click',function(e) {
			e.preventDefault();
			show_terms();
		})
		
	</script>
	
	<?php echo isset($comments_view) ? $comments_view : ''; ?>
	
	<script type="text/javascript">
	<?php 
		if($analytics) {
	?>
		_gaq.push(['_trackEvent', 'PageView', 'Campaign', 'CodeValidator']);
	<?php	
		}
	?>
	</script>
</div>
</body>
</html>