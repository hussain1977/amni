(function ($) {
	$(document).ready(function () {
		//tooltip
		$('.tooltip').removeClass('in');
		$('.dtooltip').tooltip('destroy').tooltip({
			container: 'body'
		});
		
		/* Counter */
		$(".stat-count").each(function () {
			//alert('ok');
			$(this).data('count', parseInt($(this).html(), 10));
			$(this).html('0');
			count($(this));
		});
		$('.region-navigation').click(function (e) {
			if ($(e.target).hasClass('region-navigation')) {
				$('body').removeClass('menu-open');
			}
		});
		//search form
		$('.search-box','#search-block-form').hide();
		
		$('.search-toggle','#search-block-form').click(function () {
			$(this).addClass('selected');
			$('.search-box','#search-block-form').fadeIn("slow", function () {
				$(this).find('input[type=text]').focus();
			});
			return false;
		});
		$('.search-box','#search-block-form').click(function(e){e.stopPropagation();})
		$(document).click(function () {
			if($('.search-box','#search-block-form').is(':visible')){
				$('.search-toggle','#search-block-form').removeClass('selected');
				$('.search-box','#search-block-form').fadeOut("slow");
			}
		});
		OE.chart.caller();
		//login form
		$('.close-login').click(function(e){
			$('#btn-login').removeClass('selected');
			$('#ajax-user-login-block-wrapper').slideUp();
		})
		$('#btn-login').click(function(e){
			e.preventDefault();
			$(this).addClass('selected');
			if($('#ajax-user-login-block-wrapper').is(':visible')) {
				$(this).removeClass('selected');
			}
			
			$('#ajax-user-login-block-wrapper').slideToggle();
		});
		/*
		* Add delay transtion for dexp-dropdown-menu
		*/
		$('#dexp-dropdown').find('.menu').each(function(){
			var $delay = 0;
			$(this).children('li').each(function(){
				$(this).attr('style', 'transition-delay:' + $delay + 'ms');
				$delay+= 100;
			});
		});
		//fixed title menu on mobile
		var m_parent = $('.block-dexp-menu'),
			m_title = $('.block-title', m_parent);
		$(window).resize(function(){
			if( $(window).width() < 992) {
				$('.dexp-dropdown', m_parent).prepend(m_title);
			}
		}).trigger('resize');
		//go to top
		$(window).on('scroll', function(){
			winScroll = $(window).scrollTop();
			if( winScroll > 100 ) {
				$('#to-top').css({opacity:1,bottom:"10px"});
			} else {
				$('#to-top').css({opacity:0,bottom:"-100px"});
			}
		});
		
		$('#to-top').click(function(){
			$('html, body').animate({scrollTop: '0px'}, 800);
			return false;
		});
		
		//ticker vertical slider
		if($('#vertical-ticker').length > 0){
			$('#vertical-ticker').totemticker({
				row_height	:	'110px',
				mousestop	:	true,
				speed:500
			});
		}
		
		//one page navigation
		$('.dexp-menu li','.one-page-nav').find('a').each(function(){
			var $this = $(this);
			$this.parent().removeClass('active');
			$(this).click(function(e){
				var id = this.hash;
				$('.dexp-menu li','.one-page-nav').removeClass('active');
				$(this).parent().addClass('active');
				if($(id).length) {
					var n = $(id).offset().top - $('.one-page-nav').height();
					var r = Math.round(1e3+n/7);
					$("html, body").animate({scrollTop:n},r);
				}
				e.preventDefault();
				$(document).on("scroll", onScroll);
			});
		});
		$(document).on("scroll", onScroll);
		
	});//document

	function onScroll(event){
        var scrollPos = $(document).scrollTop()+$('.one-page-nav').height();
        $('.dexp-menu li','.one-page-nav').find('a').each(function(){
			var $this = $(this),
				id = this.hash;
			if($(id).length) {
				var pTop = $(id).offset().top - $('.one-page-nav').height();
				var pBottom = pTop + $(id).outerHeight();
				if( scrollPos >= pTop && scrollPos < pBottom) {
					$('.dexp-menu li','.one-page-nav').removeClass('active');
					$this.parent().addClass('active');
				} else {
					$this.parent().removeClass('active');
				}
			}
		});
    }
		
	function count($this) {
		var current = parseInt($this.html(), 10);
		current = current + /* Where 50 is increment */
			$this.html(++current);
		if ( parseInt(current,10) > $this.data('count')) {
			$this.html($this.data('count'));
		} else {
			setTimeout(function () {
				count($this)
			}, 50);
		}
	}

	function showfancybox($element) {
		$($element).fancybox({
			arrows: true,
			padding: 0,
			closeBtn: true,
			openEffect: 'fade',
			closeEffect: 'fade',
			prevEffect: 'fade',
			nextEffect: 'fade',
			helpers: {
				media: {},
				overlay: {
					locked: false
				},
				buttons: false,
				thumbs: {
					width: 50,
					height: 50
				},
				title: {
					type: 'inside'
				}
			},
			beforeLoad: function () {
				var el, id = $(this.element).data('title-id');
				if (id) {
					el = $('#' + id);
					if (el.length) {
						this.title = el.html();
					}
				}
			}
		});
	}
})(jQuery);

    (function (window, $) {
        var $doc = $(document);
        // Common functions
        var OE = {
            searchBox: function () {
                $doc.on('click', '[data-toggle-active]', function () {
                    var $this = $(this),
                        selector = $this.attr('data-toggle-active'),
                        $selector = $(selector);
                    $selector.toggleClass('active');
                    var focus = $this.attr('data-focus');
                    if (focus) {
                        $(focus).focus();
                    }
                });
            },
            siteLoading: function () {
                var $loading = $('.loading-overlay');
                $('main').imagesLoaded(function () {
                    $loading.removeClass('active');
                });
            },
            mobileMenu: function () {
                $doc.on('click', '.navbtn', function () {
                    $('.oe-mobile-menu').slideToggle(300);
                });
                $('.oe-mobile-menu .menu-item-has-child').on('click', '> a', function (e) {
                    e.preventDefault();
                    var $this = $(this);
                    $this.parent().toggleClass('active');
                    $this.next('.submenu').slideToggle(300);
                });
            }
        };
        // Make it global
        window.OE = OE;
    })(window, jQuery);
	
    (function ($, OE, document) {
        var $doc = $(document);
        // Common functions
        OE.chart = {
            caller: function () {
                $('.dexp-circle-chart').each(function () {
                    var $this = $(this),
                        $tracker = $this.find('.dexp-color-track'),
                        trackColor = $tracker.css('borderColor'),
                        barColor = $tracker.css('color'),
                        width = $this.width();
                    $this.easyPieChart({
                        barColor: barColor,
                        trackColor: trackColor,
                        scaleColor: false,
                        lineWidth: 5,
                        lineCap: 'square',
                        size: width,
                        animate: {
                            duration: 2000,
                            enabled: true
                        },
                        rotate: 180,
                        easing: 'easeOutElastic',
                        onStep: function (from, to, percent) {
                            this.el.children[0].innerHTML = Math.round(percent) + '%';
                        }
                    });
                });
            }
        };
    })(jQuery, window.OE, window.document);