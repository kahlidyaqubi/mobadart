head.ready(document,function(){});function scrollToDiv(offset){$('body').on('click','a.scroll',function(e){e.preventDefault();$(document).off("scroll");if($(this).closest('.mainNav').length){$('.mainNav a.scroll').each(function(){$(this).parent().removeClass('active-main-menu');});$(this).parent().addClass('active-main-menu');}
var target=$(this).attr('data-href');$target=$(target);if(!$(target).length){window.location.href=$(this).attr('href');}
$('html, body').stop().animate({'scrollTop':$target.offset().top+offset},500,'swing',function(){$(document).on("scroll");});});}
function specializations(){};(function($){$.fn.multitabs=function(){var _this=$(this);var tabs=_this.children('.tab__header[data-child="false"]').children('div');var prevIndex=0;$(tabs).on('click',function(){var num;var _this=$(this);var classNameTab=_this.attr('class').split(' ');var classNameContent=_this.parent().siblings().children();});}})(jQuery);function contactMap(){google.maps.event.addDomListener(window,'load',init);function init(){var htmlDir=$('html').attr('dir');if(htmlDir=='rtl'){var centerLatLng=new google.maps.LatLng(24.464771,54.391103-0.004);}
else{var centerLatLng=new google.maps.LatLng(24.464771,54.391103+0.004);}
var mapOptions={zoom:17,center:centerLatLng,styles:[{"featureType":"all","elementType":"all","stylers":[{"saturation":"-100"}]},{"featureType":"all","elementType":"labels.text","stylers":[{"lightness":"28"}]},{"featureType":"administrative","elementType":"labels.text.stroke","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"visibility":"simplified"}]},{"featureType":"landscape","elementType":"geometry.fill","stylers":[{"color":"#dde8ee"}]},{"featureType":"poi","elementType":"geometry.stroke","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"labels.text","stylers":[{"visibility":"simplified"}]},{"featureType":"poi","elementType":"labels.text.stroke","stylers":[{"visibility":"simplified"}]},{"featureType":"poi","elementType":"geometry.fill","stylers":[{"visibility":"simplified"},{"gamma":"0.09"},{"lightness":"-58"},{"weight":"10.00"},{"invert_lightness":true},{"saturation":"-60"}]},{"featureType":"road","elementType":"geometry.fill","stylers":[{"color":"#f7f8ff"}]},{"featureType":"water","elementType":"geometry.fill","stylers":[{"color":"#c6e1f8"}]}]};var mapElement=document.getElementById('map');var map=new google.maps.Map(mapElement,mapOptions);var marker=new google.maps.Marker({position:new google.maps.LatLng(24.464771,54.391103),map:map,title:'Arab Youth Center'});}};$(document).ready(function(){scrollToDiv(70);$('.menu-bars').click(function(e){e.preventDefault();$('header').toggleClass('active');});$('.arrow-submenu').click(function(){$(this).parent().siblings().removeClass('copen');if($(this).parent().hasClass('copen')){$(this).parent().removeClass('copen');}
else{$(this).parent().addClass('copen');}});$('.mainNav a').click(function(){$('.navbar-collapse').removeClass('in');$('.navbar-toggle').removeClass('active');});$('.forgetPasswordBtn a').click(function(event){event.preventDefault();$('.loginFormWrapper').addClass('passwordResetActive');});$('.login_Link').click(function(event){event.preventDefault();$('.loginFormWrapper').removeClass('passwordResetActive');});$(window).scroll(function(){if($(this).scrollTop()>100){$('#toTop').fadeIn();}
else{$('#toTop').fadeOut();}
var scroll=$(window).scrollTop();if(scroll>=100){$("body").addClass("bodyScrolled");}
else{$("body").removeClass("bodyScrolled");}});$('#toTop').click(function(){$("html, body").animate({scrollTop:0},600);return false;});$('.navbar-toggle').click(function(){$(this).toggleClass('active');});$(document).on('click','.yamm .dropdown-menu',function(e){e.stopPropagation();});var fWidth='70%';var fHeight='70%';if(window.innerWidth<767){fWidth='98%';fHeight='90%';}
$('.fancybox-media').fancybox({maxWidth:800,maxHeight:600,fitToView:false,width:fWidth,height:fHeight,padding:0,autoSize:false,closeClick:false,openEffect:'none',closeEffect:'none',helpers:{overlay:{locked:true}}});$(".fancybox").fancybox({maxHeight:'90%',padding:1,openEffect:'fade',closeEffect:'fade',helpers:{overlay:{locked:true}}});$(".fancybox-member").fancybox({maxWidth:960,maxHeight:'90%',padding:1,openEffect:'fade',closeEffect:'fade',helpers:{overlay:{locked:true}}});$(".fancybox-md").fancybox({maxWidth:550,maxHeight:'90%',padding:1,openEffect:'fade',closeEffect:'fade',helpers:{overlay:{locked:true}}});});$(window).load(function(){});var youth={mobileLogo:function(){var i=0;var $target=$('.mobileLogoWrap .mobilelogo');setInterval(function(){$target.removeClass('active');$target.eq(i).addClass('active');if(i==$target.length-1)i=0;else i++;},4000);},youthSlider:function(elem,item){var slider=$(elem).slick({pauseOnHover:true,dots:false,rtl:$('html').attr('dir')==='rtl'?true:false,pauseOnHover:true,lazyLoad:'ondemand',pauseOnFocus:false,nextArrow:'<a class="next  sliderNav"><i class="icon icon-arrow-arrowright"></i></a>',prevArrow:'<a class="prev sliderNav"><i class="icon icon-arrow-arrowleft"></i></a>',arrows:true,slidesToShow:item,speed:600,infinite:true,autoplay:true,autoplaySpeed:4000,cssEase:'linear',responsive:[{breakpoint:1024,settings:{slidesToShow:3,slidesToScroll:3,infinite:true,dots:false}},{breakpoint:600,settings:{slidesToShow:2,slidesToScroll:2}},{breakpoint:480,settings:{slidesToShow:1,slidesToScroll:1}}]});return slider;},youthVariableWidthSlider:function(elem){var slider=$(elem).slick({dots:false,infinite:true,speed:300,slidesToShow:1,centerMode:true,variableWidth:true});return slider;},youthVerticalSliderSlider:function(elem){var slider=$(elem).slick({dots:false,infinite:true,autoplay:true,pauseOnFocus:false,pauseOnHover:true,speed:600,arrows:false,slidesToShow:1,vertical:true});return slider;},youthSingleSlider:function(elem,speed,delay){var slider=$(elem).slick({dots:false,pauseOnHover:false,pauseOnFocus:false,autoplaySpeed:delay,arrows:true,nextArrow:'<a class="next  sliderNav"><i class="icon icon-arrow-arrowright"></i></a>',prevArrow:'<a class="prev sliderNav"><i class="icon icon-arrow-arrowleft"></i></a>',speed:speed,autoplay:true,cssEase:'linear',infinite:true,fade:true});return slider;}};$(document).ready(function(){$(".bannerScrollDown").click(function(){$('html, body').animate({scrollTop:$("#about").offset().top-120},1000);});$('.searchButton a').click(function(event){event.preventDefault();$('body').toggleClass('searchBarActive');$(this).toggleClass('activeSearchButton');});});var lastId,topMenu=$(".nav"),topMenuHeight=topMenu.outerHeight()+30,menuItems=topMenu.find("a"),scrollItems=menuItems.map(function(){var item=$($(this).attr("data-href"));if(item.length){return item;}});$(window).scroll(function(){var fromTop=$(this).scrollTop()+topMenuHeight;var cur=scrollItems.map(function(){if($(this).offset().top<fromTop)return this;});cur=cur[cur.length-1];var id=cur&&cur.length?cur[0].id:"";if(lastId!==id){lastId=id;menuItems.parent().removeClass("active-main-menu").end().filter("[data-href='#"+id+"']").parent().addClass("active-main-menu");}});$.fn.isInViewport=function(){var elementTop=$(this).offset().top;var elementBottom=elementTop+$(this).outerHeight();var viewportTop=$(window).scrollTop();var viewportBottom=viewportTop+$(window).height();return elementBottom>viewportTop&&elementTop<viewportBottom;};$(window).on('resize scroll',function(){$('.homeSection').each(function(){if($(this).isInViewport()){$(this).addClass('inView');}else{$(this).removeClass('inView');}});});