// Mobile Navigation control
// Credit goes to infinitypush

jQuery('document').ready(function(){
		function responsive() {
		if(jQuery(window).width() <= 1100){
			console.log('mobile navigation');
				jQuery('#primary-navigation').infinitypush({
					pushdirectionleft: true,
					offcanvasleft: false
				});
				jQuery('body').removeClass('desktop');
		} else {
			console.log('desktop navigation');
				jQuery('#primary-navigation').infinitypush({
				destroy:true
			});
				jQuery('body').addClass('desktop');
		}
	}
		function windowResize(){
		jQuery(window).resize(function(){
			responsive();
		});
	}
		responsive();
	windowResize();
	});
