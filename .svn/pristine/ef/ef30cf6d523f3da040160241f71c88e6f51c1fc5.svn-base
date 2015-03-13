	<div class="app_popup" id="app_popup"></div>
	
	<script>
		
		var $fb_status = $({'data':false});
		$fb_status.extend({'status':undefined,'user':false,'response':false})
		
		window.fbAsyncInit = function() {
			FB.init({
				appId      : '<?php echo $facebook_app_id; ?>',
				status     : true, 
				cookie     : true,
				xfbml      : true,
				oauth      : true,
			});
			
			FB.Canvas.setSize({height:525});
			setTimeout("FB.Canvas.setAutoGrow()",500);
			
			$fb_status.trigger('on_ready')	
		};
		
		(function(d){
		var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {return;}
		js = d.createElement('script'); js.id = id; js.async = true;
		js.src = "//connect.facebook.net/en_US/all.js";
		d.getElementsByTagName('head')[0].appendChild(js);
		}(document));
		
		
		function get_status(perm_array)
		{

			if($fb_status.status != undefined) return false // already asked for status
			$fb_status.status = 'waiting';

			FB.getLoginStatus(function(response) {
				if (response.status === 'connected') {
				
					var uid = response.authResponse.userID;
					var accessToken = response.authResponse.accessToken;
					
					var query = FB.Data.query('select '+ perm_array.join(',') + ' from permissions where uid={0}', response.authResponse.userID);
			 		query.wait(function(rows) 
	                {
	                	var has_perms = check_permissions(rows[0], perm_array);
	                    if(has_perms)
	                    {
	                    	$fb_status.status = true;
	                    	$fb_status.response = response.authResponse;
	                    	$fb_status.trigger('on_status');	  
	                    } else {
	                    	$fb_status.status = false;
							$fb_status.trigger('on_status');                    
						}
						get_user();
	                });
					
				} else if (response.status === 'not_authorized') {
					$fb_status.status = false;
					$fb_status.trigger('on_status');
				} else {
					// the user isn't logged in to Facebook.
					$fb_status.status = false;
					$fb_status.trigger('on_status');
				}
			});
		}
		
		function get_login(perm_array,ok_callback, no_auth_callback)
		{
			FB.login(function(response) {
				
			 	if (response.authResponse) {
			 		// recheck user has granted permissions
			 		var query = FB.Data.query('select '+ perm_array.join(',') + ' from permissions where uid={0}', response.authResponse.userID);
			 		query.wait(function(rows) 
	                {
	                	var has_perms = check_permissions(rows[0], perm_array);
	                    if(has_perms)
	                    {
	                    	$fb_status.status = true;
	                    	$fb_status.response = response.authResponse;
							$fb_status.trigger('on_login');
							ok_callback();
	                     	  
	                    } else {
	                    	$fb_status.status = false;
							$fb_status.trigger('on_login');
							no_auth_callback();               
						}
	                });
			 	}
			 	else
			 	{
			 		//console.log('not logged')
			 		$fb_status.status = false;
					$fb_status.trigger('on_login');
					no_auth_callback();    
					
			 	}
			}, {scope: perm_array.join(',')});
		}
		
		function get_user()
		{
			//console.log('getting user')
			if($fb_status.user) {
				$fb_status.trigger('on_user');
				return false
			}
			
			
			FB.api('/me', function(me){
				$fb_status.user = me;
				$fb_status.trigger('on_user');
			})
		}
		
		function check_permissions(given, needed) // 
	    {
	    	var flag = true;
	    	$.each(needed, function(ndx,value) {
	    		if(given[value] != 1) flag = false;;
	    	})
	    	
	    	return flag;
	    }
	    
	    function feed(wall_post)
	    {
	    	FB.api('/me/feed', 'post', wall_post , function(response) {
	    		var ret = (response && (!response.error) )
	    		//console.log(response);
	    		$fb_status.trigger('on_feed', {success:ret});
	    	});
	    }

	</script>