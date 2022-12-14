function fixed_tools(){
	var window_top = $(document).scrollTop();

	if( window_top > 200 ){
		$('.fixed_tools').fadeIn();
	}else{
		$('.fixed_tools').fadeOut();
	}
}


if( $('select').length ){
	$('select').selectric();
}





$('.carousel_product_box_link.owl-carousel').owlCarousel({
	items: 1,
	loop: true,
	dots: true,
	nav: true,
	navText: false
});


$('.product_list_carousel.owl-carousel').owlCarousel({
	stagePadding: 100,
	responsive: {
		0: {
			items: 2,
			stagePadding: 20
		},
		992:{
			items: 3
		},
		1300: {
			items: 4
		},
		1500: {
			items: 5
		},
		1800: {
			items: 6
		}
	}
});


var activate

if( $('.product_view.owl-carousel .item').length > 1 ){
	activate = true
}else{
	activate = false
}

$('.product_view.owl-carousel').owlCarousel({
	items: 1,
	loop: activate,
	animateOut: 'fadeOut',
	animateIn: 'fadeIn',
	nav: true,
	navText: false
});


$('.search_box .search_btn').click(function(){
	let elem = $(this).parents('.search_box').find('.search_input');

	if( elem.is(':hidden') ){
		elem.fadeIn(function(){
			elem.addClass('open');
		});
	}else{
		elem.fadeOut(function(){
			elem.removeClass('open');
		});
		elem.next('.results').fadeOut();
	}
});



/*
$('.search_box .search_input input').on('focus change input', function(){
	let elem = $(this).parents('.search_input').next('.results');

	if( $(this).val().length > 0 ){
		if( elem.is(':hidden') ){
			elem.fadeIn(function(){
				elem.addClass('open');
			});
		}
	}else{
		if( !elem.is(':hidden') ){
			elem.fadeOut(function(){
				elem.removeClass('open');
			});
		}
	}
});
*/



$('.scroll_top').click(function(){
	$('body, html').animate({
		scrollTop: 0
	});
});


$('.submenu .close').click(function(){
	$(this).closest('.submenu').hide()
});


$('.menu_mobile .menu li a, .menu_mobile .user li a').click(function(){
	var elem = $(this).closest('li').find('ul');

	if( $(this).closest('li').find('ul').is(':hidden') ){
		elem.slideDown();
		elem.closest('li').addClass('open');
	}else{
		elem.slideUp();
		elem.closest('li').removeClass('open');
	}
});





$('.header .btn_menu').click(function(){
	if( $('.menu_mobile').is(':hidden') ){
		$('.menu_mobile').fadeIn();
		$('.header').addClass('open_mobile');
	}else{
		$('.menu_mobile').fadeOut();
		$('.header').removeClass('open_mobile');
	}
});




$('.tags a').click(function(ev){
	ev.preventDefault();

	var header_height = $('.main_head').height() + $('.header').height();

	var section_name = $(this).attr('data-section');
	var section_top = $('main [data-id=' + section_name + ']').offset().top;

	$('body, html').animate({
		scrollTop: section_top - header_height
	});
});



$('#producto .btn.show_hide').click(function(){
	if( $('main .table').is(':hidden') ){
		$(this).addClass('open').text('Ocultar');
		$('main .table').slideDown();
	}else{
		$(this).removeClass('open').text('Mostrar');
		$('main .table').slideUp();
	}
});







$(document).scroll(function(){
	fixed_tools();
});

$(document).ready(function(){
	fixed_tools();





	$.each( $('.menu_mobile .menu li'), function(i, v){

		if( $(v).find('ul').length ){
			$(v).closest('li').addClass('has_submenu');
		}
	});

});



if( $('#download_list').length ){

	$('#download_list').DataTable({
		responsive: true,
		dom: 'fl<"table_wrapper"t>ip',
		language: {
			searchPlaceholder: 'ej: 32LC841HT',
			search: 'Buscar por n??mero de modelo:',
			lengthMenu: 'Todos los archivos',
			info: 'Mostrando _START_ de _END_ archivos',
			paginate: {
				previous: 'Anterior',
				next: 'Siguiente'
			}
		},
	})
}


$('.popup a').click(function(){
    $(this).parents('.popup').fadeOut();
});


$('.btnComparar').click(function(){
	var me = $(this);
	$.post('/comparador/handle', {item:$(this).data('item')}, function(response){
		if (response.comparar) {
			$('.compare_btn').show();
		}
		else {
			$('.compare_btn').hide();
		}

		if (response.error) {
			$(me).attr('checked', false);
			$('.popup .content p').text(response.error);
			$('.popup').fadeIn();
		}
	});
});

$('.remove_item').click(function(e){
	e.preventDefault();
	$.post('/comparador/handle', {item:$(this).data('item')}, function(response){
		location.reload();
	});	
});

$('.triggerChat').click(function(e){
	e.preventDefault();
	$('#ConversalabWebchat').trigger('click');
});

ConversalabWebchatSalesforceLauncher.init({

    secret: "MtjRZ8hTfiI.cwA._OI.D49ZfY5a9FEDQgT6g7nB2grhtxCdzmAwBtDh3_yTNsw",

    botName: "Asistente Virtual Noblex",

    botAvatar: "http://static.conversalab.com.s3.amazonaws.com/bots/public/newsan/images/noblexChatIcon.png",

    mainColor: "#000000",

})