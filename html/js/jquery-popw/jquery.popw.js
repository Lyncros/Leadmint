(function($) {
	
	var Popwindow = function (options)
	{
		this.init();
		this.options(options);
		this.get_window_size();
		this.get_overlay();
		this.get_popup();
		
		var self = this;
		$(window).bind('resize',function(evt){self.resize()})
		
		$('body').data('popw',this);
	}
	Popwindow.defaults = {
		zindex: 1000,
		width:'auto',
		height:'auto',
		overlay_close:true,
		show_close:false
	};
	
	Popwindow.prototype = {
		log:function(){
			console.log('cookie');
		},
		init: function()
		{
			$.extend( this, Popwindow.defaults );
		},
		get_window_size: function() {
			this.wh = $(document).height();
			this.ww = $(document).width();
		},
		get_overlay:function() {
			// check if overlay exists
			this.overlay = $('#popw-overlay');
			if(this.overlay.length == 0)
			{
				this.overlay = $('<div id="popw-overlay"></div>')
				$('body').append(this.overlay);
			}
			
			this.overlay.width(this.ww).height(this.wh).css('opacity',.7);
			
		},
		get_popup: function()
		{
			this.wrapper = $('#popw-wrapper');
			if(this.wrapper.length == 0)
			{
				this.wrapper = $('<div id="popw-wrapper"><div id="popw-content"></div><div id="popw-inner-overlay"></div></div>')
				$('body').append(this.wrapper);
			}
			//clean-up
			this.wrapper.removeClass('confirm').removeClass('remote');
			this.content = $('#popw-content');
			this.inner_ov = $('#popw-inner-overlay');
			
			this.inner_ov.css('opacity',.7);
			this._size();
			//this.close.css('display', (this.show_close ? '' : 'none'));
			//clean-up
			this.content.html('');
			
		},
		_size: function()
		{
			this.wrapper.css('width',this.width);
			this.wrapper.css('height',this.height);
			this.inner_ov.css('width',this.width);
			this.inner_ov.css('height',this.height);
		},
		_clean_up: function()
		{
			
			this.content.html('');
			this.wrapper.removeClass('confirm');
			this.content.removeClass('loading');
		},
		resize: function()
		{
			this.get_window_size();
			this.overlay.width(this.ww).height(this.wh);
		},
		enable_overlay: function(op)
		{
			var self = this;
			this.overlay.unbind('click');
			this.overlay.bind('click',function(evt){
				evt.preventDefault()
				if(op) self.hide()
			})
		},
		enable_close: function(op)
		{
			//$('#popw-close').css('visibility', (op ? 'visible' : 'hidden'));
		},
		show:function()
		{
			this.overlay.show();
			
			this.pw = this.wrapper.width();
			var left = (this.ww - this.pw) / 2 + 'px';
			this.wrapper.css('left',left).css('z-index',this.zindex+1);
			
			this.wrapper.show();
		},
		hide:function()
		{
			var self = this;
			this.overlay.fadeOut(200);
			this.wrapper.fadeOut(200,function(){
				self._clean_up();
			});
		},
		options:function(opts)
		{
			$.extend( this, Popwindow.defaults, opts );
			//console.log(this.height);
		},	
		remote: function(url,data,callback)
		{
			this._size();
			this.loading(true);
			this.wrapper.addClass('remote');
			this.enable_overlay(this.overlay_close)
			this.enable_close(this.overlay_close);
			
			
			
			var self = this;
			this.content.loadShiv(url,data, function(rsp){
				$('#popw-close').bind('click',function(evt){
					evt.preventDefault();
					self.hide();
				})
				self.show();
				self.loading(false);
				if(callback) callback(rsp)
			})
			
		},
		local: function($el)
		{
			console.log($el);
			this.enable_overlay(this.overlay_close)
			this.enable_close(this.overlay_close);
			this.content.empty().html($el.removeClass('hide'));
			this.show();
		},
		loading:function(on)
		{
			
			if(on)
			{
				this.enable_overlay(false);
				this.inner_ov.height(this.content.height());
				this.inner_ov.show();
			}
			else
			{
				this.enable_overlay(this.overlay_close)
				this.inner_ov.hide();
			}
		},
		confirm: function(message,ok_callback,alert,header)
		{
			this._size();
			this.enable_overlay(false);
			this.enable_close(false);
			
			var self = this;
			
			this.wrapper.addClass('confirm');
			this.wrapper.css('width',400);
			var title = header ? header : 'Confirm action';
			var cancel = alert ? '' : '<a class="button gray" href="#">Cancel</a>';
			var box = '<header><h2>'+title+'</h2></header><div class="message">'+message+'</div><div class="buttons clear-block">'+cancel+'<a class="button b1" href="#">Ok</a>';
			this.content.html(box);
			
			this.cancel = $('#popw-content .buttons .gray');
			this.cancel.bind('click',function(evt){evt.preventDefault();  self.hide()})
			
			this.ok = $('#popw-content .buttons .b1')
			this.ok.bind('click',function(evt){
				evt.preventDefault();
				
				if(ok_callback) 
				{
					self.content.children().css('visibility','hidden');
					self.content.addClass('loading');
					ok_callback()
				}
				else
				{
					self.hide()
				}
				
			})
			
			this.show();
		},
		alert: function(message)
		{
			this.confirm(message,'',true);
		}
	}
	
	$.popw = function(options)
	{
		var instance = $('body').data('popw');
		if(!instance)
		{
			instance = new Popwindow(options);
		}
		else
		{
			instance.options(options);
		}
		return instance;
	}
	
	$.fn.popw=function(options){
		
		var pw = $.popw(options);
		pw.local(this.clone(true));
		return pw;
	}

})(jQuery);