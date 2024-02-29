(function($){'use strict';var browserWindow=$(window);browserWindow.on('load',function(){$('.preloader').fadeOut('slow',function(){$(this).remove();});});if($.fn.classyNav){$('#creditNav').classyNav();}
if($.fn.owlCarousel){var welcomeSlide=$('.hero-slideshow');welcomeSlide.owlCarousel({items:1,loop:true,nav:true,navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],dots:true,autoplay:true,autoplayTimeout:10000,smartSpeed:500});welcomeSlide.on('translate.owl.carousel',function(){var slideLayer=$("[data-animation]");slideLayer.each(function(){var anim_name=$(this).data('animation');$(this).removeClass('animated '+anim_name).css('opacity','0');});});welcomeSlide.on('translated.owl.carousel',function(){var slideLayer=welcomeSlide.find('.owl-item.active').find("[data-animation]");slideLayer.each(function(){var anim_name=$(this).data('animation');$(this).addClass('animated '+anim_name).css('opacity','1');});});$("[data-delay]").each(function(){var anim_del=$(this).data('delay');$(this).css('animation-delay',anim_del);});$("[data-duration]").each(function(){var anim_dur=$(this).data('duration');$(this).css('animation-duration',anim_dur);});}
if($.fn.scrollUp){browserWindow.scrollUp({scrollSpeed:1500,scrollText:'<i class="fa fa-angle-up"></i> Top'});}
if($.fn.counterUp){$('.counter').counterUp({delay:10,time:2000});}
if($.fn.circleProgress){$('#circle').circleProgress({size:90,emptyFill:"rgba(0, 0, 0, .0)",fill:'#fff',thickness:'3',reverse:true});$('#circle2').circleProgress({size:90,emptyFill:"rgba(0, 0, 0, .0)",fill:'#fff',thickness:'3',reverse:true});$('#circle3').circleProgress({size:90,emptyFill:"rgba(0, 0, 0, .0)",fill:'#fff',thickness:'3',reverse:true});$('#circle4').circleProgress({size:90,emptyFill:"rgba(0, 0, 0, .0)",fill:'#ffbb38',thickness:'3',reverse:true});$('#circle5').circleProgress({size:90,emptyFill:"rgba(0, 0, 0, .0)",fill:'#ffbb38',thickness:'3',reverse:true});$('#circle6').circleProgress({size:90,emptyFill:"rgba(0, 0, 0, .0)",fill:'#ffbb38',thickness:'3',reverse:true});$('#circle7').circleProgress({size:90,emptyFill:"rgba(0, 0, 0, .0)",fill:'#ffbb38',thickness:'3',reverse:true});$('#circle8').circleProgress({size:90,emptyFill:"rgba(0, 0, 0, .0)",fill:'#ffbb38',thickness:'3',reverse:true});$('#circle9').circleProgress({size:90,emptyFill:"rgba(0, 0, 0, .0)",fill:'#ffbb38',thickness:'3',reverse:true});}
if($.fn.tooltip){$('[data-toggle="tooltip"]').tooltip();}
$('a[href="#"]').on('click',function($){$.preventDefault();});if($.fn.jarallax){$('.jarallax').jarallax({speed:0.2});}
if($.fn.sticky){$("#sticker").sticky({topSpacing:0});}
if(browserWindow.width()>767){new WOW().init();}})(jQuery);