jQuery.noConflict();
jQuery(document).ready(function() {

	if(parseInt(jQuery.browser.version) == 9)
	{
		var nwediv = "<div id='uberbar'> <strong>Pin your favourite site with IE9, simply drag site icon and drop it on your taskbar!</strong> <a href='#' class='close-notify'>X</a></div>";
		jQuery('body').append(nwediv);

		cookiename = getCookie('barclose');
		if(cookiename != null && cookiename != "")
		{
			jQuery('#uberbar').hide();
		}
		else
		{
			jQuery('#uberbar').show();
			(function() {
			//settings
			var fadeSpeed = 200, fadeTo = 0.5, topDistance = 30;
			var topbarME = function() { jQuery('#uberbar').fadeTo(fadeSpeed,1); }, topbarML = function() { jQuery('#uberbar').fadeTo(fadeSpeed,fadeTo); };
			var inside = false;
			//do
			jQuery(window).scroll(function() {
			  position = jQuery(window).scrollTop();
			  if(position > topDistance && !inside) {
				//add events
				topbarML();
				jQuery('#uberbar').bind('mouseenter',topbarME);
				jQuery('#uberbar').bind('mouseleave',topbarML);
				inside = true;
			  }
			 
			}); 
			jQuery('#uberbar a.close-notify').click(function () {
						jQuery('#uberbar').css({zIndex:99}).fadeOut('slow');
						jQuery('#uberbar').hide();
						setCookie('barclose','closed', 375 );
						return false;
					});

		  })();
		}
		
		
		
		
	}
  
});

function getCookie(c_name)
{
	if (document.cookie.length>0)
	  {
	  c_start=document.cookie.indexOf(c_name + "=");
	  if (c_start!=-1)
		{
		c_start=c_start + c_name.length+1;
		c_end=document.cookie.indexOf(";",c_start);
		if (c_end==-1) c_end=document.cookie.length;
		return unescape(document.cookie.substring(c_start,c_end));
		}
	  }
	return "";
}

function setCookie(c_name,value,expiredays)
{
	var exdate=new Date();
	exdate.setDate(exdate.getDate()+expiredays);
	document.cookie=c_name+ "=" +escape(value)+
	((expiredays==null) ? "" : ";expires="+exdate.toUTCString());
}

