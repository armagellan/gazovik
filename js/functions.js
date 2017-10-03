/* global screenReaderText */
/**
 * Theme functions file.
 *
 * Contains handlers for navigation and widget area.
 */

( function( $ ) {
	var body, masthead, menuToggle, siteNavigation, socialNavigation, siteHeaderMenu, resizeTimer;

	function initMainNavigation( container ) {

		// Add dropdown toggle that displays child menu items.
		var dropdownToggle = $( '<button />', {
			'class': 'dropdown-toggle',
			'aria-expanded': false
		} ).append( $( '<span />', {
			'class': 'screen-reader-text',
			text: screenReaderText.expand
		} ) );

		container.find( '.menu-item-has-children > a' ).after( dropdownToggle );

		// Toggle buttons and submenu items with active children menu items.
		container.find( '.current-menu-ancestor > button' ).addClass( 'toggled-on' );
		container.find( '.current-menu-ancestor > .sub-menu' ).addClass( 'toggled-on' );

		// Add menu items with submenus to aria-haspopup="true".
		container.find( '.menu-item-has-children' ).attr( 'aria-haspopup', 'true' );

		container.find( '.dropdown-toggle' ).click( function( e ) {
			var _this            = $( this ),
				screenReaderSpan = _this.find( '.screen-reader-text' );

			e.preventDefault();
			_this.toggleClass( 'toggled-on' );
			_this.next( '.children, .sub-menu' ).toggleClass( 'toggled-on' );

			// jscs:disable
			_this.attr( 'aria-expanded', _this.attr( 'aria-expanded' ) === 'false' ? 'true' : 'false' );
			// jscs:enable
			screenReaderSpan.text( screenReaderSpan.text() === screenReaderText.expand ? screenReaderText.collapse : screenReaderText.expand );
		} );
	}
	initMainNavigation( $( '.main-navigation' ) );

	masthead         = $( '#masthead' );
	menuToggle       = masthead.find( '#menu-toggle' );
	siteHeaderMenu   = masthead.find( '#site-header-menu' );
	siteNavigation   = masthead.find( '#site-navigation' );
	socialNavigation = masthead.find( '#social-navigation' );

	// Enable menuToggle.
	( function() {

		// Return early if menuToggle is missing.
		if ( ! menuToggle.length ) {
			return;
		}

		// Add an initial values for the attribute.
		menuToggle.add( siteNavigation ).add( socialNavigation ).attr( 'aria-expanded', 'false' );

		menuToggle.on( 'click.twentysixteen', function() {
			$( this ).add( siteHeaderMenu ).toggleClass( 'toggled-on' );

			// jscs:disable
			$( this ).add( siteNavigation ).add( socialNavigation ).attr( 'aria-expanded', $( this ).add( siteNavigation ).add( socialNavigation ).attr( 'aria-expanded' ) === 'false' ? 'true' : 'false' );
			// jscs:enable
		} );
	} )();

	// Fix sub-menus for touch devices and better focus for hidden submenu items for accessibility.
	( function() {
		if ( ! siteNavigation.length || ! siteNavigation.children().length ) {
			return;
		}

		// Toggle `focus` class to allow submenu access on tablets.
		function toggleFocusClassTouchScreen() {
			if ( window.innerWidth >= 910 ) {
				$( document.body ).on( 'touchstart.twentysixteen', function( e ) {
					if ( ! $( e.target ).closest( '.main-navigation li' ).length ) {
						$( '.main-navigation li' ).removeClass( 'focus' );
					}
				} );
				siteNavigation.find( '.menu-item-has-children > a' ).on( 'touchstart.twentysixteen', function( e ) {
					var el = $( this ).parent( 'li' );

					if ( ! el.hasClass( 'focus' ) ) {
						e.preventDefault();
						el.toggleClass( 'focus' );
						el.siblings( '.focus' ).removeClass( 'focus' );
					}
				} );
			} else {
				siteNavigation.find( '.menu-item-has-children > a' ).unbind( 'touchstart.twentysixteen' );
			}
		}

		if ( 'ontouchstart' in window ) {
			$( window ).on( 'resize.twentysixteen', toggleFocusClassTouchScreen );
			toggleFocusClassTouchScreen();
		}

		siteNavigation.find( 'a' ).on( 'focus.twentysixteen blur.twentysixteen', function() {
			$( this ).parents( '.menu-item' ).toggleClass( 'focus' );
		} );
	} )();

	// Add the default ARIA attributes for the menu toggle and the navigations.
	function onResizeARIA() {
		if ( window.innerWidth < 910 ) {
			if ( menuToggle.hasClass( 'toggled-on' ) ) {
				menuToggle.attr( 'aria-expanded', 'true' );
			} else {
				menuToggle.attr( 'aria-expanded', 'false' );
			}

			if ( siteHeaderMenu.hasClass( 'toggled-on' ) ) {
				siteNavigation.attr( 'aria-expanded', 'true' );
				socialNavigation.attr( 'aria-expanded', 'true' );
			} else {
				siteNavigation.attr( 'aria-expanded', 'false' );
				socialNavigation.attr( 'aria-expanded', 'false' );
			}

			menuToggle.attr( 'aria-controls', 'site-navigation social-navigation' );
		} else {
			menuToggle.removeAttr( 'aria-expanded' );
			siteNavigation.removeAttr( 'aria-expanded' );
			socialNavigation.removeAttr( 'aria-expanded' );
			menuToggle.removeAttr( 'aria-controls' );
		}
	}

	// Add 'below-entry-meta' class to elements.
	function belowEntryMetaClass( param ) {
		if ( body.hasClass( 'page' ) || body.hasClass( 'search' ) || body.hasClass( 'single-attachment' ) || body.hasClass( 'error404' ) ) {
			return;
		}

		$( '.entry-content' ).find( param ).each( function() {
			var element              = $( this ),
				elementPos           = element.offset(),
				elementPosTop        = elementPos.top,
				entryFooter          = element.closest( 'article' ).find( '.entry-footer' ),
				entryFooterPos       = entryFooter.offset(),
				entryFooterPosBottom = entryFooterPos.top + ( entryFooter.height() + 28 ),
				caption              = element.closest( 'figure' ),
				newImg;

			// Add 'below-entry-meta' to elements below the entry meta.
			if ( elementPosTop > entryFooterPosBottom ) {

				// Check if full-size images and captions are larger than or equal to 840px.
				if ( 'img.size-full' === param ) {

					// Create an image to find native image width of resized images (i.e. max-width: 100%).
					newImg = new Image();
					newImg.src = element.attr( 'src' );

					$( newImg ).on( 'load.twentysixteen', function() {
						if ( newImg.width >= 840  ) {
							element.addClass( 'below-entry-meta' );

							if ( caption.hasClass( 'wp-caption' ) ) {
								caption.addClass( 'below-entry-meta' );
								caption.removeAttr( 'style' );
							}
						}
					} );
				} else {
					element.addClass( 'below-entry-meta' );
				}
			} else {
				element.removeClass( 'below-entry-meta' );
				caption.removeClass( 'below-entry-meta' );
			}
		} );
	}

	$( document ).ready( function() {
		body = $( document.body );

		$( window )
			.on( 'load.twentysixteen', onResizeARIA )
			.on( 'resize.twentysixteen', function() {
				clearTimeout( resizeTimer );
				resizeTimer = setTimeout( function() {
					belowEntryMetaClass( 'img.size-full' );
					belowEntryMetaClass( 'blockquote.alignleft, blockquote.alignright' );
				}, 300 );
				onResizeARIA();
			} );

		belowEntryMetaClass( 'img.size-full' );
		belowEntryMetaClass( 'blockquote.alignleft, blockquote.alignright' );
	} );
        
        // search block
        $( '#search-toggle' ).click(function(){
            $( '#search-block' ).show();
        });
        $( '.search-close' ).click(function(){
            $( '#search-block' ).hide();
        });
        
        
		//  calculator on home page
		$( '#summ' ).click(function(){
			var oil = $( '#oil' ).val();
			var quiq = $( '#quiq' ).val();
			var price_oil = $( '#price-oil' ).val();
			var price_gaz = $( '#price-gaz' ).val();
			var price = $( '#price' ).val();
			console.log(price);
			var price_km_oil = (price_oil*oil)/100;
			var price_km_gaz = (price_gaz*oil)/100;
			var price_km = Math.round((price_km_oil-price_km_gaz)*100)/100 ;
			var price_day = Math.round(((quiq*price_km_oil)-(quiq*price_km_gaz))*100)/100;
			var price_mounth = Math.round((price_day*30)*100)/100;
			var price_year = Math.round(price_day*365);
			var month = Math.round((price/price_mounth)*10)/10;
			$( '#view-summ' ).html("<div><h3>ВАША ЕКОНОМІЯ</h3><span>"+ price_km +"</span> грн/км<br><span>"+ price_day +"</span> грн/день<br><span>"+ price_year +"</span> грн/рік<h4>ІНСТАЛЯЦІЯ ГБО ОКУПИТЬСЯ ЗА</h4><span>"+ month +"</span> місяців");
			$( '#view-summ' ).animate({right:"320px"}, 250).css("display","flex");
		});
		
        $(document).mouseup(function (e) {
            var container = $("#view-summ");
            if (container.has(e.target).length === 0){
                $( '#view-summ' ).css({"display":"none",right:"0"});
            }
        });
	

		//  collapse-blocks on category page
		$( '#category_gallery #accordion .panel.panel-default:first-child .collapse' ).collapse();
		$( '#category_gallery #accordion .panel.panel-default:first-child a.glyphicon' ).removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-up');
		$( '#category_gallery #accordion .panel.panel-default a.glyphicon' ).click(function(){
			if($(this).parent().parent().parent().children('.collapse').hasClass('in')){
				$(this).addClass('glyphicon-chevron-down');
				$(this).removeClass('glyphicon-chevron-up');
			}else{
				$(this).addClass('glyphicon-chevron-up');
				$(this).removeClass('glyphicon-chevron-down');
			}
		});
		

		var wc = $('.all-img').width(); // width container
		var wch = $('.all-img-home').width(); // width container from home page
		//console.log(wc);
		//console.log(wch);
		var oe = parseInt(wc / 300); //  one element from container
		var oeh = parseInt(wch / 304); //  one element from container from home page
		//console.log(oe);
		//console.log(oeh);
		var nwc = oe * 300; // new width container
		var nwch = oeh * 304; // new width container from home page
		//console.log(nwc);
		//console.log(nwch);
		//$('.all-img').width(nwc);
		//$('.all-img-home').width(nwch);
		var qe; // quant element
		var qeh; // quant element from home page
		// category page
	    if( nwc == 1200) {
	    	qe = 4;
	    }
	    else if( nwc == 900){
	    	qe = 3;
	    }
	    else if( nwc == 600){
	    	qe = 2;
	    }else{
	    	qe = 1;
	    }
	    // home page
	    if( wch == 1216) {
	    	qeh = 4;
	    }
	    else if( wch == 912){
	    	qeh = 3;
	    }
	    else if( wch == 608){
	    	qeh = 2;
	    }else{
	    	qeh = 1;
	    }
	    /*var rowlh = $('.home .right_or_left').parent().width();
	    console.log(rowlh);
	    var rowlh2 = rowlh - nwch;
	    console.log(rowlh2);
	    var rowlh3 = rowlh2 - 60;
	    console.log(rowlh3);
	    var rolh = rowlh3/2;
	    console.log(rolh);
	    $('.home .right_or_left').width(rolh-30);*/
	    

		//  carusels in collapse-block on category page
		var posit = $('div.panel-collapse.collapse');
		var pol = {};
		for(var p=0; p<posit.length; p++){
			var ps = posit[p];
			pol[$(ps).attr('id')]=0;
		}
		$('section.carusel .right_or_left a').click(function(){
			var panel_collapse = $(this).parent().parent().parent().parent().parent().parent().parent().attr('id');
			var one_width = ($('#'+panel_collapse+' section.carusel img').width()) + 20;
			var all_li = $('#'+panel_collapse+' section.carusel li').length;
			var all_width = one_width * all_li;
			$('#'+panel_collapse+' section.carusel ul').css('width', all_width);
			var quiqs = all_width / 3;			
			if( $(this).parent().hasClass('right') ) {
				if(pol[panel_collapse] >= (all_li-qe) ){ return false; }else{
					$('#'+panel_collapse+' section.carusel ul').animate({'margin-left': '-='+one_width},300);
					pol[panel_collapse] = pol[panel_collapse] + 1;
				}
			}
			if( $(this).parent().hasClass('left') ) {
				if(pol[panel_collapse]<=0){ return false; }else{
					$('#'+panel_collapse+' section.carusel ul').animate({'margin-left':'+='+one_width},300);
					pol[panel_collapse] = pol[panel_collapse] - 1;
				}
			}
			return false;
		});

		


		//  carusels in collapse-block on home page
		var posit_home = $('article.carusel-home');
		var pol_home = {};
		for(var p=0; p<posit_home.length; p++){
			var ps = posit_home[p];
			pol_home[$(ps).attr('id')]=0;
		}
		$('article.carusel-home .right_or_left a').click(function(){
			var panel_collapse = $(this).parent().parent().parent().parent().parent().attr('id');
			console.log(panel_collapse);
			var one_width = ($('#'+panel_collapse+' div.entry-content li').width()) + 22;
			console.log(one_width);
			var all_li = $('#'+panel_collapse+' div.entry-content li').length;
			var all_width = one_width * all_li + 200;
			$('#'+panel_collapse+' div.entry-content ul').css('width', all_width);
			var quiqs = all_width / 4;			
			if( $(this).parent().hasClass('right') ) {
				if(pol_home[panel_collapse] >= (all_li-qeh) ){ return false; }else{
					$('#'+panel_collapse+' div.entry-content ul').animate({'margin-left': '-='+one_width},300);
					pol_home[panel_collapse] = pol_home[panel_collapse] + 1;
				}
			}
			if( $(this).parent().hasClass('left') ) {
				if(pol_home[panel_collapse]<=0){ return false; }else{
					$('#'+panel_collapse+' div.entry-content ul').animate({'margin-left':'+='+one_width},300);
					pol_home[panel_collapse] = pol_home[panel_collapse] - 1;
				}
			}
			console.log(pol_home[panel_collapse]);
			return false;
		});

} )( jQuery );
