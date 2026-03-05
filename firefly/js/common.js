$(document).ready(function(){

	$('.mobile-menu-opener').on('click', function(){
		$('.mobile-menu').addClass('opened');
	});

	$('.mobile-menu-closer').on('click', function(){
		$('.mobile-menu').removeClass('opened');
	});
	$('.mobile-menu li a').on('click', function(){
		$('.mobile-menu').removeClass('opened');
	});


	$('.footer-line .close').click(function () {
		$('.footer-line-button').addClass('collapsed');
		$('.footer-line').addClass('collapsed');
	});
	$('.footer-line-button').click(function () {
		$('.footer-line').removeClass('collapsed');
		$('.footer-line-button').removeClass('collapsed');
	});

$('img.lazy_loading').each(function(){		
		src = $(this).attr('data-src');
		$(this).attr('src',src);		
	});



  $(".owl-products").owlCarousel({
	
    margin:20,
    nav:true,
	items:5,
	navText: ["<img src='/wp-content/themes/firefly/imgs/tur-left.png'>","<img src='/wp-content/themes/firefly/imgs/tur-right.png'>"]
  });
});


$(document).ready(function(){
  $(".owl-otzivs").owlCarousel({
    margin:20,
    nav:true,
    loop: true,
    autoplay: true,
    autoplayTimeout:30000,
	items:2,
	  responsive:{
		  0:{
			  items:1
		  },
		  1024:{
			  items:2
		  }
	  },
	navText: ["<img src='/wp-content/themes/firefly/imgs/tur-left-yellow.png'>","<img src='/wp-content/themes/firefly/imgs/tur-right-yellow.png'>"]
  });
});

/*$(document).ready(function(){
	$(".prod").click(function(){
		$('html, body').animate({
			scrollTop: $("#products").offset().top
		}, 500);
	});
});*/

$(document).ready(() => {
	$('form[data-with-ajax]').submit((e) => {
		e.preventDefault()
		$.ajax({
			url: $(e.target).attr('action'),
			method: $(e.target).attr('method'),
			dataType: 'json',
			data: $(e.target).serialize(),
			success: (answer) => {
				if(answer.success) {
					$(window.openedModal).modal('hide');
					setTimeout(() => {
						
					})
					$('#thxModal').modal('show');
				}
				window.location.replace('https://svetlyachok.info/thanks/');
			}
		})
	})

	$(window).scroll((e) => {
		if($(e.target).scrollTop() > 0)
			$('body').addClass('scrolled');
		else
			$('body').removeClass('scrolled');
	})

	$('nav[data-anchors] a').click(function(){
		$('html, body').animate({
			scrollTop: $($(this).attr('href')).offset().top - 88
		}, 500);
	});



/*fancybox*/

			$.fn.getTitle = function() {
				var arr = $("a.fancybox");
				$.each(arr, function() {
					var title = $(this).children("img").attr("title");
					$(this).attr('title',title);
				})
			}

			var thumbnails = 'a:has(img)[href$=".bmp"],a:has(img)[href$=".gif"],a:has(img)[href$=".jpg"],a:has(img)[href$=".jpeg"],a:has(img)[href$=".png"],a:has(img)[href$=".BMP"],a:has(img)[href$=".GIF"],a:has(img)[href$=".JPG"],a:has(img)[href$=".JPEG"],a:has(img)[href$=".PNG"]';
	
			$(thumbnails).addClass("fancybox").attr("rel","group").getTitle();

			$("a[rel=group]").fancybox({
				'imageScale': true,autoSize    : false,
					padding	: 0,fitToView : false,
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'titlePosition' 	: 'over',
				'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
					return '<span id="fancybox-title-over"> ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
				},
				helpers: {
					overlay: {
					  locked: false
					}
				  }
			});

			/*$("a.win").fancybox({
				padding	: 0,
				overlayOpacity : 0.80,
				overlayColor : '#000',
				autoSize    : true,
				autoScale   : true,
				scrolling : 'no',
				'height'            : 'auto',
				showNavArrows : false,
				type : 'iframe',
				//modal: true,
				smallBtn: true,			
				iframe: {
					css: {
						width : '340px'
					},
					scrolling: 'no'
				}
			});*/


			
/*fancybox*/

})